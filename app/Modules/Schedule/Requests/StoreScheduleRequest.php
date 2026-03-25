<?php

namespace App\Modules\Schedule\Requests;

use App\Modules\Schedule\Enums\MeetingTypeEnum;
use App\Modules\Schedule\Enums\NotificationChannelEnum;
use App\Modules\Schedule\Enums\ScheduleNatureEnum;
use App\Modules\Schedule\Enums\ScheduleSessionEnum;
use App\Modules\Schedule\Enums\ScheduleStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'event_date' => 'required|date',
            'session' => ['required', ScheduleSessionEnum::rule()],
            'department_id' => 'required|integer|exists:departments,id',
            'start_time' => 'nullable|date_format:H:i',
            'chairperson_id' => 'nullable|integer|exists:users,id',
            'location' => 'nullable|string|max:255',
            'prep_unit' => 'nullable|string|max:255',
            'driver_info' => 'nullable|string|max:255',

            'meeting_type' => ['nullable', MeetingTypeEnum::rule()],
            'nature' => ['nullable', ScheduleNatureEnum::rule()],
            'color_code' => 'nullable|string|max:20',
            'status' => ['nullable', ScheduleStatusEnum::rule()],
            'participants' => 'nullable|array',
            'participants.*.user_id' => 'nullable|integer|exists:users,id',
            'participants.*.external_name' => 'nullable|string|max:255',
            'notification' => 'nullable|array',
            'notification.channel' => ['required_with:notification', NotificationChannelEnum::rule()],
            'notification.remind_at' => 'required_with:notification|date',
            'attachments' => 'nullable|array|max:20',
            'attachments.*' => 'file|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Nội dung lịch không được để trống.',
            'event_date.required' => 'Ngày lịch không được để trống.',
            'event_date.date' => 'Ngày lịch không hợp lệ.',
            'session.required' => 'Buổi không được để trống.',
            'department_id.required' => 'Tổ chức không được để trống.',
            'department_id.exists' => 'Tổ chức không tồn tại.',
            'start_time.date_format' => 'Thời gian bắt đầu phải theo định dạng HH:mm.',
            'chairperson_id.exists' => 'Chủ trì không tồn tại trong hệ thống.',
            'meeting_type.in' => 'Loại cuộc họp không hợp lệ.',
            'nature.in' => 'Tính chất không hợp lệ.',
            'participants.*.user_id.exists' => 'Thành phần tham dự không tồn tại trong hệ thống.',
            'notification.channel.required_with' => 'Kênh thông báo không được để trống.',
            'notification.remind_at.required_with' => 'Thời gian nhắc không được để trống.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'content' => ['description' => 'Nội dung lịch công tác', 'example' => 'Họp Ban Thường vụ'],
            'event_date' => ['description' => 'Ngày diễn ra (Y-m-d)', 'example' => '2026-04-01'],
            'session' => ['description' => 'Buổi: sang, chieu, toi', 'example' => 'sang'],
            'department_id' => ['description' => 'ID đơn vị (Thường trực Thành ủy / Văn phòng Thành ủy)', 'example' => 1],
            'start_time' => ['description' => 'Giờ bắt đầu (HH:mm)', 'example' => '08:00'],
            'chairperson_id' => ['description' => 'ID người chủ trì', 'example' => 1],
            'location' => ['description' => 'Địa điểm', 'example' => 'Phòng họp A'],
            'prep_unit' => ['description' => 'Đơn vị chuẩn bị', 'example' => 'Văn phòng'],
            'driver_info' => ['description' => 'Thông tin lái xe', 'example' => 'Nguyễn Văn A - 30A-12345'],

            'meeting_type' => ['description' => 'Loại cuộc họp: hop_thuong_ky, hop_dot_xuat, hop_chuyen_de, hoi_nghi, tiep_khach, di_cong_tac, khac', 'example' => 'hop_thuong_ky'],
            'nature' => ['description' => 'Tính chất: thuong, quan_trong, mat', 'example' => 'thuong'],
            'color_code' => ['description' => 'Mã màu hiển thị', 'example' => '#FF5733'],
        ];
    }
}
