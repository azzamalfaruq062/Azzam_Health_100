@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h3>Data User</h3>
        <a class="btn btn-success btn-sm mt-2" href="{{route('artikel.create')}}">Tambah data +</a>
        <table class="table table-hover mt-2">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi Artikel</th>
                <th>Foto</th>
                <th>Tgl Artikel</th>
                <th>Kategori</th>
                <th>Editor</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $a)                
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->judul}}</td>
                <td>{{$a->isi}}</td>
                <td style="width: 10%"><img src="{{asset('storage/').'/'.$a->foto}}" width="20%"></td>
                <td>{{$a->tgl_artikel}}</td>
                <td>{{$a->Kategoris->name}}</td>
                <td>{{$a->editor}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('artikel.edit', $a->id)}}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{route('deletartikel', $a->id)}}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection