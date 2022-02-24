@extends('template_backend.home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        
               <style>
            html, body {
                color: #ffffff;
                background-image: url('{{ asset('public/assets/img/ami.webp') }}');
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                font-family: 'Bold text',serif;
                font-weight: 200;
                height: 90vh;
                margin: 0;
            }
            </style>

                <div class="container">
    <div class="row justify-content-center">
           

                <h2><b><div class="text-center">DOKUMEN AKTA KEMATIAN
                <h2><b><div class="text-center">DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL  
                <h2><b><div class="text-center"> KOTA PAYAKUMBUH 
</div>

                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        </div>
    </div>
</div>
@endsection
