@extends('layouts/masterlayout')
@section('main')

echo "masuk ga ya";

<section class ="wrapper">

<ul>
	@foreach ($result as $izin)
	<li>{{ $izin -> jenis}}</li>
	<li>{{ $izin -> tanggal}}</li>
	<li>{{ $izin -> jam}}</li>
	<li>{{ $izin -> alasan}}</li>

	@endforeach
</ul>

</section>



@endsection