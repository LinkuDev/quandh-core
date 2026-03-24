<?php

namespace App\Modules\Schedule\Enums;

/**
 * Kênh thông báo nhắc lịch: SMS, Zalo, Website, App.
 */
enum NotificationChannelEnum: string
{
    case Sms = 'sms';
    case Zalo = 'zalo';
    case Website = 'website';
    case App = 'app';

    /** Danh sách giá trị để validate. */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /** Rule validation: in:sms,zalo,website,app */
    public static function rule(): string
    {
        return 'in:'.implode(',', self::values());
    }

    /** Nhãn tiếng Việt. */
    public function label(): string
    {
        return match ($this) {
            self::Sms => 'SMS',
            self::Zalo => 'Zalo',
            self::Website => 'Website',
            self::App => 'App Mobile',
        };
    }
}
