<!-- <img src="{{ asset('img/logo_khn.svg') }}" height="80" alt="logo KHN a.s."> -->

<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF from html view file and download using dompdf in Laravel</title> 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/all.min.css') }}"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<style type="text/css"> 
    body{
        background: #fff;
        font-size: 10pt;
        font-family: 'serif';
    }
    h1 {
        font-size: 20pt;
    }
</style>
<body>
    <img src="{{ asset('img/logo_khn.svg') }}" height="64px" alt="Logo KHN a.s.">
    <div class="container text-center">  
        <h1>Smlouva o nájmu</h1>
        <small>uzavřená podle ust. 2201 a násl. Občanského zákoníku</small>
    </div>
<br>
<p><span class="text-muted">Pronajímatel:</span> Karvinská hornická nemocnice a.s. Zakladatelská 975/22, 735 06 Karviná Nové město</p>
<p><span class="text-muted">Nájemce:</span> {{ $bike->user->user_name }}</p>
<p><span class="text-muted">Datum narození:</span> {{ date('d. m. Y', strtotime($bike->date_born)) }}
<p><span class="text-muted">Osobní číslo:</span> {{ $bike->pernum }}</p>
<p><span class="text-muted">Mobilní telefon:</span> +420{{ $bike->phone }}</p>
<br>
<br>
<p><span class="text-muted">1. Předmět nájmu:</span> {{ $bike->item->name }} ( {{ $bike->item->description }} ) výrobní číslo: {{ $bike->item->serial_number }}</p>
<p><span class="text-muted">2. Doba nájmu: </span>{{ date('d. m. Y', strtotime($bike->date_start)) }}<span class="text-muted"> - </span>{{ date('d. m. Y', strtotime($bike->date_end)) }}</p>
<p><span class="text-muted">3. Nájemné: </span>{{ $price }} Kč tj. {{ $bike->item->price }} Kč za každý započatý den. Platba v pokladně nemocnice předem.</p>
<p>4. Ostatní ujednání:</p>
<p>4.1. Nájemce podpisem této smlouvy prohlašuje, že předmět nájmu fyzicky převzal, a že je bez závad.</p>
@if($bike->item->type == 'kolo')
<p>Případné drobné závady viz. protokol.</p>
@endif
<p>4.2. Nájemce, zaměstnanec pronajímatele, dává souhlas ke srážce ze mzdy podle ust. &sect; 146 ZP, pokud:</p>
<ul>
    <li><p>a) předmět nájmu odevzdá později, než bylo dohodnuto a rozdíl neuhradí v pokladně nemocnice do dvou pracovních dnů po skončení doby nájmu,</p></li>
    <li><p>b) předmět nájmu odevzdá poškozený; výše škody odpovídá ceně za opravu autorizovaným servisem,</p></li>
    <li><p>c) předmět nájmu neodevzdá (ztráta, krádež); výše škody odpovídá pořizovací ceně s přihlédnutím k amortizaci.</p></li>
</ul>
<br><br><br><br><br><br><br><br><br><br><br><br>
@if($bike->item->type == 'kolo')
<p>Kontola platby v pokladně: Účtenka č. .........................................................</p>
@else
<br><br><br>
@endif
<br>
<p>V Karviné: {{ date('d. m. Y', strtotime('now')) }}</p><br>
<p>Za pronajímatele: ______________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nájemce: ______________________________________</p>
</body>
</html>