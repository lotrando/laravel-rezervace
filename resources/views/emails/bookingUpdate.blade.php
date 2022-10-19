@component('mail::message')
  # Editace rezervace Kola nebo AutoboBoxu

  V rezervačního systému byla upravena rezervace.

  <strong>Uživatel:</strong> {{ $data['user'] }}<br>
  <strong>Osobní číslo:</strong> {{ $data['pernum'] }}<br>
  <strong>Email:</strong> {{ $data['email'] }}<br>
  <strong>Rezervováno:</strong> {{ $data['item'] }}<br>

  Původní rezervace

  <strong>Telefon:</strong> {{ $data['oldphone'] }}<br>
  <strong>Od:</strong> {{ date('d. m. Y', strtotime($data['oldstart'])) }}<br>
  <strong>Do:</strong> {{ date('d. m. Y', strtotime($data['oldend'])) }}<br>

  Aktualizovaná rezervace

  <strong>Telefon:</strong> {{ $data['phone'] }}<br>
  <strong>Od:</strong> {{ date('d. m. Y', strtotime($data['start'])) }}<br>
  <strong>Do:</strong> {{ date('d. m. Y', strtotime($data['end'])) }}<br>

  @component('mail::button', ['url' => 'http://192.168.87.125:8888/user/bikes/' . $data['id'] . '/edit'])
    Zobrazit upravenou rezervaci
  @endcomponent
  @component('mail::button', ['url' => 'http://192.168.87.125:8888/user/bikes/'])
    Zobrazit seznam rezervací
  @endcomponent
@endcomponent
