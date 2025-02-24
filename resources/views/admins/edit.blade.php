<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <form action="{{ route('admins.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>คำนำหน้า:</label>
        <input type="text" name="title" value="{{ $user->name }}" required><br>

        <label>ชื่อ:</label>
        <input type="text" name="fname" value="{{ $user->name }}" required><br>

        <label>นามสกุล:</label>
        <input type="text" name="lname" value="{{ $user->name }}" required><br>

        <label>เลขบัตรประชาชน:</label>
        <input type="text" name="idcard" value="{{ $user->name }}" required><br>

        <label>วัน-เดือน-ปี เกิด:</label>
        <input type="text" name="bday" value="{{ $user->name }}" required><br>

        <label>อีเมล:</label>
        <input type="email" name="email" value="{{ $user->email }}" required><br>

        <button type="submit">บันทึก</button>
    </form>

    <a href="{{ route('admins.index') }}">กลับหน้าหลัก</a>
</body>
</html>
