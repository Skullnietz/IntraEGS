@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12 col-sm-3 col-md-2">
    <div class="info-box">
    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-bag"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Ordenes Pagadas | Mes</span>
    <span class="info-box-number">
        $18,220

    </span>
    </div>

    </div>

    </div>

    <div class="col-12 col-sm-3 col-md-2">
    <div class="info-box mb-3">
    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-desktop"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Equipos Ingresados | Mes</span>
    <span class="info-box-number">9</span>
    </div>

    </div>

    </div>


    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-3 col-md-2">
    <div class="info-box mb-3">
    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-desktop"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Equipos Entregados | Mes</span>
    <span class="info-box-number">8</span>
    </div>

    </div>

    </div>

    <div class="col-12 col-sm-3 col-md-2">
    <div class="info-box mb-3">
    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-person-booth"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Prospectos | Mes</span>
    <span class="info-box-number">5</span>
    </div>

    </div>

    </div>

    <div class="col-12 col-sm-2 col-md-2">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-check-alt"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Ventas | Mes</span>
        <span class="info-box-number">$1,431</span>
        </div>

        </div>

        </div>

    </div>
    <div class="row">
        <div class="col-lg-6">
        <div class="card">
        <div class="card-header border-0">
        <div class="d-flex justify-content-between">
        <h3 class="card-title">Visitantes de Tienda En linea</h3>
        <a href="javascript:void(0);">View Report</a>
        </div>
        </div>
        <div class="card-body">
        <div class="d-flex">
        <p class="d-flex flex-column">
        <span class="text-bold text-lg">820</span>
        <span>Visitors Over Time</span>
        </p>
        <p class="ml-auto d-flex flex-column text-right">
        <span class="text-success">
        <i class="fas fa-arrow-up"></i> 12.5%
        </span>
        <span class="text-muted">Since last week</span>
        </p>
        </div>

        <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <canvas id="visitors-chart" height="200" width="744" style="display: block; width: 744px; height: 200px;" class="chartjs-render-monitor"></canvas>
        </div>
        <div class="d-flex flex-row justify-content-end">
        <span class="mr-2">
        <i class="fas fa-square text-primary"></i> This Week
        </span>
        <span>
        <i class="fas fa-square text-gray"></i> Last Week
        </span>
        </div>
        </div>
        </div>

        <div class="card">
        <div class="card-header border-0">
        <h3 class="card-title">Movimientos Recientes</h3>
        <div class="card-tools">
        <a href="#" class="btn btn-tool btn-sm">
        <i class="fas fa-download"></i>
        </a>
        <a href="#" class="btn btn-tool btn-sm">
        <i class="fas fa-bars"></i>
        </a>
        </div>
        </div>
        <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Sales</th>
        <th>More</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>
        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
        Some Product
        </td>
        <td>$13 USD</td>
        <td>
        <small class="text-success mr-1">
        <i class="fas fa-arrow-up"></i>
        12%
        </small>
        12,000 Sold
        </td>
        <td>
        <a href="#" class="text-muted">
        <i class="fas fa-search"></i>
        </a>
        </td>
        </tr>
        <tr>
        <td>
        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
        Another Product
        </td>
        <td>$29 USD</td>
        <td>
        <small class="text-warning mr-1">
        <i class="fas fa-arrow-down"></i>
        0.5%
        </small>
        123,234 Sold
        </td>
        <td>
        <a href="#" class="text-muted">
        <i class="fas fa-search"></i>
        </a>
        </td>
        </tr>
        <tr>
        <td>
        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
        Amazing Product
        </td>
        <td>$1,230 USD</td>
        <td>
        <small class="text-danger mr-1">
        <i class="fas fa-arrow-down"></i>
        3%
        </small>
        198 Sold
        </td>
        <td>
        <a href="#" class="text-muted">
        <i class="fas fa-search"></i>
        </a>
        </td>
        </tr>
        <tr>
        <td>
        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
        Perfect Item
        <span class="badge bg-danger">NEW</span>
        </td>
        <td>$199 USD</td>
        <td>
        <small class="text-success mr-1">
        <i class="fas fa-arrow-up"></i>
        63%
        </small>
        87 Sold
        </td>
        <td>
        <a href="#" class="text-muted">
        <i class="fas fa-search"></i>
        </a>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>

        </div>

        <div class="col-lg-6">
        <div class="card">
        <div class="card-header border-0">
        <div class="d-flex justify-content-between">
        <h3 class="card-title">Grafica de Ingresos</h3>
        <a href="javascript:void(0);">View Report</a>
        </div>
        </div>
        <div class="card-body">
        <div class="d-flex">
        <p class="d-flex flex-column">
        <span class="text-bold text-lg">$18,230.00</span>
        <span>Sales Over Time</span>
        </p>
        <p class="ml-auto d-flex flex-column text-right">
        <span class="text-success">
        <i class="fas fa-arrow-up"></i> 33.1%
        </span>
        <span class="text-muted">Since last month</span>
        </p>
        </div>

        <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <canvas id="sales-chart" height="200" width="744" style="display: block; width: 744px; height: 200px;" class="chartjs-render-monitor"></canvas>
        </div>
        <div class="d-flex flex-row justify-content-end">
        <span class="mr-2">
        <i class="fas fa-square text-primary"></i> This year
        </span>
        <span>
        <i class="fas fa-square text-gray"></i> Last year
        </span>
        </div>
        </div>
        </div>

        <div class="card">
        <div class="card-header border-0">
        <h3 class="card-title">Descripcion General de Tienda</h3>
        <div class="card-tools">
        <a href="#" class="btn btn-sm btn-tool">
        <i class="fas fa-download"></i>
        </a>
        <a href="#" class="btn btn-sm btn-tool">
        <i class="fas fa-bars"></i>
        </a>
        </div>
        </div>
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
        <p class="text-success text-xl">
        <i class="ion ion-ios-refresh-empty"></i>
        </p>
        <p class="d-flex flex-column text-right">
        <span class="font-weight-bold">
        <i class="ion ion-android-arrow-up text-success"></i> 12%
        </span>
        <span class="text-muted">CONVERSION RATE</span>
        </p>
        </div>

        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
        <p class="text-warning text-xl">
        <i class="ion ion-ios-cart-outline"></i>
        </p>
        <p class="d-flex flex-column text-right">
        <span class="font-weight-bold">
        <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
        </span>
        <span class="text-muted">SALES RATE</span>
        </p>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-0">
        <p class="text-danger text-xl">
        <i class="ion ion-ios-people-outline"></i>
        </p>
        <p class="d-flex flex-column text-right">
        <span class="font-weight-bold">
        <i class="ion ion-android-arrow-down text-danger"></i> 1%
        </span>
        <span class="text-muted">REGISTRATION RATE</span>
        </p>
        </div>

        </div>
        </div>
        </div>

        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
