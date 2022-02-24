@extends('template_backend.home')
@section ('sub-judul','timurkel')
@section('content')


<!-- Start kode untuk form pencarian -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

  <div class="row">
	<form action= "/timurkecamatan" method="GET">
<a href="{{ route('keltimur.create')}}" class="btn btn-success">Tambah timur kelurahan</a>
<br></br>


	<table class =" table table-striped table-hover table-sm">
		<thead>
			<tr>
				<th>No</th>
				<th>kelurahan Timur</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($timurkel as $result => $hasil)
			<tr>
				<td>{{ $result + $timurkel->firstitem() }}</td>
				<td>{{ $hasil->id_timurkel}}</td>
				<td>
					<form action="{{ route('keltimur.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						
						<a href="{{ route('keltimur.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
					
					     <br></form>
					</form>
				</tr>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $timurkel->links() }}
@endsection