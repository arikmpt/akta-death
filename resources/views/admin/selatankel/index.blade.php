@extends('template_backend.home')
@section ('sub-judul','selatankel')
@section('content')


<!-- Start kode untuk form pencarian -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

  <div class="row">
	<form action= "/selatankecamatan" method="GET">
<a href="{{ route('selatankel.create')}}" class="btn btn-success">Tambah kelurahan selatan</a>
<br></br>


	<table class =" table table-striped table-hover table-sm">
		<thead>
			<tr>
				<th>No</th>
				<th>kelurahan Selatan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($selatankel as $result => $hasil)
			<tr>
				<td>{{ $result + $selatankel->firstitem() }}</td>
				<td>{{ $hasil->id_selatankel}}</td>
				<td>
					<form action="{{ route('selatankel.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						
						<a href="{{ route('selatankel.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
					
					     <br></form>
					</form>
				</tr>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $selatankel->links() }}
@endsection