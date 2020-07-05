@extends('layouts.master')

@section('content')
<div class="card shadow">
	<div class="card-header py-3">
		<a href="/artikel"><h6 class="m-0 font-weight-bold text-primary">< Kembali ke Artikel</h6></a>
	</div>
	<div class="card-body">
		<h2 class="font-weight-bold" style="color: black">{{$artikel->judul}} </h2>
		<span class="description"> <i class="nav-icon far fa-calendar-alt"></i> {{$artikel->created_at}}  <i> (last edited : {{$artikel->updated_at}})</i></span>
		<br><br>
		<p style="color: black">{{$artikel->isi}} </p>
	</div>
</div>
@endsection