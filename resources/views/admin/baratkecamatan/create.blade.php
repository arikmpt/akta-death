@extends('template_backend.home')
@section('sub-judul','Tambah Akta Kematian ')
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


<form action="{{ route('baratkecamatan.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label>baratkel</label>
    <select class="form-control" name="id_baratkel">
    	<option value="" holder>Pilih baratkel</option>
    	@foreach($baratkel as $result)
    	<option value="{{ $result->id }}">{{ $result->baratkel }}</option>   	
    	@endforeach
    </select>
</div>

<div class="form-group">
    <label>Nama Almarhum Almarhumah </label>
    <input type="text" class="form-control" name="nama_jenazah">
</div>

<div class="from-group">
	 <label>Jenis Kelamin</label>
	 <br>
    <input name="jenis_kelamin" type="radio" value="Laki-laki">Laki-laki
    <input name="jenis_kelamin" type="radio" value="Perempuan"> Perempuan <br><br>
</div>

<div class="from-group">
	 <label>Tanggal Kematian</label>
    <input type="date" class="form-control" name="tanggal_kematian">
</div>
<div class="from-group">
	 <label>Anak Ke </label>
    <input type="text" class="form-control" name="anak_ke">
</div>

<div class="from-group">
	 <label>Nomor Induk Kependudukan</label>
    <input type="text" class="form-control" name="nik">
</div>

<div class="from-group">
	 <label>Nomor Kartu Keluarga</label>
    <input type="text" class="form-control" name="nokk">
</div>

<div class="form-group">
    <label>Status Hubungan Dalam Keluarga </label>
		<select class="form-control select2" name="status_keluarga">
			<option>Pilih Status Keluarga</option>
			<option>Kepala Keluarga</option>
			<option>Family Lain</option>
            <option>Istri</option>
            <option>Anak</option>
        </select>
</div>


<div class="from-group">
	 <label>Gambar</label>
    <input type="file"  class="form-control" name="gambar">
</div>

 <div class="form-group">
    <button class="btn btn-primary btn-block">Simpan Post</button>
</div>
</form>
@endsection  