@extends('layout.main')

@section('title','DARE LIST')

@section('container')
    <div class="container">
        <h3 class="text-center mt-2 mb-2">{{$dare->nama}}</h3>
        <div class="jumbotron text-center">
            <div class="text-left" style="margin-top:-30px">
                <a href="/dare" class="text-primary"><< Kembali</a><br>
            </div>
            <img class="mt-3" style="height:200px; weight:auto" src="../img/{{$dare->gambar}}" alt="">
            <hr class="my-4">

            <!-- Button trigger modal -->

            <!-- Tombol Putar Video -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#putarVideo">
                Tonton Yuk! Biar kamu ga takut
            </button>

            <!-- Tombol tantangan -->
            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#tantangan">
                Mulai berani? Yuk ikuti tantangan ini!
            </button>

            <!-- Modal -->
            <div class="modal fade" id="putarVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Dare Video</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$dare->url_video}}" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <p class="text-muted"><small>Source: Youtube.com</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="tantangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tantangan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <button class="dropdown-item" type="button"></button>
                            <div class="">
                                <p src=""></p>
                            </div> -->
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    @foreach($dare->challenges as $challenge)
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="collapseOne">
                                                Tantangan {{$loop->iteration}}
                                            </button>
                                            <input type="checkbox">
                                        </h2>
                                    </div>

                                    <div id="collapse{{$loop->iteration}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            {{$challenge->isi_tantangan}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Tantangan Kedua
                                            </button>
                                            <input type="checkbox">
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Tantangan Ketiga
                                            </button>
                                            <input type="checkbox">
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        </div>
                        <!-- <div class="modal-footer">
                            <p class="text-muted"><small>Source: Youtube.com</small></p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(".modal-backdrop, #myModal .close, #myModal .btn").live("click", function() {
        jQuery("#myModal iframe").attr("src", jQuery("#myModal iframe").attr("src"));
    });
    </script>
@endsection
