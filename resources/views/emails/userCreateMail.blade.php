@component('mail::message')
Do rezervačního systému byla vložena vaše nová rezervace.

<strong>Uživatel:</strong> {{ $data['user'] }}<br>
<strong>Osobní číslo:</strong> {{ $data['pernum'] }}<br>
<strong>Email:</strong> {{ $data['email'] }}<br>
<strong>Telefon:</strong>{{ $data['phone'] }}<br>
<strong>Rezervováno:</strong>{{ $data['item'] }}<br>
<strong>Od:</strong> {{ date('d. m. Y', strtotime($data['start'])) }}<br>
<strong>Do:</strong> {{ date('d. m. Y', strtotime($data['end'])) }}<br>

@endcomponent