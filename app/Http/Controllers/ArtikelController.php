<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ArtikelModel;

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
            'slug'      => Str::slug($judul,"-"),
            'tag'       => $request->input('tag'),
            'created_at'=> Carbon\Carbon::now(),
            'updated_at'=> Carbon\Carbon::now(),
            'id_user'   => 1 //dalam tes, sudah dibuat terlebih dahulu
        );
        $question = ArtikelModel::save($data);
        return redirect()->action('ArtikelController@index');
    }

    public function update($id){
        $question = ArtikelModel::get_single_data($id);
        return view('crud.form-edit-question',compact('question'));
        //dd(compact('question'));
    }

    public function edit(Request $request,$id){
        $question = ArtikelModel::update($id, $request->all());    
        return redirect('/pertanyaan');
    }

    public function destroy($id){
        $question = AnswerModel::delete($id);
        $question = ArtikelModel::delete($id);
        return redirect('/pertanyaan');
    }
}
