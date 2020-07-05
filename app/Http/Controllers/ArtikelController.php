<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ArtikelModel;
use Carbon\Carbon;

class ArtikelController extends Controller
{
    public function index(){
        $artikel = ArtikelModel::get_all();
        return view('index',compact('artikel'));
    }

    public function show($id){
        $artikel = ArtikelModel::get_single_data($id);
        return view('single',compact('artikel'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $judul = $request->input('judul');
        $data = array(
            'judul'     => $judul,
            'isi'       => $request->input('isi'),
            'slug'      => strtolower(Str::slug($judul,"-")),
            'tag'       => $request->input('tag'),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            'id_user'   => 1 //dalam tes, sudah dibuat terlebih dahulu
        );
        $artikel = ArtikelModel::save($data);
        return redirect('/artikel');
    }

    public function edit($id){
        $artikel = ArtikelModel::get_single_data($id);
        return view('edit',compact('artikel'));
        //dd(compact('artikel'));
    }

    public function update(Request $request, $id){
        $judul = $request->input('judul');
        $data = array(
            'judul'     => $judul,
            'isi'       => $request->input('isi'),
            'slug'      => strtolower(Str::slug($judul,"-")),
            'tag'       => $request->input('tag'),
            'updated_at'=> Carbon::now()
        );
        $artikel = ArtikelModel::update($id, $data);    
        return redirect('/artikel');
    }

    public function destroy($id){
        $artikel = ArtikelModel::delete($id);
        return redirect('/artikel');
    }
}
