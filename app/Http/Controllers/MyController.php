<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
     private $arr = [
            ['id' => 1 , 'nama' => 'Abel', 'kelas' => 'XII RPL 1'],
            ['id' => 2 , 'nama' => 'Reihan', 'kelas' => 'XII RPL 2'],
            ['id' => 3 , 'nama' => 'Hexsa', 'kelas' => 'XII RPL 3'],
        ];

    public function index() // memberikan daftar data
    {
        $siswa = array_filter(session('siswa_data', $this->arr));
        return view('siswa.index', ['siswa' => $siswa]);
    }

    public function show($id){
        $siswa = collect($this->arr)->firstwhere('id',$id);
        // dd{$siswa} dd untuk cek data
        // return view('show_siswa', ['siswa' => $siswa]);

        if (! $siswa) {
            abort(404, 'Data tidak ditemukan');
        }
        return view('siswa.show', compact('siswa'));
    }

    public function create(){
       return view('siswa.create'); 
    }

    public function store(Request $request){
        $siswa = session('siswa_data', $this->arr);

        // membuat increment id
        $newid = collect($siswa)->max('id') + 1;

        // mengambil data siswa
        $siswa[] = [
            'id' => $newid,
            'nama' => request('nama'),
            'kelas' => request('kelas'),
        ];

        // simpan ke array siswa
        session(['siswa_data' => $siswa]);

        // redirect ke halaman siswa
        return redirect('siswa');
    }

    public function edit($id){
        $siswa = session('siswa_data', $this->arr);
        $siswa = collect($this->arr)->firstwhere('id', $id);

        if (! $siswa) {
            abort(404, 'Data tidak ditemukan');
        }
        return view('siswa.edit',['siswa' => $siswa]);
    }

    public function update(Request $request, $id){
        $siswa = session('siswa_data', $this->arr);

        // membuat id increment otomatis
        foreach ($siswa as &$item) {
            if ($item['id'] == $id) {
                $siswa['nama'] = $request->nama;
                $siswa['kelas'] = $request->kelas;
            }
        }

        // kembali ke array siswa
        session(['siswa_data' => $siswa]);

        // redirect ke halaman siswa
        return redirect('siswa');
    }

    public function destroy($id){
        $siswa = session('siswa_data', $this->arr);
        $index = array_search($id, array_column($siswa, 'id'));

        // hapus
        array_splice($siswa, $index, 1);

        session(['siswa_data' => $siswa]);

        // redirect ke halaman siswa
        return redirect('siswa');
    }
    
}