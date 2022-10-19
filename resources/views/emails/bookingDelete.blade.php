@component('mail::message')
# Odstranění rezervace

Byla smazána rezervace Kola nebo AutoboBoxu

<strong>Uživatel:</strong> {{ $data['user'] }}<br>
<strong>Osobní číslo:</strong> {{ $data['pernum'] }}<br>
<strong>Email:</strong> {{ $data['email'] }}<br>
<strong>Telefon:</strong> {{ $data['phone'] }}<br>
<strong>Rezervováno:</strong> {{ $data['item'] }}<br>
<strong>Od:</strong> {{ date('d. m. Y', strtotime($data['start'])) }}<br>
<strong>Do:</strong> {{ date('d. m. Y', strtotime($data['end'])) }}<br>

@component('mail::button', ['url' => 'http://192.168.87.125:8888/user/bikes/'])
Zobrazit seznam rezervací
@endcomponent

@endcomponent