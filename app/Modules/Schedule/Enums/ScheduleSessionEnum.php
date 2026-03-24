<?php

namespace App\Modules\Schedule\Enums;

/**
 * Buổi trong ngày: Sáng, Chiều, Tối.
 */
enum ScheduleSessionEnum: string
{
    case Sang = 'sang';
    case Chieu = 'chieu';
    case Toi = 'toi';

    /** Danh sách giá trị để validate. */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /** Rule validation: in:sang,chieu,toi */
    public static function rule(): string
    {
        return 'in:'.implode(',', self::values());
    }

    /** Nhãn tiếng Việt. */
    public function label(): string
    {
        return match ($this) {
            self::Sang => 'Sáng',
            self::Chieu => 'Chiều',
            self::Toi => 'Tối',
        };
    }
}
