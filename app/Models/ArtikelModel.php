<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArtikelModel{
	public static function get_all(){
		$artikel = DB::table('artikel')->get();
		return $artikel;
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
		$artikel = DB::table('artikel')
						->where('id_artikel',$id)
						->update($request);
		return $artikel;
	}

	public static function delete($id){
		$deleted = DB::table('artikel')->where('id_artikel',$id)->delete();
		return $deleted;
	}


}
?>