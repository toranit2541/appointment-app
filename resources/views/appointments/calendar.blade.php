<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ปฏิทินการจอง</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
</head>
<body>
    <h1>ปฏิทินการจอง</h1>
    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/appointments/events', // This will be your Laravel route returning JSON
            });
            calendar.render();
        });
    </script>
</body>
</html>
