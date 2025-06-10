@extends('template')

@section('title','categorias')

@push('css')

    
@endpush

@section('content')


<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center">Categorias</h1>
                        <ol class="breadcrumb mb-4 text-center">
                            <li class="breadcrumb-item"><a href="{{ route('panel')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Categorias </li>
                        </ol>
                    </div>


@endsection



@push('js')
    
@endpush