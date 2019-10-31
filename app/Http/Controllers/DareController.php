<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dare;
use App\Challenge;

class DareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dares=Dare::all();
        // return view('dare.index',['dares'=>$dares]);

        $dares = Dare::all();
        return response()->json(['code'=>0, 'status'=>true, 'message'=>'Berhasil ambil data dare', 'Data'=>$dares]);
    }

    public function indexAll()
    {
        $dares=Dare::all();
        $challenges=Challenge::all();
        return response()->json(['code'=>0, 'status'=>true, 'message'=>'Berhasil ambil data dare', 'Semua Data'=>['1. Dare'=>$dares, '2. Challenge'=>$challenges]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('dare.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
    	// 	'gambar' => 'required|file|image|mimes:jpeg,png,jpg,bmp|max:20480',
    	// 	'nama' => 'required',
        //     'url_video' => 'required',
        //     'isi_tantangan' => 'required',
        // ]);
        
        // nyimpen nama gambar ke variabel $gambar
        // $gambar = $request->file('gambar');
        // // nama file
        // $nama_file = $gambar->getClientOriginalName();
        // $tujuan_upload = 'img';
        // $gambar->move($tujuan_upload,$nama_file);

        // $lastId = Dare::create([
    	// 	'gambar' => $nama_file,
    	// 	'nama' => $request->nama,
    	// 	'url_video' => $request->url_video,
        // ]);

        // Challenge::create([
        //     'isi_tantangan' => $request->isi_tantangan,
        //     'dare_id' => $lastId->id
        // ]);
        
        $dare= new Dare;
        $dare->gambar= $request->gambar;
        $dare->nama= $request->nama;
        $dare->url_video= $request->url_video;
        $dare->save();
 
        $challenge= new Challenge;  
        $challenge->isi_tantangan=$request->isi_tantangan;
        $challenge->dare_id=$dare->id;
        $challenge->save();

        return response()->json(['code'=>0, 'status'=>true,'message'=>'Berhasil input data baru']);
    	// return redirect('/dare');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // $dare=Dare::find($id);
        // $challenges=Challenge::all();
        // return view('dare.show', ['dare'=>$dare], ['challenges'=>$challenges]);

        $dare=Dare::find($id);
        $challenges=Challenge::all();

        //mengambil dare_id dari database
        foreach ($challenges as $challenge){
            $challenge->dare_id;
        }

        //mengisi variabel dare_id sama dengan id dari dare
        $dare_id=$dare;

        //mengambil data challange dari database dengan mengakses variabel dare_id
        $challengeFromDare=Challenge::find($dare_id);

        //mengambil data 'isi_tantangan' dari database
        foreach ($challengeFromDare as $c){
            $tantangan=$c->isi_tantangan;
        }
        return response()->json(['code'=>0, 'status'=>true, 'message'=>'Berhasil ambil salah satu data', 'Data'=>['Dares'=>$dare, 'Tantangan'=>$tantangan]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $dare=Dare::find($id);
    //     return view('dare.edit',['dare'=>$dare]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gambar=$request->gambar;
        $nama=$request->nama;
        $url_video=$request->url_video;
        $isi_tantangan=$request->isi_tantangan;

        $dare = Dare::find($id);
        $dare->gambar= $gambar;
        $dare->nama= $nama;
        $dare->url_video= $url_video;
        $dare->save();
 
        $dare_id=$id;
        $challenge= Challenge::find($dare_id); 
        $challenge->isi_tantangan=$isi_tantangan;
        $challenge->dare_id=$dare->id;
        $challenge->save();

        return response()->json([
            'code'=>0, 
            'status'=>true,
            'message'=>'Berhasil update data',
            'Data'=>[
                'Gambar' => $gambar,
                'Nama' => $nama,
                'URL Video' => $url_video,
                'Isi Tantangan' => $isi_tantangan
                ]
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dare = Dare::find($id);
        $dare_id = $id;
        $challenge = Challenge::find($dare_id);
        $challenge->delete();
        $dare->delete();
        return response()->json([
            'code'=>0, 
            'status'=>true,
            'message'=>'Berhasil hapus data'
        ]);
    }
}
