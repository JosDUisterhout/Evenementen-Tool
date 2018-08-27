
<!-- Layout uitnodiging als mail-->

<html>
<head></head>
<body style="background: black; color: white">
<h1>Uitnodiging voor evenement: {{$data['event']}}</h1>
<p>Hallo {{$data['target']}} ,</p>
<p>U bent door {{$data['user']}} uitgenodigt voor het evenement {{$data['event']}}.</p>
<p>Klik op de link om de uitnodiging te beantwoorden.</p>
<a href="{{$data['link']}}">{{$data['link']}}</a>
<p>Let op: dit is een noreply email adres. Berichten naar dit adres worden niet beantwoord.</p>
</body>
</html>

