<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lịch công tác</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        h2 { text-align: center; margin-bottom: 5px; }
        h3 { text-align: center; margin-top: 0; font-weight: normal; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 5px 6px; text-align: left; vertical-align: top; }
        th { background-color: #e0e0e0; font-weight: bold; text-align: center; }
        .session-header { background-color: #f5f5f5; font-weight: bold; text-align: center; }
        .text-center { text-align: center; }
        .footer { margin-top: 15px; font-size: 10px; color: #777; text-align: right; }
    </style>
</head>
<body>
    <h2>LỊCH CÔNG TÁC</h2>
    <h3>{{ $title ?? 'Tổng hợp lịch công tác' }}</h3>

    <table>
        <thead>
            <tr>
                <th style="width: 4%;">STT</th>
                <th style="width: 10%;">Thời gian</th>
                <th style="width: 30%;">Nội dung</th>
                <th style="width: 12%;">Chủ trì</th>
                <th style="width: 14%;">Thành phần</th>
                <th style="width: 12%;">Địa điểm</th>
                <th style="width: 10%;">Đơn vị chuẩn bị</th>
                <th style="width: 8%;">Lái xe</th>
            </tr>
        </thead>
        <tbody>
            @php $stt = 0; $currentDate = null; @endphp
            @foreach($schedules as $schedule)
                @if($currentDate !== $schedule->event_date->format('Y-m-d'))
                    @php $currentDate = $schedule->event_date->format('Y-m-d'); @endphp
                    <tr>
                        <td colspan="8" class="session-header">
                            {{ $schedule->event_date->locale('vi')->isoFormat('dddd, DD/MM/YYYY') }}
                        </td>
                    </tr>
                @endif
                @php $stt++; @endphp
                <tr>
                    <td class="text-center">{{ $stt }}</td>
                    <td class="text-center">{{ $schedule->start_time ?? '' }}</td>
                    <td>{{ $schedule->content }}</td>
                    <td>{{ $schedule->chairperson?->name }}</td>
                    <td>
                        @if($schedule->participants->isNotEmpty())
                            {{ $schedule->participants->map(fn($p) => $p->user?->name ?? $p->external_name)->filter()->implode(', ') }}
                        @endif
                    </td>
                    <td>{{ $schedule->location }}</td>
                    <td>{{ $schedule->prep_unit }}</td>
                    <td>{{ $schedule->driver_info }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Xuất ngày: {{ now()->format('H:i:s d/m/Y') }}
    </div>
</body>
</html>
