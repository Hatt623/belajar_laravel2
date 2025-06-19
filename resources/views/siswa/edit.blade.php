<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h2>Edit siswa</h2>

    <form action="/siswa/{{$siswa['id']}}" method="post">
        @method('PUT')
        @csrf
        <select name="kelas" id="" required>
            <option>pilih kelas</option>
            <option value="XII RPL 1" {{ $siswa['kelas'] == 'XII RPL 1' ? 'selected' :'' }}>XII RPL 1</option>
            <option value="XII RPL 2" {{ $siswa['kelas'] == 'XII RPL 2' ? 'selected' :'' }}>XII RPL 2</option>
            <option value="XII RPL 3" {{ $siswa['kelas'] == 'XII RPL 3' ? 'selected' :'' }}>XII RPL 3</option>
        </select>
        <br>

        <input type="text" name="nama" id="" placeholder="masukkan nama anda" value="{{ $siswa['nama'] }}" required>
        <br>

        <button type="submit">simpan</button>
        <button type="reset">reset</button>
    </form>

    <a href="/siswa">kembali</a>
</body>
</html>