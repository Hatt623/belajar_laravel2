<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($barang && $promo)
            Barang : {{$barang}} <br>
            Promo : {{$promo}} <br>
    @elseif ($barang)
            semua promo barang <br>
    @endif
</body>
</html>