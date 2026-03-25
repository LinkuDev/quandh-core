<?php

namespace App\Modules\Schedule\Exports;

use App\Modules\Schedule\Models\Schedule;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SchedulesExport implements FromCollection, WithHeadings
{
    public function __construct(protected array $filters = []) {}

    public function collection()
    {
        return Schedule::with(['department', 'chairperson', 'meetingType', 'nature', 'participants', 'participants.user', 'creator', 'editor'])
            ->filter($this->filters)
            ->get()
            ->map(fn (Schedule $s) => [
                'id' => $s->id,
                'event_date' => $s->event_date?->format('d/m/Y'),
                'session' => $s->session,
                'start_time' => $s->start_time,
                'content' => $s->content,
                'chairperson' => $s->chairperson?->name,
                'participants' => $s->participants->map(fn ($p) => $p->user?->name ?? $p->external_name)->filter()->implode(', '),
                'location' => $s->location,
                'prep_unit' => $s->prep_unit,
                'participant_count' => $s->participants->count(),
                'meeting_type' => $s->meetingType?->name,
                'nature' => $s->nature?->name,
                'driver_info' => $s->driver_info,
                'color_code' => $s->color_code,
                'department' => $s->department?->name,
                'status' => $s->status,
                'created_by' => $s->creator?->name,
                'updated_by' => $s->editor?->name,
                'created_at' => $s->created_at?->format('H:i:s d/m/Y'),
                'updated_at' => $s->updated_at?->format('H:i:s d/m/Y'),
            ]);
    }

    public function headings(): array
    {
        return [
            'ID', 'Ngày', 'Buổi', 'Thời gian', 'Nội dung', 'Chủ trì',
            'Thành phần', 'Địa điểm', 'Đơn vị chuẩn bị', 'Số người',
            'Loại cuộc họp', 'Tính chất', 'Lái xe', 'Mã màu', 'Tổ chức',
            'Trạng thái', 'Người tạo', 'Người sửa', 'Ngày tạo', 'Ngày cập nhật',
        ];
    }
}
