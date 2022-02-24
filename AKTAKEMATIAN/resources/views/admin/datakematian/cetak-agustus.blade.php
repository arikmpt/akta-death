<!DOCTYE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content ="width=device-witdh, initial=scale-1.0">
	<meta name="csrf-token" content="{{ csrf_token ()}}">
	<style>
		table.static {
			position:relative;
			boder:1000px solid #543535
		}
	</style>
	<title>CETAK AKTA KEMATIAN KOTA PAYAKUMBUH</title>
</head>
<body>
	<div class="form-gorup">
	<br>
	<p align="center"><b>Akta Kematian</b></p>
	<table class="static" align="center" rules="all" border="1px" style="width: 95%">
		<tr style="backgruond-color: #FFF00;">
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

		</tr>
			@foreach ($cetakagustus as $item)
			<tr>
				<td> {{ $loop->iteration}}</td>
				<td>{{ $item->kelurahan }}</td>
				<td>{{ $item->nama_jenazah }}</td>
				<td>{{ $item->jenis_kelamin }}</td>
				<td>{{ $item->tanggal_kematian }}</td>
				<td>{{ $item->anak_ke }}</td>
				<td>{{ $item->nik }}</td>
				<td>{{ $item->nokk }}</td>
				<td>{{ $item->status_keluarga }}</td>
				<td><img src="{{ asset( $item->gambar ) }}" class="img-fluid" style="width:100px"></td>
					</tr>
			@endforeach
		</table>
		<br>
	</div>
	<script>
		window.print();
	</script>
</body>
		</html>
  