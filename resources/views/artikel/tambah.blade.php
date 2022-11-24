@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('artikel.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-2">
                <label>Judul :</label>
                <input class="form-control" type="text" name="judul" >
            </div>
            <div class="mb-2">
                <label>Foto :</label>
                <input class="form-control" type="file" name="foto" >
            </div>
            <div class="mb-2">
                <label>Tgl Artikel :</label>
                <input class="form-control" type="date" name="tgl_artikel" >
            </div>
            <div class="mb-2">
                <label>Kategori :</label>
                <select class="form-control" name="kategoris_id">
                    @foreach ($data as $k)
                        <option value="{{$k->id}}">{{$k->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <input class="form-control" type="hidden" name="editor" value="Admin1">
            </div>
            <div class="mb-2">
                <label>Isi Artikel :</label>
                <textarea class="form-control" name="isi" rows="10"></textarea>
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection