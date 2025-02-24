<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขการจอง</title>
</head>
<body>
    <h1>แก้ไขการจอง</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admins.appointment.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <p>คำนำหน้า: <input type="text" name="prefix" value="{{ $appointment->prefix }}" required></p>
        <p>ชื่อ: <input type="text" name="first_name" value="{{ $appointment->first_name }}" required></p>
        <p>นามสกุล: <input type="text" name="last_name" value="{{ $appointment->last_name }}" required></p>
        <p>เลขบัตรประชาชน: <input type="text" name="id_card" value="{{ $appointment->id_card }}" required></p>
        <p>วัน-เดือน-ปี เกิด: <input type="date" name="birthdate" value="{{ $appointment->birthdate }}" required></p>
        <p>อีเมล: <input type="email" name="email" value="{{ $appointment->email }}" required></p>
        <p>จองวันที่: <input type="datetime-local" name="appointment_date" value="{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\TH:i') }}" required></p>
    
        <button type="submit">บันทึกการเปลี่ยนแปลง</button>
    </form>

    <a href="{{ route('admins.appointments') }}">กลับสู่หน้าหลัก</a>
</body>
</html>
