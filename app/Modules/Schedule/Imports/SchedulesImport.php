<?php

namespace App\Modules\Schedule\Imports;

use App\Modules\Schedule\Models\Schedule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SchedulesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Schedule([
            'event_date' => $row['ngay'] ?? null,
            'session' => $row['buoi'] ?? 'sang',
            'start_time' => $row['thoi_gian'] ?? null,
            'content' => $row['noi_dung'] ?? '',
            'location' => $row['dia_diem'] ?? null,
            'prep_unit' => $row['don_vi_chuan_bi'] ?? null,
            'driver_info' => $row['lai_xe'] ?? null,

            'color_code' => $row['ma_mau'] ?? null,
            'organization_id' => $row['to_chuc_id'] ?? null,
            'status' => $row['trang_thai'] ?? 'active',
        ]);
    }
}
