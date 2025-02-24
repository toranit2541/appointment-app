<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>กายภาพบำบัด โรงพยาบาลรวมชัยประชารักษ์</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">สมุดการจองการรับบริการ</h1>
        <a href="{{ route('appointments.index') }}" class="block text-center mt-4 text-gray-600 hover:underline">กลับ</a>

        <h2 class="text-xl font-semibold text-gray-700 mb-4">ปฏิทินการจอง</h2>
        <div id="calendar" class="border p-4 rounded-lg shadow-md bg-gray-50"></div>

        <!-- Popup Modal -->
        <div id="appointmentModal"
            class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
                <span class="close text-gray-500 text-xl cursor-pointer float-right">&times;</span>
                <h2 class="text-lg font-bold mb-4">จองการรับบริการ</h2>
                <form id="appointmentForm" action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-gray-700">คำนำหน้า</label>
                        <input type="text" name="prefix" required class="w-full border-gray-300 rounded-lg p-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">ชื่อ</label>
                        <input type="text" name="first_name" required class="w-full border-gray-300 rounded-lg p-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">นามสกุล</label>
                        <input type="text" name="last_name" required class="w-full border-gray-300 rounded-lg p-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">เลขบัตรประชาชน</label>
                        <input type="text" name="id_card" required class="w-full border-gray-300 rounded-lg p-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">วัน-เดือน-ปี เกิด</label>
                        <input type="date" name="birthdate" required class="w-full border-gray-300 rounded-lg p-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">อีเมล</label>
                        <input type="email" name="email" required class="w-full border-gray-300 rounded-lg p-2">
                    </div>
                    <div>
                        <label class="block text-gray-700">จองวันที่</label>
                        <input type="datetime-local" id="appointmentDateInput" name="appointment_date" required
                            class="w-full border-gray-300 rounded-lg p-2">
                    </div>
                    <button type="submit"
                        class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                        จอง
                    </button>
                </form>
            </div>
        </div>

        @if($errors->any())
        <ul class="text-red-500 mt-4">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <a href="{{ route('admins.index') }}" class="block text-blue-500 mt-6">กลับ</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var modal = document.getElementById('appointmentModal');
            var closeBtn = document.querySelector('.close');
            var appointmentDateInput = document.getElementById('appointmentDateInput');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/appointments/events', // Ensure this endpoint returns a valid JSON array
                dateClick: function (info) {
                    modal.classList.remove('hidden');

                    // Use selected date in input field
                    let selectedDateStr = info.dateStr;
                    appointmentDateInput.value = selectedDateStr + 'T09:00'; // Default time 9:00 AM
                }
            });

            calendar.render();

            // Close modal
            closeBtn.onclick = function () {
                modal.classList.add('hidden');
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.classList.add('hidden');
                }
            }
        });
    </script>
</body>

</html>
