<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class TrickController extends Controller
{
    public function pertama()
    {
        // $siswa = Siswa::whereBetween('user_id',[0,20])->get();
        // dd($siswa);

    	// gunakan findOrFail untuk menampilkan data dari parameter, jika tak ad amaka aka tampil 404 not found
    	// $siswa = Siswa::findOrFail($id);

    	// dd($siswa);

    	// digunakan untuk hanya  memanggil dari siswa dengan ketentuan tertentu
    	// $siswa = Siswa::where('fnama','=','mba Roqis roro balqis')
    	// ->first();
		// digunakan untuk hanya satu data first ini

    	// atau bisa juga seperti ini where column
    	// $siswa = Siswa::wherejkelamin('p')->pluck('fnama','tgl_lahirtuk');

    	// $siswa = Siswa::take(10)->get();

    	// $siswa = $siswa->map(function($s, $key){
    	// 	if($s->jkelamin == "L"){
    	// 		$s->jkelamin = "Laki-Laki";
    	// 	}else{
    	// 		$s->jkelamin = "Perempuan";
    	// 	}

    	// 	return $s;
    	// });

    	$siswa = Siswa::find(19);

    	// dd($siswa->user->agama);

    	echo $siswa->user->name;
    }
}
