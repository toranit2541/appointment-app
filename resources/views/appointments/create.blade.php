<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>กายภาพบำบัด โรงพยาบาลรวมชัยประชารักษ์</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <style>
        /* Basic Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
        }

        .close {
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>สมุดการจองการรับบริการ</h1>
    <a href="{{ route('appointments.index') }}">กลับ</a>

    <h1>ปฏิทินการจอง</h1>
    <div id="calendar"></div>

    <!-- Popup Modal -->
    <div id="appointmentModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>จองการรับบริการ</h2>
            <form id="appointmentForm" action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <p>คำนำหน้า: <input type="text" name="prefix" required></p>
                <p>ชื่อ: <input type="text" name="first_name" required></p>
                <p>นามสกุล: <input type="text" name="last_name" required></p>
                <p>เลขบัตรประชาชน: <input type="text" name="id_card" required></p>
                <p>วัน-เดือน-ปี เกิด: <input type="date" name="birthdate" required></p>
                <p>อีเมล: <input type="email" name="email" required></p>
                <p>จองวันที่: <input type="datetime-local" id="appointmentDateInput" name="appointment_date" required>
                </p>
                <button type="submit">จอง</button>
            </form>
        </div>
    </div>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('admins.index') }}">กลับ</a>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var modal = document.getElementById('appointmentModal');
            var closeBtn = document.querySelector('.close');
            var appointmentDateInput = document.getElementById('appointmentDateInput');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/appointments/events',
                dateClick: function (info) {
                    modal.style.display = 'block';

                    // Use info.dateStr (Recommended)
                    let selectedDateStr = info.dateStr; // "YYYY-MM-DD"
                    appointmentDateInput.value = selectedDateStr + 'T09:00';
                }
            });

            calendar.render();

            // Close Modal Logic
            closeBtn.onclick = function () {
                modal.style.display = 'none';
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        });
    </script>
</body>

</html>