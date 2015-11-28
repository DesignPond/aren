<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Message depuis le site www.aren.ch</h2>
    @if(isset($societe))
        <h4>{{ $societe }}</h4>
    @endif
    <p>{{ $nom }}</p>
    <p>E-mail: {{ $email }}</p>
    <p>Tél. : {{ $telephone }}</p>
    <div>{{ $remarque }}</div>

    <p><a style="color: #444; font-size: 13px;" href="http://www.aren.ch">www.aren.ch</a></p>
</body>
</html>