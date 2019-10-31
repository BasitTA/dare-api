<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function store(Request $request){
        $profile = new Profile;
        $profile->nama=$request->nama;
        $profile->foto=$request->foto;
        $profile->save();
        return response()->json(['code'=>0, 'status'=>true,'message'=>'Berhasil input profil']);
    }

    public function index(){
        $profile = Profile::all();
        return response()->json(['code'=>0, 'status'=>true, 'message'=>'Berhasil ambil data profil', 'Data'=>$profile]);
    }

    public function update(Request $request, $id){
        $profile = Profile::find($id);
        $nama=$request->nama;
        $foto=$request->foto;

        $profile->nama=$nama;
        $profile->foto=$foto;
        $profile->save();

        return response()->json([
            'code'=>0, 
            'status'=>true,
            'message'=>'Berhasil update profil',
            'Data'=>[
                'Nama'=>$nama,
                'Foto'=>$foto,
                ]
            ]);
    }
}
