@extends('template_backend.home')
@section('sub-judul','Tambah Dokumen Akta Kematian Payakumbuh Timur')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif
	
	<form class="form" method="get" action="{{ route('search') }}">
    <div class="form-group w-10 mb-3">
        <label for="search" class="d-block mr-0">Pencarian</label>
        <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan keyword">
        <button type="submit" class="btn btn-primary mb-1">Cari</button>
    </div>
</form>
<!-- Start kode untuk form pencarian -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

  <div class="row">
	<form action= "/timurkecamatan" method="GET">
	<a href="{{ route('Timurkecamatan.create') }}" class="btn btn-info btn-sm">Tambah Akta Kematian</a>
	
<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr bgcolor='#7FFF00' align='center'>
			<th>No</th>
			<th>Kelurahan</th>
			<th>Nama Almarhum Almarhumah</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Kematian</th>
			<th>Anak Ke</th>
			<th>Nomor Induk Kependudukan</th>
			<th>Nomor Kartu Keluarga</th>
			<th>Status Hubungan Dalam Keluarga</th>
			<th>Akta Kematian</th>
			<th>Action</th> </tr>
			
		</thead>
		<tbody>
			@foreach ($timurkecamatan as $result => $hasil)
			<tr>
				<td>{{ $result + $timurkecamatan->firstitem() }} </td>
				<td>{{ optional($hasil->timurkel)->timurkel}}</td>
				<td>{{ $hasil->nama_jenazah }}</td>
				<td>{{ $hasil->jenis_kelamin }}</td>
				<td>{{ $hasil->tanggal_kematian }}</td>
				<td>{{ $hasil->anak_ke }}</td>
				<td>{{ $hasil->nik }}</td>
				<td>{{ $hasil->nokk }}</td>
				<td>{{ $hasil->status_keluarga }}</td>
				<td><img src="{{ asset( $hasil->gambar ) }}" class="img-fluid" style="width:100px"></td>
				<td>
			<form action="{{ route('Timurkecamatan.destroy', $hasil->id ) }}" method="POST"> 
						@csrf
						@method('delete')
						<a href="{{ route('Timurkecamatan.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
						<a href="{{ asset( $hasil->gambar ) }}" taget="_blank" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
					
			</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $timurkecamatan->links() }}

@endsection   