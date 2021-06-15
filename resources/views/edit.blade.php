@extends('templates.app')

@section('titulo', 'Editar Diarista - E-diaristas')

@section('conteudo')
    <h1>Editar Diaristas</h1>
            
    <form action="{{ route('diaristas.update', $diarista->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        
        @include('components._form')
    </form>
@endsection