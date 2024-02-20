@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- DataTables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


@stop

@section('content')
<table id="tablaClientes" class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>ID Asesor</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Teléfono Dos</th>
            <th>Etiqueta</th>
            <th>Compras</th>
            <th>Fecha</th>
        </tr>
    </thead>
</table>

<script>
$(document).ready(function() {
    $('#tablaClientes').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('clientes.get') }}",
        "columns": [
            { "data": "nombre" },
            { "data": "id_Asesor" },
            { "data": "correo" },
            { "data": "telefono" },
            { "data": "telefonoDos" },
            { "data": "etiqueta" },
            { "data": "compras" },
            { "data": "fecha" }
        ]
    });
});
</script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<!-- DataTables JavaScript CDN -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
@stop
