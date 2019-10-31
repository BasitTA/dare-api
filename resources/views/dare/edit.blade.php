@extends('layout.main')

@section('title','EDIT DARE')

@section('container')
<div class="container">
    <form method="POST" action="/dare/{{$dare->id}}" class="mt-3" enctype="multipart/form-data">    
        @method('PUT')
        @csrf
        <div class="form-group">
            <label class="font-weight-bold">Gambar</label><br>
            <input type="file" name="gambar">
            <!-- value="{{$dare->gambar}} -->
        <!-- </div> -->
        <div class="form-group">
            <label class="font-weight-bold">Nama Ketakutan</label>
            <input type="text" class="form-control" name="nama" value="{{$dare->nama}}">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Kalimat Motivasi</label>
            <input type="text" class="form-control" name="teks" value="{{$dare->teks}}">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Manfaat Menghindari Ketakutan</label>
            <input type="text" class="form-control" name="deskripsi" value="{{$dare->deskripsi}}">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">URL Video</label>
            <input type="text" class="form-control" name="url_video" value="{{$dare->url_video}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection