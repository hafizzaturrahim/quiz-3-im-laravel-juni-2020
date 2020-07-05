@extends('layouts.master')

@section('content')
<div class="card shadow">
	<div class="card-header py-3">
		<a href="/artikel"><h6 class="m-0 font-weight-bold text-primary">< Kembali ke Artikel</h6></a>
	</div>
	<div class="card-body">
		<h2 class="font-weight-bold" style="color: black">{{$artikel->judul}} </h2>
		<span class="description"> <i class="fas fa-fw fa-calendar-alt"></i> {{$artikel->created_at}}  <i> (last edited : {{$artikel->updated_at}})</i></span><br>
		<span class="description"> <i class="fas fa-fw fa-table"></i> Slug : {{$artikel->slug}}</span>
		<br><br>
		<p style="color: black">{{$artikel->isi}} </p>
		
		@foreach(explode(' ', $artikel->tag) as $row)
		<button class="btn btn-sm btn-success"> {{ $row }}</button>
		@endforeach
		
	</div>
</div>
@endsection