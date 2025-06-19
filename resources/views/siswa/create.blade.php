<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Tambah siswa</h2>

    <form action="/siswa" method="post">
        @csrf
        <select name="kelas" id="" required>
            <option>pilih kelas</option>
            <option value="XII RPL 1">XII RPL 1</option>
            <option value="XII RPL 2">XII RPL 2</option>
            <option value="XII RPL 3">XII RPL 3</option>
        </select>
        <br>

        <input type="text" name="nama" id="" placeholder="masukkan nama anda" required>
        <br>

        <button type="submit">simpan</button>
        <button type="reset">reset</button>
    </form>

    <a href="/siswa">kembali</a>
    
</body>
</html>