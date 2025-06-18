<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    barang : <b> {{$a}} </b> <br>
    harga : <b> {{$b}} </b> <br>

    @if($b > 100)
        Anda mendapatkan cashback 10%
    @elseif($b > 50)
        Anda mendapatkan cashback 5%
    @else
        Anda tidak dapat cashback
    @endif

</body>
</html>