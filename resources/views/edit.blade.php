@extends('layouts.master')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Buat Artikel Baru</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<form action="/artikel/{{$artikel->id_artikel}}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title">Judul Artikel :</label>
				<input type="text" class="form-control" id="title" name="judul" required="" value="{{$artikel->judul}}">
			</div>
			<div class="form-group">
				<label for="description">Isi Artikel :</label>
				<textarea class="form-control" id="description" name="isi" rows="5" required="">{{$artikel->isi}}</textarea>
			</div>
			<div class="form-group">
				<label for="title">Tags :</label>
				<input type="text" class="form-control" id="title" name="tag" placeholder="dipisahkan dengan spasi" value="{{$artikel->tag}}">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<!-- /.card-body -->
</div>

@endsection