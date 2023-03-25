@extends('app')

@section('content')
<div class="cotainer w-25 border p-4 mx-auto mt-4">
    <form action="{{ route('todos') }}" method="POST">
        @csrf
        @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('title')
            <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Título de la tarea</label>
            <input type="text" class="form-control" name="title">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection