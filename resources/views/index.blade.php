@extends('layouts.master')

@section('content')
<div class="row mb-2">
	<div class="col-sm-6">
		<h2>Daftar Pertanyaan</h2>
	</div>
	<div class="col-sm-6">
		<ol class="float-right">
			<a class="btn btn-success" href="/artikel/create">Buat Artikel</a>
		</ol>
	</div>
</div>

<div class="card">
	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Judul Artikel</th>
					<th>Tanggal Dibuat</th>
					<th>Terakhir Diperbaharui</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($artikel as $item)
				<tr>
					<td>{{$loop->iteration}} </td>
					<td><a href="/artikel/{{$item->id_artikel}} ">{{$item->judul}}</a></td>
					<td>{{$item->created_at}}</td>
					<td>{{$item->updated_at}}</td>
					<td><a class="btn btn-sm btn-warning" href="/artikel/{{$item->id_artikel}}/edit">Edit</a>
						<form action="/artikel/{{$item->id_artikel}}" method="POST" style="display: inline;">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa fa-trash"></i> Hapus</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>
@endsection

@push('scripts')
<!-- script tambahan sweet alert, bukan dari bawaan sb-admin-2 -->
<script src="{{asset('/sbadmin2/js/swal.min.js')}}"></script>

<script>
	Swal.fire({
		title: 'Berhasil!',
		text: 'Memasangkan script sweet alert',
		icon: 'success',
		confirmButtonText: 'Cool'
	})
</script>
@endpush