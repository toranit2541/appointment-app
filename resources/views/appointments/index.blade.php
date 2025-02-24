<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>การจองทั้งหมด</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>การจอง</h1>
    <a href="{{ route('appointments.create') }}">สมุดการจอง</a>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เลขบัตรประชาชน</th>
                <th>วันเกิด</th>
                <th>อีเมล</th>
                <th>วันที่จอง</th>
                <th>สร้างเมื่อ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->prefix }}</td>
                    <td>{{ $appointment->first_name }}</td>
                    <td>{{ $appointment->last_name }}</td>
                    <td>{{ $appointment->id_card }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointment->birthdate)->format('d/m/Y') }}</td>
                    <td>{{ $appointment->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y H:i') }}</td>
                    <td>{{ $appointment->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">ไม่มีข้อมูลการจอง</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>