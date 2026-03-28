<?php

namespace App\Modules\Schedule\Enums;

/**
 * Loại lịch công tác: Thường trực (tạo trực tiếp) hoặc Văn phòng (cần duyệt).
 */
enum ScheduleTypeEnum: string
{
    case ThuongTruc = 'thuong_truc';
    case VanPhong = 'van_phong';

    /** Danh sách giá trị để validate. */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /** Rule validation: in:thuong_truc,van_phong */
    public static function rule(): string
    {
        return 'in:'.implode(',', self::values());
    }

    /** Nhãn tiếng Việt. */
    public function label(): string
    {
        return match ($this) {
            self::ThuongTruc => 'Thường trực Thành ủy',
            self::VanPhong => 'Văn phòng Thành ủy',
        };
    }

    /** Permission prefix tương ứng. */
    public function permissionPrefix(): string
    {
        return match ($this) {
            self::ThuongTruc => 'thuong-truc-schedules',
            self::VanPhong => 'van-phong-schedules',
        };
    }
}
