@extends('template_backend.home')
@section ('sub-judul','latinakel')
@section('content')


<!-- Start kode untuk form pencarian -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

  <div class="row">
	<form action= "/latinakecamatan" method="GET">
<a href="{{ route('latinakel.create')}}" class="btn btn-success">Tambah timur kelurahan</a>
<br></br>


	<table class =" table table-striped table-hover table-sm">
		<thead>
			<tr>
				<th>No</th>
				<th>kelurahan Latina</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($latinakel as $result => $hasil)
			<tr>
				<td>{{ $result + $latinakel->firstitem() }}</td>
				<td>{{ $hasil->latinakel}}</td>
				<td>
					<form action="{{ route('latinakel.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						
						<a href="{{ route('latinakel.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
					
					     <br></form>
					</form>
				</tr>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $latinakel->links() }}
@endsection