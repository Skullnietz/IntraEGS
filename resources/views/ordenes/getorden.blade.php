@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- DataTables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


@stop

@section('content')
<table id="tablaOrdenes" class="table">
    <thead>
        <tr>
            <th>Orden</th>
            <th>Descripcion</th>
            <th>Principal</th>
            <th>Secundaria</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Ingreso</th>
            <th>Salio</th>
        </tr>
    </thead>
</table>

<script>
$(document).ready(function() {
    $('#tablaOrdenes').DataTable({
        "ajax": "{{ route('orden.get') }}",
        "columns": [
            { data: "id", "searchable": true },
            { data: "descripcion", "searchable": false },
            { data: "partidaUno", "searchable": false },
            { data: "partidaDos", "searchable": false },
            { data: "total", "searchable": false },
            { data: "estado", "searchable": false },
            { data: "fecha_ingreso", "searchable": false },
            { data: "fecha_Salida", "searchable": false }
        ],
        "order": [[0, "desc"]]
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
