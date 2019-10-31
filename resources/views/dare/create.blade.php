@extends('layout.main')

@section('title','NEW DARE')

@section('container')
<div class="container">
    <form method="POST" action="/dare" class="mt-3" enctype="multipart/form-data">    
        @csrf
        <div class="form-group">
            <label class="font-weight-bold">Gambar</label><br>
            <input type="file" name="gambar" onchange="readURL(this)">
            <img id="blah" accept="image/jpeg, image/jpg, image/png" alt="your image" style="height:100px; width:auto;"/>
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Nama Ketakutan</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama hal yang ditakuti anak">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">URL Video (Embed)</label>
            <input type="text" class="form-control" name="url_video" placeholder="ex: https://www.youtube.com/embed/xIBST5vVq84">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Tantangan</label>
            <div class="input-group">
                <input type="text" class="form-control" name="isi_tantangan" placeholder="Tantangan">
                <button class="btn btn-success" onclick="add_fields(); return false;">+</button>
            </div>
            <div id="wrapper">
            </div>
        </div>
        <!-- <div class="form-group">
            <label class="font-weight-bold">ID Dare</label>
            <input type="text" class="form-control" name="dare_id" placeholder="ID dari Variabel Dare">
        </div> -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function add_fields(){
        var addMore= document.createElement("ADD");
        addMore.innerHTML='<br><div class="input-group"><input type="text" class="form-control" name="tantangan" placeholder="Tantangan">';
        document.getElementById('wrapper').appendChild(addMore);
    }

</script>