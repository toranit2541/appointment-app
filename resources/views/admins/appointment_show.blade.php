<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>รายละเอียดการจอง</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>รายละเอียดการจอง</h1>

        <div class="card mt-3">
            <div class="card-body">
                <p>คำนำหน้า: {{ $appointment->prefix }}</p>
                <p>ชื่อ: {{ $appointment->first_name }}</p>
                <p>นามสกุล: {{ $appointment->last_name }}</p>
                <p>เลขบัตรประชาชน: {{ $appointment->id_card }}</p>
                <p>วัน-เดือน-ปี เกิด: {{ $appointment->birthdate }}</p>
                <p>อีเมล: {{ $appointment->email }}</p>
                <p>จองวันที่: {{ $appointment->appointment_date }}</p>
            </div>
        </div>

        <a href="{{ route('admins.appointments') }}" class="btn btn-secondary mt-3">กลับสู่หน้าการจอง</a>
    </div>
</body>

</html>