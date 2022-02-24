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
	<form action= "/utarakecamatanutarakel" method="GET">
<a href="{{ route('utarakel.create')}}" class="btn btn-success">Tambah timur kelurahan</a>
<br></br>


	<table class =" table table-striped table-hover table-sm">
		<thead>
			<tr>
				<th>No</th>
				<th>kelurahan utara</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($utarakel as $result => $hasil)
			<tr>
				<td>{{ $result + $utarakel->firstitem() }}</td>
				<td>{{ $hasil->id_timurkel}}</td>
				<td>
					<form action="{{ route('utarakel.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						
						<a href="{{ route('utarakel.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
					
					     <br></form>
					</form>
				</tr>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $utarakel->links() }}
@endsection