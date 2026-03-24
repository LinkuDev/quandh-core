<?php

namespace App\Modules\Schedule\Requests;

use App\Modules\Schedule\Enums\NotificationChannelEnum;
use App\Modules\Schedule\Enums\ScheduleSessionEnum;
use App\Modules\Schedule\Enums\ScheduleStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => 'sometimes|string',
            'event_date' => 'sometimes|date',
            'session' => ['sometimes', ScheduleSessionEnum::rule()],
            'organization_id' => 'sometimes|integer|exists:organizations,id',
            'start_time' => 'nullable|date_format:H:i',
            'chairperson_id' => 'nullable|integer|exists:users,id',
            'location' => 'nullable|string|max:255',
            'prep_unit' => 'nullable|string|max:255',
            'driver_info' => 'nullable|string|max:255',

            'meeting_type_id' => 'nullable|integer|exists:schedule_meeting_types,id',
            'nature_id' => 'nullable|integer|exists:schedule_natures,id',
            'color_code' => 'nullable|string|max:20',
            'status' => ['sometimes', ScheduleStatusEnum::rule()],
            'participants' => 'nullable|array',
            'participants.*.user_id' => 'nullable|integer|exists:users,id',
            'participants.*.external_name' => 'nullable|string|max:255',
            'notification' => 'nullable|array',
            'notification.channel' => ['required_with:notification', NotificationChannelEnum::rule()],
            'notification.remind_at' => 'required_with:notification|date',
            'remove_attachment_ids' => 'nullable|array',
            'remove_attachment_ids.*' => 'integer',
            'attachments' => 'nullable|array|max:20',
            'attachments.*' => 'file|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'content.string' => 'Nội dung lịch phải là chuỗi ký tự.',
            'event_date.date' => 'Ngày lịch không hợp lệ.',
            'start_time.date_format' => 'Thời gian bắt đầu phải theo định dạng HH:mm.',
            'chairperson_id.exists' => 'Chủ trì không tồn tại trong hệ thống.',
            'meeting_type_id.exists' => 'Loại cuộc họp không tồn tại.',
            'nature_id.exists' => 'Tính chất không tồn tại.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'content' => ['description' => 'Nội dung lịch công tác', 'example' => 'Họp Ban Thường vụ'],
            'event_date' => ['description' => 'Ngày diễn ra (Y-m-d)', 'example' => '2026-04-01'],
            'session' => ['description' => 'Buổi: sang, chieu, toi', 'example' => 'sang'],
        ];
    }
}
