@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('artikel.update', $artikel->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>Judul :</label>
                <input class="form-control" type="text" name="judul" value="{{$artikel->judul}}">
            </div>
            <div class="mb-2">
                <label>Foto :</label>
                <input class="form-control" type="file" name="foto" value="{{$artikel->foto}}">
            </div>
            <div class="mb-2">
                <label>Tgl Artikel :</label>
                <input class="form-control" type="date" name="tgl_artikel" value="{{$artikel->tgl_artikel}}">
            </div>
            <div class="mb-2">
                <label>Kategori :</label>
                <select class="form-control" name="kategoris_id">
                    <option value="{{$artikel->kategoris_id}}">{{$artikel->kategoris->name}}</option>
                    @foreach ($data as $k)
                        <option value="{{$k->id}}">{{$k->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label>Editor :</label>
                <input class="form-control" type="text" name="editor" value="{{$artikel->editor}}">
            </div>
            <div class="mb-2">
                <label>Isi Artikel :</label>
                <textarea class="form-control" name="isi" rows="10">{{$artikel->isi}}</textarea>
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection