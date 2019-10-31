<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Makan;

class MakanController extends Controller
{
    public function index(){
        $data = Makan::all();
        return response()->json(['code'=>0, 'status'=>true, 'message'=>'Berhasil input makanan', 'data'=>$data]);
    }
    public function createMakan(request $request){
        $makan= new Makan;
        $makan->nama= $request->nama;
        $makan->harga= $request->harga;
        $makan->save();

        // return "berhasil input data";
        return response()->json(['code'=>0, 'status'=>true,'message'=>'Berhasil input makanan']);

    }
    public function update(request $request, $id){
        $nama= $request->nama;
        $harga= $request->harga;

        $makan= Makan::find($id);
        $makan->nama=$nama;
        $makan->harga=$harga;
        $makan->save();

        return response()->json([
            'code'=>0, 
            'status'=>true,
            'message'=>'Berhasil update makanan',
            'data'=>[
                'nama'=>$nama,
                'harga'=>$harga,
                ]
            ]);
    }
    //jwt
    public function delete($id){
        $makan=Makan::find($id);
        $makan->delete();
        return response()->json([
            'code'=>0, 
            'status'=>true,
            'message'=>'Berhasil delete makanan'
        ]);
    }
}
