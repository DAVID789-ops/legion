@extends('adminlte::page')

@section('title', 'Título de la Página')

@section('content_header')
    <h1>Legion</h1>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Deudas</h1>

    <!-- Botón para crear nueva deuda -->
    <a href="{{ route('deudas.create') }}" class="btn btn-primary mb-3">Crear Nueva Deuda</a>

    <!-- Formulario de búsqueda -->
    <form action="{{ route('deudas.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar deuda..." value="{{ request()->get('search') }}">
            <button type="submit" class="btn btn-outline-secondary">Buscar</button>
        </div>
    </form>

    <!-- Tabla de deudas -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre Colegio</th>
                <th>Cantidad Deuda</th>
                <th>Producto Entregado</th>
                <th>Fecha Entrega</th>
                <th>Email Contacto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deudas as $deuda)
                <tr>
                    <td>{{ $deuda->id }}</td>
                    <td>{{ $deuda->nombre_colegio }}</td>
                    <td>{{ $deuda->cantidad_deuda }}</td>
                    <td>{{ $deuda->producto_entregado }}</td>
                    <td>{{ $deuda->fecha_entrega }}</td>
                    <td>{{ $deuda->email_contacto }}</td>
                    <td>
                        <a href="{{ route('deudas.edit', $deuda->id) }}" class="btn btn-warning btn-sm">Modificar</a>
                        <form action="{{ route('deudas.destroy', $deuda->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {!! $deudas->links() !!}
    </div>
</div>
@endsection
