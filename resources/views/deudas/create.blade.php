@extends('adminlte::page')

@section('title', 'Título de la Página')

@section('content_header')
    <h1>Legion</h1>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col">
                <h1 class="m-0 text-dark">Crear Nueva Deuda</h1>
            </div>
            <div class="col text-right">
                <a href="{{ route('deudas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Formulario de Nueva Deuda</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('deudas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre_colegio">Nombre Colegio</label>
                        <input type="text" class="form-control @error('nombre_colegio') is-invalid @enderror" id="nombre_colegio" name="nombre_colegio" value="{{ old('nombre_colegio') }}" required>
                        @error('nombre_colegio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cantidad_deuda">Cantidad Deuda</label>
                        <input type="number" step="0.01" class="form-control @error('cantidad_deuda') is-invalid @enderror" id="cantidad_deuda" name="cantidad_deuda" value="{{ old('cantidad_deuda') }}" required>
                        @error('cantidad_deuda')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="producto_entregado">Producto Entregado</label>
                        <input type="text" class="form-control @error('producto_entregado') is-invalid @enderror" id="producto_entregado" name="producto_entregado" value="{{ old('producto_entregado') }}" required>
                        @error('producto_entregado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fecha_entrega">Fecha de Entrega</label>
                        <input type="date" class="form-control @error('fecha_entrega') is-invalid @enderror" id="fecha_entrega" name="fecha_entrega" value="{{ old('fecha_entrega') }}" required>
                        @error('fecha_entrega')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email_contacto">Email de Contacto</label>
                        <input type="email" class="form-control @error('email_contacto') is-invalid @enderror" id="email_contacto" name="email_contacto" value="{{ old('email_contacto') }}" required>
                        @error('email_contacto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar Deuda</button>
                </form>
            </div>
        </div>
    </div>
@endsection
