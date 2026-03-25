<?php

namespace App\Modules\Schedule\Enums;

enum MeetingTypeEnum: string
{
    case HopThuongKy = 'hop_thuong_ky';
    case HopDotXuat = 'hop_dot_xuat';
    case HopChuyenDe = 'hop_chuyen_de';
    case HoiNghi = 'hoi_nghi';
    case TiepKhach = 'tiep_khach';
    case DiCongTac = 'di_cong_tac';
    case Khac = 'khac';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function rule(): string
    {
        return 'in:' . implode(',', self::values());
    }

    public function label(): string
    {
        return match ($this) {
            self::HopThuongKy => 'Họp thường kỳ',
            self::HopDotXuat => 'Họp đột xuất',
            self::HopChuyenDe => 'Họp chuyên đề',
            self::HoiNghi => 'Hội nghị',
            self::TiepKhach => 'Tiếp khách',
            self::DiCongTac => 'Đi công tác',
            self::Khac => 'Khác',
        };
    }
}
