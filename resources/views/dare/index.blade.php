@extends('layout.main')

@section('title','DARE')

@section('container')
    <div class="">
        <br>
        <div class="text-center">
            <a href="/dare/new" class="btn btn-primary text-light">Input New Dare</a>
        </div><br>

        <div class="row text-center justify-content-center mt-2">
            @foreach($dares as $dare)
            <div class="card col-sm-3 col-lg-2 mr-3 mb-3" style="width: 18rem;">
                <a href="/dare/{{$dare->id}}" class="">
                    <img class="card-img-top my-2" style="height:200px; weight:auto" src="img/{{$dare->gambar}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$dare->nama}}</h5>
                        <!-- <p class="card-text">{{$dare->teks}}</p> -->
                        <!-- <form method="POST" action="/dare/{{$dare->id}}">
                            @method('delete')
                            @csrf
                            <a href="/dare/{{$dare->id}}/edit" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger">Delete</button>
                        </form> -->
                    </div>
                </a>
            </div>
            @endforeach
    </div>
@endsection