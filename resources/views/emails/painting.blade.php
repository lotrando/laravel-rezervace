@component('mail::message')
  # Nová rezervace malování

  Do rezervačního systému byla vložena nová rezervace na malovaní.

  <strong>Uživatel:</strong> {{ $data['user'] }}<br>
  <strong>Email:</strong> {{ $data['email'] }}<br>
  <strong>Oddělení:</strong> {{ $data['department'] }}<br>
  <strong>Místnosti:</strong> {{ $data['rooms'] }}<br>
  <strong>Od:</strong> {{ date('d. m. Y', strtotime($data['start'])) }}<br>
  <strong>Do:</strong> {{ date('d. m. Y', strtotime($data['end'])) }}<br>

  @component('mail::button', ['url' => 'http://192.168.87.125:8888/user/reservations/' . $data['id'] . '/edit'])
    Zobrazit rezervaci
  @endcomponent
  @component('mail::button', ['url' => 'http://192.168.87.125:8888/user/reservations/'])
    Zobrazit seznam rezervací
  @endcomponent
@endcomponent
