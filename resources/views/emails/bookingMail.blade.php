@component('mail::message')
# Nová rezervace Kola nebo AutoboBoxu

Do rezervačního systému byla vložena nová rezervace.

<strong>Uživatel:</strong> {{ $data['user'] }}<br>
<strong>Osobní číslo:</strong> {{ $data['pernum'] }}<br>
<strong>Email:</strong> {{ $data['email'] }}<br>
<strong>Telefon:</strong> {{ $data['phone'] }}<br>
<strong>Rezervováno:</strong> {{ $data['item'] }}<br>
<strong>Od:</strong> {{ date('d. m. Y', strtotime($data['start'])) }}<br>
<strong>Do:</strong> {{ date('d. m. Y', strtotime($data['end'])) }}<br>

@component('mail::button', ['url' => 'http://192.168.87.125:8888/user/bikes/'. $data['id'] .'/edit'])
Zobrazit rezervaci
@endcomponent
@component('mail::button', ['url' => 'http://localhost/user/bikes'])
Zobrazit seznam rezervací
@endcomponent

@endcomponent