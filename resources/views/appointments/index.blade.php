<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>โรงพยาบาลรวมชัยประชารักษ์</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head> 

<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">การจอง</h1>
        <a href="{{ route('appointments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            สมุดการจอง
        </a>

        @if(session('success'))
            <p class="text-green-600 mt-2">{{ session('success') }}</p>
        @endif

        <div class="overflow-x-auto mt-4">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">ลำดับ</th>
                        <th class="border border-gray-300 px-4 py-2">คำนำหน้า</th>
                        <th class="border border-gray-300 px-4 py-2">ชื่อ</th>
                        <th class="border border-gray-300 px-4 py-2">นามสกุล</th>
                        <th class="border border-gray-300 px-4 py-2">เลขบัตรประชาชน</th>
                        <th class="border border-gray-300 px-4 py-2">วันเกิด</th>
                        <th class="border border-gray-300 px-4 py-2">อีเมล</th>
                        <th class="border border-gray-300 px-4 py-2">วันที่จอง</th>
                        <th class="border border-gray-300 px-4 py-2">สร้างเมื่อ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $appointment->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $appointment->prefix }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $appointment->first_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $appointment->last_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $appointment->id_card }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($appointment->birthdate)->format('d/m/Y') }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $appointment->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y H:i') }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $appointment->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center border border-gray-300 px-4 py-2">ไม่มีข้อมูลการจอง</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
