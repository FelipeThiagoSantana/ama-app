<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'pt-br',
            headerToolbar: {
                start: 'prev,next',
                center: 'title',
                end: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: '/api/atendimentos', // Endpoint que retorna os dados dos eventos
            initialView: 'dayGridMonth',
            buttonText: {
                today: 'Hoje',
                month: 'Mês',
                week: 'Semana',
                day: 'Dia',
                list: 'Lista'
            },
            allDayText: 'Horas',
            noEventsText: 'Nenhum evento para exibir',
            eventClick: function(info) {
                var eventId = info.event.id;
                var showRoute = `/atendimento/${eventId}`
                window.location.href = showRoute;
            }
        });

        calendar.render();
    });

</script>
</head>
<body>
<div id='calendar' class="font-semibold m-4 text-md text-gray-800 dark:text-gray-200 leading-tight"></div>
</body>
