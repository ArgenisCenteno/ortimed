<table class="table mt-3 text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>Número</th>
            <th>Capacidad</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mesas as $mesa)
            <tr>
                <td>{{ $mesa->id }}</td>
                <td>{{ $mesa->numero }}</td>
                <td>{{ $mesa->capacidad }}</td>
                <td>{{ $mesa->estado }}</td>
                <td>
                    <a href="{{ route('mesas.edit', $mesa) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('mesas.destroy', $mesa) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar mesa?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@section('js')
@include('layout.script')
<script src="{{ asset('js/adminlte.js') }}"></script>
@endsection