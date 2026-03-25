<?php

namespace App\Modules\Schedule\Enums;

enum ScheduleNatureEnum: string
{
    case Thuong = 'thuong';
    case QuanTrong = 'quan_trong';
    case Mat = 'mat';

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
            self::Thuong => 'Thường',
            self::QuanTrong => 'Quan trọng',
            self::Mat => 'Mật',
        };
    }
}
