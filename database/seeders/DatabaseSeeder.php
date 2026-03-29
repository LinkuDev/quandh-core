<?php

namespace Database\Seeders;

use App\Modules\Core\Models\User;
use App\Modules\Schedule\Enums\MeetingTypeEnum;
use App\Modules\Schedule\Enums\ScheduleNatureEnum;
use App\Modules\Schedule\Enums\ScheduleTypeEnum;
use App\Modules\Schedule\Models\Schedule;
use App\Modules\Schedule\Models\ScheduleNotification;
use App\Modules\Schedule\Models\ScheduleParticipant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // PermissionSeeder tạo organization + fixed users + roles/permissions trước
        $this->call(PermissionSeeder::class);
        $this->call(SettingSeeder::class);
        $this->seedRandomUsers();
        $this->seedScheduleData();
    }

    /**
     * Tạo thêm user ngẫu nhiên để test.
     */
    protected function seedRandomUsers(): void
    {
        for ($i = 0; $i < 10; $i++) {
            User::factory()->create([
                'phone' => fake()->numerify('09########'),
                'zalo_id' => fake()->optional(0.5)->numerify('09########'),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }

    /**
     * Tạo dữ liệu mẫu cho module Schedule.
     */
    protected function seedScheduleData(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return;
        }

        $meetingTypes = MeetingTypeEnum::values();
        $natures = ScheduleNatureEnum::values();
        $scheduleTypes = ScheduleTypeEnum::values();

        $locations = ['Phòng họp A', 'Phòng họp B', 'Hội trường lớn', 'Phòng tiếp dân', 'Phòng làm việc Bí thư'];
        $contents = [
            'Họp Ban Thường vụ Thành ủy',
            'Làm việc với Sở Nội vụ về công tác cán bộ',
            'Tiếp công dân định kỳ',
            'Hội nghị tổng kết công tác quý I',
            'Họp giao ban tuần',
            'Làm việc với đoàn kiểm tra Trung ương',
            'Họp đánh giá tiến độ dự án trọng điểm',
            'Họp triển khai Nghị quyết Thành ủy',
            'Tiếp và làm việc với đoàn công tác tỉnh bạn',
            'Họp rà soát quy hoạch cán bộ',
            'Hội nghị sơ kết 6 tháng đầu năm',
            'Họp Ban Chấp hành Đảng bộ thành phố',
            'Kiểm tra công tác xây dựng Đảng',
            'Họp triển khai kế hoạch bầu cử',
            'Làm việc với Ban Tổ chức Thành ủy',
        ];
        $prepUnits = ['Văn phòng', 'Ban Tổ chức', 'Ban Tuyên giáo', 'Ủy ban Kiểm tra'];
        $externalOrgs = ['Sở Nội vụ', 'Sở Tài chính', 'UBND quận', 'Ban Dân vận'];

        $sortOrder = [];

        /* Chỉ tạo lịch ngày làm việc (thứ 2 → thứ 6) trong 3 tuần */
        $dates = collect();
        for ($day = -10; $day <= 10; $day++) {
            $d = now()->addDays($day);
            if ($d->isWeekday()) {
                $dates->push($d->format('Y-m-d'));
            }
        }

        foreach ($dates as $date) {
            $schedulesPerDay = rand(2, 5);

            for ($i = 0; $i < $schedulesPerDay; $i++) {
                $scheduleType = fake()->randomElement($scheduleTypes);
                $startTime = fake()->randomElement(['07:30', '08:00', '08:30', '09:00', '13:30', '14:00', '14:30', '19:00', '19:30']);
                $session = match (true) {
                    (int) $startTime < 12 => 'sang',
                    (int) $startTime < 18 => 'chieu',
                    default => 'toi',
                };

                /* Chủ trì */
                $chairperson = $users->random();

                /* Người tạo lịch = chairperson hoặc 1 user khác */
                $creator = fake()->boolean(70) ? $chairperson : $users->random();

                $scopeKey = "{$date}_{$scheduleType}";
                $sortOrder[$scopeKey] = ($sortOrder[$scopeKey] ?? 0) + 1;

                $schedule = Schedule::withoutEvents(function () use (
                    $date, $session, $startTime, $scheduleType, $chairperson, $creator,
                    $meetingTypes, $natures, $contents, $locations, $prepUnits, $sortOrder, $scopeKey
                ) {
                    return Schedule::create([
                        'event_date' => $date,
                        'session' => $session,
                        'start_time' => $startTime,
                        'content' => fake()->randomElement($contents),
                        'chairperson_id' => $chairperson->id,
                        'location' => fake()->randomElement($locations),
                        'prep_unit' => fake()->randomElement($prepUnits),
                        'driver_info' => fake()->optional(0.7)->name(),
                        'meeting_type' => fake()->randomElement($meetingTypes),
                        'nature' => fake()->randomElement($natures),
                        'color_code' => fake()->optional(0.3)->hexColor(),
                        'sort_order' => $sortOrder[$scopeKey],
                        'schedule_type' => $scheduleType,
                        'status' => 'active',
                        'created_by' => $creator->id,
                        'updated_by' => $creator->id,
                    ]);
                });

                /* Participants: chairperson + random users (không trùng) */
                $otherUsers = $users->where('id', '!=', $chairperson->id)->random(rand(1, 4));
                $participantUserIds = collect([$chairperson->id])
                    ->merge($otherUsers->pluck('id'))
                    ->unique()
                    ->values();

                foreach ($participantUserIds as $userId) {
                    ScheduleParticipant::create([
                        'schedule_id' => $schedule->id,
                        'user_id' => $userId,
                    ]);
                }

                /* External participants (40% chance) */
                if (fake()->boolean(40)) {
                    ScheduleParticipant::create([
                        'schedule_id' => $schedule->id,
                        'external_name' => fake()->name().' ('.fake()->randomElement($externalOrgs).')',
                    ]);
                }

                /* Notifications: gửi cho TẤT CẢ participant có user_id, remind trước event */
                if (fake()->boolean(60)) {
                    $channel = fake()->randomElement(['website', 'sms', 'zalo', 'app']);
                    $remindAt = \Carbon\Carbon::parse("{$date} {$startTime}")
                        ->subMinutes(fake()->randomElement([30, 60, 120, 1440]));

                    foreach ($participantUserIds as $userId) {
                        $sent = fake()->boolean(50);
                        ScheduleNotification::create([
                            'schedule_id' => $schedule->id,
                            'user_id' => $userId,
                            'channel' => $channel,
                            'remind_at' => $remindAt,
                            'status' => $sent ? 'sent' : 'pending',
                            'sent_at' => $sent ? $remindAt : null,
                            'read_at' => $sent && fake()->boolean(30) ? $remindAt->copy()->addMinutes(rand(5, 60)) : null,
                            'created_by' => $creator->id,
                        ]);
                    }
                }
            }
        }
    }
}
