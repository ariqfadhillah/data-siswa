<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SiteController extends Controller
{
    public function home()
    {
        $posts = \App\Post::all();
        return view('sites.home', compact('posts'));
    }

    public function about()
    {
        return view('sites.about');
    }

    public function register()
    {
        return view('sites.register');
    }

   	public function postRegister(Request $request)
   	{

   		$user = new \App\User;
		$user->role ='siswa';
		$user->name = $request->fnama;
		$user->email = $request->email;
		$user->password = bcrypt($request->password); //trus tambahkan slice (\)
		$user->remember_token = \Str::random(60); //kalo di laravel 6 kebawah pakainya underscore(_)
		$user->save();

		$request->request->add(['user_id' => $user->id]);

    	$siswa = \App\Siswa::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
           
        } $siswa->save();
    	return redirect('/')->with('sukses','Data berhasil di input');
   	}

    public function singlePost($slug)
    {
        // Menampilkan data dalam table post yang sesuai dengan parameter
        $post = Post::where('slug', '=' ,$slug)->first(); 

        return view('sites.singlepost', compact(['post']));
    }

}
