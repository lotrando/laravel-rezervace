<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calendar</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/cs.min.js"></script>

</head>

<body>
	<div class="container">
		<div class="row d-flex justify-content-between align-items-center">
			<div class="mt-4 col-12">
				<a href="{{ route('user.bikes.create') }}" class="btn btn-success">
					{{ __('Nová rezervace') }}
				</a>
				<a href="{{ route('user.bikes.index') }}" class="btn btn-success">
					{{ __('Přehled rezervací') }}
				</a>
				<div class="mt-3" id="calendar"></div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
            var events = @json($events);
            $('#calendar').fullCalendar({
                header: {
                    'left': 'prev, today',
                    'center': 'title',
                    'right': 'next, weeks'
                },
                aspectRatio: 1.7,
                lang: 'cs',
                events: events,
                selectable: true,
            })
        });
	</script>
</body>

</html>
