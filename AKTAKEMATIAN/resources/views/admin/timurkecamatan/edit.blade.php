@extends('template_backend.home')
@section('sub-judul','Tambah Data kematian ')
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


<form action="{{ route('Timurkecamatan.update', $timurkecamatan->id ) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')

<div class="form-group">
    <label>timurkel</label>
    <select class="form-control" name="id_timurkel">
        <option value="" holder>Pilih timurkel</option>
        @foreach($timurkel as $result)
        <option value="{{ $result->id }}">{{ $result->timurkel }}</option>    
          @endforeach
    </select>
</div>

<div class="form-group">
    <label>nama_jenazah</label>
    <input type="text" class="form-control" name="nama_jenazah" value="{{ $timurkecamatan->nama_jenazah }}">
</div>

<div class="from-group">
     <label>Jenis Kelamin</label>
     <br>
    <input name="jenis_kelamin" type="radio" value="Laki-laki">Laki-laki
    <input name="jenis_kelamin" type="radio" value="Perempuan">Perempuan <br><br>
</div>

<div class="from-group">
	 <label>tanggal kematian</label>
    <input type="date" class="form-control" name="tanggal_kematian" value="{{ $timurkecamatan->tanggal_kematian }}">
</div>
<div class="from-group">
	 <label>anak ke </label>
    <input type="text" class="form-control" name="anak_ke" value="{{ $timurkecamatan->anak_ke }}">
</div>

<div class="from-group">
	 <label>Nomor Induk Kependudukan</label>
    <input type="text" class="form-control" name="nik" value="{{ $timurkecamatan->nik }}">
</div>

<div class="from-group">
	 <label>Nomor Kartu Keluarga</label>
    <input type="text" class="form-control" name="nokk" value="{{ $timurkecamatan->nokk }}">
</div>

<div class="form-group">
    <label>Status Hubungan Dalam Keluarga </label>
        <select class="form-control select2" name="status_keluarga" value="{{ $timurkecamatan->status_keluarga }}">
            <option>Pilih Status Keluarga</option>
            <option>Kepala Keluarga</option>
            <option>Istri</option>
            <option>Anak</option>
        </select>
</div>

<div class="from-group">
     <label>Gambar</label>
    <input type="file"  class="form-control" name="gambar">
</div>

 <div class="form-group">
    <button class="btn btn-primary btn-block">Simpan Akta Kematian</button>
</div>
</form>

@endsection 