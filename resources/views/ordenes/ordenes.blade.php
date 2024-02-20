@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- DataTables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@stop

@section('content')

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ordenes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Tablero</a></li>
                            <li class="breadcrumb-item active">Ordenes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-success" style="border-radius:25px; background-color:#DCDCDC;">

            <div class="row">

                <div class="col-2 "><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
                        style="margin-left:15px;border-radius:30px;float:left;"> Agregar Orden </button></div>
                <div class="col-2"></div>
                <div class="col-6 ">
                    <h6><b>ULTIMA ENTREGA </b> ➜ <b>ORDEN: {{ $OrdenUEnt->id }}</b>
                </div>
                <div class="col-2 " style=" position: absolute; right: 20px;"><button class="btn btn-sm btn-success"
                        style="border-radius:30px;"> Imprimir &nbsp;<i class="fas fa-ticket-alt"></i></button></div>


            </div>

        </div>

        <div class="card card-success">
            <div class="card-body" style="position: relative; overflow: auto; width: 100%;">
                <table id="TableOrdenes"
                    class="table stripe ordenes order-table display compact cell-border hover row-border dataTable no-footer"
                    style="width:100%" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Orden</th>
                            <th>Tecnico</th>
                            <th>Asesor</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Fecha Entrada</th>
                            <th>Ultima modificacion</th>
                            <th>Fecha de salida</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Imprimir Ticket</th>
                        </tr>
                    </thead>




                </table>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade in" id="exampleModalCenter" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Orden</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="#" enctype="multipart/form-data" >
                            {{-- Select Tecnicos --}}
                            <div>
                                <label class="sr-only" for="inlineFormInputGroup"></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user-cog"></i></div>
                                    </div>
                                    <select class="form-control form-control">
                                        <option>Seleccionar Tecnico</option>
                                        @foreach($Tecnicos as $Tecnico)
                                        <option value="<?php echo $Tecnico->id ?>">{{$Tecnico->nombre}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            {{-- Select Asesor --}}
                            <div>
                                <label class="sr-only" for="inlineFormInputGroup"></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
                                    </div>
                                    <select class="form-control form-control">
                                        <option>Seleccionar Asesor</option>
                                        @foreach($Asesores as $Asesor)
                                        <option value="<?php echo $Asesor->id ?>">{{$Asesor->nombre}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            {{-- Select Cliente --}}
                            <div>
                                <label class="sr-only" for="inlineFormInputGroup"></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-users"></i></div>
                                    </div>
                                    <select class="form-control form-control selectsearch">
                                        <option>Seleccionar Cliente &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                        @foreach($Clientes as $Cliente)
                                        <option value="<?php echo $Cliente->id ?>">{{$Cliente->nombre}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            {{-- Select Estado --}}
                            <div>
                                <label class="sr-only" for="inlineFormInputGroup"></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-toggle-on"></i></div>
                                    </div>
                                    <select class="form-control form-control">
                                        <option value="">Seleccionar Estado</option>
                                        <option value="En revisión (REV)">En revisión (REV)</option>
                                        <option value="Supervisión (SUP)">Supervisión (SUP)</option>
                                        <option value="Pendiente de autorización (AUT">Pendiente de autorización (AUT)</option>
                                        <option value="Aceptado (ok)">Aceptado (OK)</option>
                                        <option value="Terminada (ter)">Terminada (TER)</option>
                                        <option value="Cancelada (can)">Cancelada (CAN)</option>
                                        <option value="Entregado (Ent)">Entregado (ENT)</option>
                                        <option value="Sin reparación (SR)">Sin reparación (SR)</option>
                                        <option class="garantia" value="En revisión probable garantía "> En revisión probable garantía</option>
                                        <option class="garantia" value="Garantía aceptada (GA)">Garantía aceptada (GA)</option>
                                        </select>
                                </div>
                            </div>
                            <div class="drag-area"><br><br>
                                  <span class="inner">Arrastra tus archivos</span>O
                                  <a class="btn btn-primary button-file"id="butt">Adjuntalos aqui</a>
                                  <div class="invisible"><input type="file" name="imagenes" class="file" id="input-file" onchange="Validsize()" hidden multiple /></div>

                                </div>
                                <div ><div id="preview"></div></div>
                                <script src="/js/script.js"></>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="position: absolute; left: 10px"
                            data-dismiss="modal">Salir</button>
                        <button type="button" class="btn btn-primary">Crear orden</button>
                    </div>
                </div>
            </div>
        </div>



@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<!-- DataTables JavaScript CDN -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        $('.selectsearch').select2();
        $('#TableOrdenes').DataTable({
            "order": [
                [1, "desc"]
            ],

            "language": {
                "decimal": ",",
                "thousands": ".",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoPostFix": "",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "processing": "Procesando...",
                "search": "Buscar:",
                "searchPlaceholder": "Término de búsqueda",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                //only works for built-in buttons, not for custom buttons
                "buttons": {
                    "create": "Nuevo",
                    "edit": "Cambiar",
                    "remove": "Borrar",
                    "copy": "Copiar",
                    "csv": "fichero CSV",
                    "excel": "tabla Excel",
                    "pdf": "documento PDF",
                    "print": "Imprimir",
                    "colvis": "Visibilidad columnas",
                    "collection": "Colección",
                    "upload": "Seleccione fichero...."
                },
                "select": {
                    "rows": {
                        _: '%d filas seleccionadas',
                        0: 'clic fila para seleccionar',
                        1: 'una fila seleccionada'
                    }
                }
            },
            "ajax": "{{ route('jsonordenes') }}",
            "columns": [{
                    "render": function(data, type, full, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    'data': 'id'
                },
                {
                    'data': 'nombreTecnico'
                },
                {
                    'data': 'nombreAsesor'
                },
                {
                    'data': 'nombreCliente'
                },
                {
                    data: null,
                    "render": function(data, type, row, meta) {
                        return '<b>$</b>' + data.ordenTotal;
                    }
                },
                {
                    'data': 'estado'
                },
                {
                    'data': 'fechaIngreso'
                },
                {
                    'data': 'fechaModificacion'
                },
                {
                    'data': 'fechaSalida'
                },
                {
                    data: null,
                    "render": function(data, type, row, meta) {
                        return '<a type="button" href="#" class="editar btn btn-warning" target="_blank"><span class="fa fa-edit"></span><span class="hidden-xs"> Editar</span></a>';
                    }
                },
                {
                    data: null,
                    "render": function(data, type, row, meta) {
                        return '<a type="button" href="#" id="ButtonEditar" class="editar btn btn-danger botonEditar" target="_blank"><span class="fa fa-trash"></span><span class="hidden-xs"> Eliminar </span></a>';
                    }
                }, {
                    data: null,
                    "render": function(data, type, row, meta) {
                        return '<a type="button" href="#" id="ButtonEditar" class="editar btn btn-success botonEditar" target="_blank"><span class="fa fa-ticket-alt"></span><span class="hidden-xs"> Imprimir </span></a>';
                    }
                },
            ]
        });
    });
</s>
@stop
