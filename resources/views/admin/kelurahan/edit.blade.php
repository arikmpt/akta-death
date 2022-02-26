@extends('template_backend.home')
@section('sub-judul','Edit Data Kelurahan')
@section('content')

	@if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }} 
            </div>
        @endforeach
	@endif

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif


<form action="{{ route('kelurahan.update', $data->id ) }}" method="POST">
@csrf
@method('patch')

<div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
</div>

<div class="form-group">
    <label>Kecamatan</label>
	<select class="form-control select2" name="kecamatan_id" required>
		<option value="">Pilih Kecamatan</option>
		@foreach($kecamatans as $kecamatan)
			<option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
		@endforeach
	</select>
</div>


 <div class="form-group">
    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
</div>
</form>

@endsection  