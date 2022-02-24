@extends('template_backend.home')
@section ('sub-judul','baratkel')
@section('content')


<!-- Start kode untuk form pencarian -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

  <div class="row">
	<form action= "/baratkecamatan" method="GET">
<a href="{{ route('baratkel.create')}}" class="btn btn-success">Tambah baratkel</a>
<br></br>


	<table class =" table table-striped table-hover table-sm">
		<thead>
			<tr>
				<th>No</th>
				<th>kelurahan barat</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($baratkel as $result => $hasil)
			<tr>
				<td>{{ $result + $baratkel->firstitem() }}</td>
				<td>{{ $hasil->baratkel}}</td>
				<td>
					<form action="{{ route('baratkel.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						
						<a href="{{ route('baratkel.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
					
					     <br></form>
					</form>
				</tr>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $baratkel->links() }}
@endsection