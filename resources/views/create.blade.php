@extends('templates.app')

@section('titulo', 'Criar Diarista - E-diaristas')

@section('conteudo')
    <h1>Criar Diaristas</h1>
            
    <form action="{{ route('diaristas.store') }}" method="POST" enctype="multipart/form-data">
        @include('components._form')
    </form>
@endsection