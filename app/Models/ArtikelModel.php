<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArtikelModel{
	public static function get_all(){
		$question = DB::table('artikel')->get();
		return $question;
	}

	public static function save($data){
		$new_artikel = DB::table('artikel')->insert($data);
		return $new_artikel;
	}

	public static function get_single_data($id){
		$result = DB::table('artikel')->where('id_artikel',$id)->first();
		return $result;
	}

	public static function update($id, $request){
		$question = DB::table('artikel')
						->where('id_artikel',$id)
						->update([
							'judul'	=> $request['judul'],
							'isi' 	=> $request['isi']

						]);
		return $question;
	}

	public static function delete($id){
		$deleted = DB::table('artikel')->where('id_artikel',$id)->delete();
		return $deleted;
	}


}
?>