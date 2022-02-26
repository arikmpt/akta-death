@extends('template_backend.home')
@section('sub-judul','Tambah Data Kecamatan')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif
	
	<form class="form" method="get" action="{{ route('kecamatan.search')}}">
		<div class="form-group w-100 mb-3">
			<label for="search" class="d-block mr-2">Pencarian</label>
			<input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
			<button type="submit" class="btn btn-primary mb-1">Cari</button>
		</div>
	</form>


    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('kecamatan.create') }}" class="btn btn-info btn-sm">Tambah Data Kecamatan</a>
        </div>


	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<th>No</th>
			<th>Nama</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach ($data as $result => $hasil)
			<tr>
				<td>{{ $result + $data->firstitem() }} </td>
				<td>{{ $hasil->nama }}</td>
				<td>
					<form action="{{ route('kecamatan.destroy', $hasil->id ) }}" method="POST"> 
						@csrf
						@method('delete')
						<a href="{{ route('kecamatan.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


@endsection   