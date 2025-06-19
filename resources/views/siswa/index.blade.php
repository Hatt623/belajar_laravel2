<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Daftar siswa</h1>
    <hr>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>

        @php $no=1 @endphp

        @foreach ($siswa as $data)
            <tr>
                <td> {{$no++}} </td>
                <td> {{$data['nama'] ?? ''}} </td>
                <td> {{$data['kelas'] ?? ''}} </td>
                <td> 
                   
                    <a href="/siswa/{{$data['id']}}"> Show </a> 
                    <a href="/siswa/{{$data['id']}}/edit"> edit </a> 
                    {{-- <a href="/siswa/create"> create </a> --}}
                     <form action="/siswa/{{$data['id']}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah anda yakin?')"> delete </button>
                    </form>
                </td>
            </tr>
        @endforeach        
    </table>

</body>
</html>