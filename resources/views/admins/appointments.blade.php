<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>การจองทั้งหมด</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
</head>

<body>
    <h1>การจอง</h1>
    <a href="{{ route('appointments.create') }}">สมุดการจอง</a>
    <h1>การจองทั้งหมด</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>อีเมล</th>
                <th>วันที่จอง</th>
                <th>สร้างวันที่</th>
                <th>อื่นๆ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->prefix }} {{ $appointment->first_name }} {{ $appointment->last_name }}</td>
                    <td>{{ $appointment->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d H:i') }}</td>
                    <td>{{ $appointment->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('admins.appointments.show', $appointment->id) }}">ตรวจสอบ</a>
                        <a href="{{ route('admins.appointments.edit', $appointment->id) }}">แก้ไข</a>
                        <form action="{{ route('admins.appointments.destroy', $appointment->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">ลบ</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">ไม่มีการจองนี้.</td>
                </tr>
            @endforelse
        </tbody>

    </table>

    <a href="{{ route('admins.appointments.export') }}">Export CSV</a>

    <h1>ปฏิทินการจอง</h1>
    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/appointments/events', // This will be your Laravel route returning JSON
            });
            calendar.render();
        });
    </script>

    <a href="{{ route('admins.index') }}">กลับหน้าหลัก</a>

</body>

</html>