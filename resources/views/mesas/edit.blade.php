@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($mesa) ? 'Editar Mesa' : 'Nueva Mesa' }}</h1>
    <form action="{{ isset($mesa) ? route('mesas.update', $mesa) : route('mesas.store') }}" method="POST">
        @csrf
        @if(isset($mesa))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" name="numero" id="numero" class="form-control"
                value="{{ $mesa->numero ?? old('numero') }}" required>
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="number" name="capacidad" id="capacidad" class="form-control"
                value="{{ $mesa->capacidad ?? old('capacidad') }}" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="Disponible" {{ (isset($mesa) && $mesa->estado == 'Disponible') ? 'selected' : '' }}>
                    Disponible</option>
                <option value="Ocupada" {{ (isset($mesa) && $mesa->estado == 'Ocupada') ? 'selected' : '' }}>Ocupada
                </option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('mesas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection