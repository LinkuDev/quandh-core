<?php

namespace Database\Seeders;

use App\Modules\Core\Models\Department;
use App\Modules\Core\Models\User;
use App\Modules\Schedule\Models\Schedule;
use App\Modules\Schedule\Models\ScheduleMeetingType;
use App\Modules\Schedule\Models\ScheduleNature;
use App\Modules\Schedule\Models\ScheduleParticipant;
use App\Modules\Schedule\Models\ScheduleNotification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Thứ tự: User → Permission/Role → Settings → Schedule data.
     */
    public function run(): void
    {
        $this->seedUsers();
        $this->call(PermissionSeeder::class);
        $this->call(SettingSeeder::class);
        $this->seedScheduleData();
    }

    /**
     * Tạo user với chức danh mẫu.
     */
    protected function seedUsers(): void
    {
        $positions = ['Bí thư', 'Phó Bí thư', 'Ủy viên', 'Chánh Văn phòng', 'Phó Chánh Văn phòng', null, null, null, null, null];

        foreach ($positions as $index => $position) {
            User::factory()->create([
                'position' => $position,
                'phone' => fake()->numerify('09########'),
                'zalo_id' => fake()->optional(0.5)->numerify('09########'),
            ]);
        }

        User::where('id', 1)->update(['created_by' => 1, 'updated_by' => 1]);
        User::where('id', '>', 1)->update(['created_by' => 1, 'updated_by' => 1]);
    }

    /**
     * Tạo dữ liệu mẫu cho module Schedule.
     */
    protected function seedScheduleData(): void
    {
        $users = User::all();
        $departments = Department::where('status', 'active')->get();

        if ($users->isEmpty() || $departments->isEmpty()) {
            return;
        }

        /* Danh mục loại cuộc họp */
        $meetingTypes = collect([
            'Họp thường kỳ', 'Họp đột xuất', 'Họp chuyên đề',
            'Hội nghị', 'Tiếp công dân', 'Làm việc với đoàn',
        ])->map(fn ($name) => ScheduleMeetingType::create([
            'name' => $name,
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]));

        /* Danh mục tính chất */
        $natures = collect([
            'Thường', 'Quan trọng', 'Mật', 'Tối mật',
        ])->map(fn ($name) => ScheduleNature::create([
            'name' => $name,
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]));

        /* Tạo lịch công tác mẫu */
        $sessions = ['sang', 'chieu', 'toi'];
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
                $org = $departments->random();
                $session = fake()->randomElement($sessions);
                $chairperson = $users->whereNotNull('position')->random();

                $scopeKey = "{$date}_{$org->id}";
                $sortOrder[$scopeKey] = ($sortOrder[$scopeKey] ?? 0) + 1;

                $schedule = Schedule::withoutEvents(function () use (
                    $date, $session, $org, $chairperson, $meetingTypes, $natures,
                    $contents, $locations, $users, $sortOrder, $scopeKey
                ) {
                    return Schedule::create([
                        'event_date' => $date,
                        'session' => $session,
                        'start_time' => fake()->randomElement(['07:30', '08:00', '08:30', '09:00', '13:30', '14:00', '14:30', '19:00', '19:30']),
                        'content' => fake()->randomElement($contents),
                        'chairperson_id' => $chairperson->id,
                        'location' => fake()->randomElement($locations),
                        'prep_unit' => fake()->randomElement(['Văn phòng', 'Ban Tổ chức', 'Ban Tuyên giáo', 'Ủy ban Kiểm tra']),
                        'driver_info' => fake()->optional(0.7)->name(),
                        'meeting_type_id' => $meetingTypes->random()->id,
                        'nature_id' => $natures->random()->id,
                        'color_code' => fake()->optional(0.5)->hexColor(),
                        'sort_order' => $sortOrder[$scopeKey],
                        'department_id' => $org->id,
                        'status' => 'active',
                        'created_by' => $users->random()->id,
                        'updated_by' => $users->random()->id,
                    ]);
                });

                /* Thêm participants */
                $participantUsers = $users->random(rand(2, 5));
                foreach ($participantUsers as $pu) {
                    ScheduleParticipant::create([
                        'schedule_id' => $schedule->id,
                        'user_id' => $pu->id,
                    ]);
                }

                /* Thêm 1-2 external participants */
                if (fake()->boolean(40)) {
                    ScheduleParticipant::create([
                        'schedule_id' => $schedule->id,
                        'external_name' => fake()->name() . ' (' . fake()->randomElement(['Sở Nội vụ', 'Sở Tài chính', 'UBND quận', 'Ban Dân vận']) . ')',
                    ]);
                }

                /* Thêm notifications cho participants */
                if (fake()->boolean(60)) {
                    $channel = fake()->randomElement(['website', 'sms', 'zalo', 'app']);
                    $remindAt = \Carbon\Carbon::parse($date)->subHours(rand(1, 24));

                    foreach ($participantUsers->take(3) as $pu) {
                        ScheduleNotification::create([
                            'schedule_id' => $schedule->id,
                            'user_id' => $pu->id,
                            'channel' => $channel,
                            'remind_at' => $remindAt,
                            'status' => fake()->randomElement(['pending', 'sent']),
                            'sent_at' => fake()->boolean(50) ? now() : null,
                            'read_at' => fake()->boolean(30) ? now() : null,
                            'created_by' => 1,
                        ]);
                    }
                }
            }
        }
    }
}
