<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::all();
        return view('artikel.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Kategori::all();
        return view('artikel.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tgl_artikel' => $request->tgl_artikel,
            'foto' => $request->file('foto')->store('img'),
            'kategoris_id' => $request->kategoris_id,
            'editor' => $request->editor,
        ]);

        return redirect('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        $data = Kategori::all();
        return view('artikel.edit', compact('artikel', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        if($request->file('foto')){
            $artikel->judul = $request->judul;
            $artikel->isi = $request->isi;
            $artikel->tgl_artikel = $request->tgl_artikel;
            $artikel->kategoris_id = $request->kategoris_id;
            $artikel->editor = $request->editor;
            $artikel->foto = $request->file('foto')->store('img');
            $artikel->save();
        }else{
            $artikel->judul = $request->judul;
            $artikel->isi = $request->isi;
            $artikel->tgl_artikel = $request->tgl_artikel;
            $artikel->kategoris_id = $request->kategoris_id;
            $artikel->editor = $request->editor;
            $artikel->foto = $artikel->foto;
            $artikel->save();
        }

        return redirect('artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect('artikel');
    }

    public function tampil()
    {
        $data = Artikel::all();
        return view('welcome', compact('data'));
    }

}
