@extends('template_backend.home')
@section('sub-judul','Edit baratkel')
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


<form action="{{ route('baratkel.update', $baratkel->id) }}" method="POST">
@csrf
@method('patch')
<div class="form-group">
    <label>baratkel</label>
    <input type="text" class="form-control" name="baratkel" value="{{ $baratkel->baratkel }}" >
</div>

 <div class="form-group">
    <button class="btn btn-primary btn-block">Update</button>
</div>

</form>

@endsection