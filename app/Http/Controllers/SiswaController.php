<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Siswa;
use App\Mapel;
use PDF;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
    	if($request->has('cari')){
    		$data_siswa = \App\Siswa::where('fnama','LIKE','%'.$request->cari.'%')->get();
    	}else{
			$data_siswa = \App\Siswa::all();
    	}
    	
    	return view('siswa.index',['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'fnama' => 'required',
            'lnama' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'avatar' => 'mimes:jpg,png'

        ],
        [
            'unique' => 'Email itu sudah ada',
            'required' => 'Ini wajib di Isi',
            'mimes' => 'Kamu harus memuat filenya (dot) jpeg/jpg/png'
        ]);
    	// insert ke tabel users
    	$user = new \App\User;
		$user->role ='siswa';
		$user->name = $request->fnama;
		$user->email = $request->email;
		$user->password = bcrypt('rahasia'); //trus tambahkan slice (\)
		$user->remember_token = \Str::random(60); //kalo di laravel 6 kebawah pakainya underscore(_)
		$user->save();

    	//insert ke tabel siswa
    	$request->request->add(['user_id' => $user->id]);

    	$siswa = \App\Siswa::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
           
        } $siswa->save();
    	return redirect('/siswa')->with('sukses','Data berhasil di input');
    }

    public function edit(Siswa $siswa)
    {
    	return view('siswa/edit',['siswa' => $siswa]);
    }

    public function update(Request $request,Siswa $siswa)
    {
    	// dd($request -> all());
        $this->validate($request,[
            'fnama' => 'required',
            'lnama' => 'required|min:5',
            'avatar' => 'mimes:jpg,png,jpeg'

        ],
        [
            'required' => 'Ini wajib di Isi'
        ]);
    	$siswa->update($request->all());
    	if($request->hasFile('avatar')){
    		$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
    		$siswa->avatar = $request->file('avatar')->getClientOriginalName();
    		$siswa->save();
    	}
    	return redirect('/siswa')->with('sukses','Data berhasil di update');
    }

    public function delete(Siswa $siswa)
    {	
    	$siswa->delete();
    	return redirect('/siswa')->with('sukses','Data berhasil di delete');
    }

    public function profile(Siswa $siswa)
    {
    	// $siswa = \App\Siswa::find($id);
        $mapels = \App\Mapel::all();

        //membuat categoriex
        $categories = [];
        $dataseries = [];


        foreach($mapels as $m){
            if($siswa->mapel()->wherePivot('mapel_id',$m->id)->first()){
                $categories[] = $m->nama;
                $dataseries[] = $siswa->mapel()->wherePivot('mapel_id', $m->id)->first()->pivot->nilai;
            }
        }

        // dd(json_encode($dataseries));
        // dd($dataseries);

    	return view('siswa.profile', compact('siswa','mapels','categories','dataseries'));

    }

    public function addnilai(Request $request, $idsiswa)
    {
        // dd($request->all());
        $siswa = \App\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id' ,$request->mapel)->exists()){
            return redirect('siswa/' .$idsiswa .'/profile')->with('error','Nilai untuk mapel tersebut, sudah terisi.');

        }

        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

        return redirect('siswa/'.$idsiswa. '/profile')->with('sukses','Data Nilai berhasil terinput');

    }

    public function deletenilai($idsiswa, $idmapel)
    {
        $siswa = \App\Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses', 'Data Berhasil di Delete');
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPDF()
    {
        $siswa= \App\Siswa::all();
        $pdf = PDF::loadView('export.siswapdf',['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function get()
    {
        $siswa= Siswa::select('siswa.*');
        
        return \DataTables::eloquent($siswa)
        ->addColumn('nm_lngkap', function($s){
            return $s->fnama.' '.$s->lnama;
        })
        ->addColumn('rata2_nilai', function($s){
            return $s->nilaiRataRata();
        })
        ->addColumn('action', function($s){
            return '<a href="/siswa/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->editColumn('delete', function($s){
            return '<a href="/siswa/'.$s->id.'/delete" class="btn btn-danger btn-sm delete" id ='.$s->id.' >Delete</a>';
        })
        ->rawColumns(['delete','action','rata2_nilai','nm_lngkap'])
        ->toJson();
    }

    public function profilsaya()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profilsaya', compact(['siswa'])) ;
    }
}
