<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



use Carbon\Carbon;
use App\Models\Orden;
use App\Models\Clientestienda;
use App\Models\Tecnico;
use App\Models\Asesor;


class OrdenesController extends Controller
{
    public function index(){


        $fecha = Carbon::now();
        $mfecha = $fecha->month;
        $yfecha = $fecha->year;
         // EGS es el id 1
            if( Auth::user()->perfil_n == "Administrador" ){ // EGS Administrador (Tablero)
                $OrdenUEnt = Orden::where('estado', '=', "Entregado (Ent)")->orderBy('id', 'DESC')->first();
                $Clientes = Clientestienda::get();
                $Asesores = Asesor::get();
                $Tecnicos = Tecnico::get();



                return view('ordenes.ordenes')->with('OrdenUEnt', $OrdenUEnt)->with('Clientes', $Clientes)->with('Asesores', $Asesores)->with('Tecnicos', $Tecnicos);

            }
            if( Auth::user()->perfil_n == 'Tecnico' ){  // EGS Tecnico (Tablero)
                $emailTecnico = Auth::user()->email;
                $tecnico = Tecnico::where('correo', '=', $emailTecnico)->first();
                $OrdenUEnt = Orden::where('estado', '=', "Entregado (Ent)")->orderBy('id', 'DESC')->first();
                $OrdenOkTecnico = Orden::where('estado', '=', 'Aceptado (ok)')->where('id_tecnico', '=', $tecnico->id)->get();

                return view('ordenes.ordenesTecnico')->with('OrdenOkTecnico', $OrdenOkTecnico)->with('OrdenUEnt', $OrdenUEnt);

            }
            if( Auth::user()->perfil_n == 'Asesor' ){ // EGS Asesor (Tablero)
                $emailAsesor = Auth::user()->email;
                $asesor = Asesor::where('correo', '=', $emailAsesor)->first();
                $ordenTER = Orden::whereYear('fecha',$yfecha)->whereMonth('fecha',$mfecha)->where('id_Asesor', '=', $asesor->id)->where('estado', '=', "Terminada (ter)")->orderBy('id', 'DESC')->get();

                return view('ordenes.ordenesAsesor')->with('ordenTER', $ordenTER);

            }


    }

    public function getOrdenes(Request $request)
{
    $Ordenes = Orden::select('id','descripcion','partidaUno','partidaDos','total','estado','fecha_ingreso','fecha_Salida')->orderBy('id', 'DESC')->get();

    $data = array();
    if ($request->ajax()) {

        // Obtener los nombres de los asesores correspondientes
        foreach ($Ordenes as $orden) {
           // $Asesor = Asesor::where('id','=', $cliente->id_Asesor)->first(['id','nombre']);
           // $cliente->nombreAsesor = $Asesor ? $Asesor->nombre : null;
            array_push($data, $orden);
        }

        return datatables()->of($data)->toJson();
    }
    return view('ordenes.getorden'); // Reemplaza 'clientes.index' con la vista donde mostrarás la tabla
}

    public function jsonOrdenes(){


        $fecha = Carbon::now();
        $mfecha = $fecha->month;
        $yfecha = $fecha->year;
         // EGS es el id 1
            if( Auth::user()->perfil_n == 'Administrador' ){ // EGS Administrador (Tablero)
                $Ordenes = Orden::orderBy('id', 'DESC')->get(['id','id_tecnico','id_Asesor','id_usuario','fecha_ingreso','fecha_Salida','fecha','estado','total']);




                // Obtener los clientes de las ordenes
                $dataO = array();
                foreach ($Ordenes as $orden){
                    setlocale(LC_ALL, 'es_ES.UTF-8');
                    $dateI = strtotime($orden->fecha_ingreso);
                    $fechaI = strftime('%A %d, %B, %Y ', $dateI);
                    $dateS = strtotime($orden->fecha_Salida);
                    $dateSa = strtotime($orden->fecha_Salida);
                    $fechaS = strftime('%A %d, %B, %Y ', $dateS);
                    $dateM = strtotime($orden->fecha);
                    $fechaM = strftime('%A %d, %B, %Y ', $dateM);
                    $Cliente = Clientestienda::where('id','=', $orden->id_usuario)->first();
                    $Asesor = Asesor::where('id','=', $orden->id_Asesor)->first();
                    $Tecnico = Tecnico::where('id','=', $orden->id_tecnico)->first();
                    $TotalOrden = $orden->total;
                    $Total = number_format($TotalOrden, 2);
                    $orden->nombreCliente = $Cliente ? $Cliente->nombre : null;
                    $orden->nombreAsesor = $Asesor ? $Asesor->nombre : null;
                    $orden->nombreTecnico = $Tecnico ? $Tecnico->nombre : null;
                    $orden->fechaIngreso = $dateI ? $fechaI : null;
                    $orden->fechaSalida = $dateSa ? $fechaS : '-';
                    $orden->ordenTotal = $TotalOrden ? $Total : 0;
                    $orden->fechaModificacion = $dateM ? $fechaM : null;

                    array_push($dataO, $orden);
                }


                return datatables()->of($dataO)->toJson();

            if( Auth::user()->perfil_n == 'Tecnico' ){  // EGS Tecnico (Tablero)
                $emailTecnico = Auth::user()->email;
                $tecnico = Tecnico::where('correo', '=', $emailTecnico)->first();
                $idTecnico = $tecnico->id;
                $Ordenes = Orden::orderBy('id', 'DESC')->where('id_tecnico','=',$idTecnico)->get(['id','id_tecnico','id_Asesor','id_usuario','fecha_ingreso','fecha_Salida','fecha','estado']);


                // Obtener los clientes de las ordenes
                $dataO = array();
                foreach ($Ordenes as $orden){
                    setlocale(LC_ALL, 'es_ES.UTF-8');
                    $dateI = strtotime($orden->fecha_ingreso);
                    $fechaI = strftime('%A %d, %B, %Y ', $dateI);
                    $dateS = strtotime($orden->fecha_Salida);
                    $dateSa = strtotime($orden->fecha_Salida);
                    $fechaS = strftime('%A %d, %B, %Y ', $dateS);
                    $dateM = strtotime($orden->fecha);
                    $fechaM = strftime('%A %d, %B, %Y ', $dateM);
                    $Cliente = Clientestienda::where('id','=', $orden->id_usuario)->first(['id','nombre']);
                    $Asesor = Asesor::where('id','=', $orden->id_Asesor)->first();
                    $Tecnico = Tecnico::where('id','=', $orden->id_tecnico)->first();
                    $orden->nombreCliente = $Cliente ? $Cliente->nombre : null;
                    $orden->nombreAsesor = $Asesor ? $Asesor->nombre : null;
                    $orden->nombreTecnico = $Tecnico ? $Tecnico->nombre : null;
                    $orden->fechaIngreso = $dateI ? $fechaI : null;
                    $orden->fechaSalida = $dateSa ? $fechaS : '-';
                    $orden->fechaModificacion = $dateM ? $fechaM : null;

                    array_push($dataO, $orden);
                }


                return datatables()->of($dataO)->toJson();

            }
            if( Auth::user()->perfil_n == 'Asesor' ){ // EGS Asesor (Tablero)
                $Ordenes = Orden::orderBy('id', 'DESC')->get(['id','id_tecnico','id_Asesor','id_usuario','fecha_ingreso','fecha_Salida','fecha','estado','total']);


                // Obtener los clientes de las ordenes
                $dataO = array();
                foreach ($Ordenes as $orden){
                    setlocale(LC_ALL, 'es_ES.UTF-8');
                    $dateI = strtotime($orden->fecha_ingreso);
                    $fechaI = strftime('%A %d, %B, %Y ', $dateI);
                    $dateS = strtotime($orden->fecha_Salida);
                    $dateSa = strtotime($orden->fecha_Salida);
                    $fechaS = strftime('%A %d, %B, %Y ', $dateS);
                    $dateM = strtotime($orden->fecha);
                    $fechaM = strftime('%A %d, %B, %Y ', $dateM);
                    $Cliente = Clientestienda::where('id','=', $orden->id_usuario)->first();
                    $Asesor = Asesor::where('id','=', $orden->id_Asesor)->first();
                    $Tecnico = Tecnico::where('id','=', $orden->id_tecnico)->first();
                    $TotalOrden = $orden->total;
                    $Total = number_format($TotalOrden, 2);
                    $orden->nombreCliente = $Cliente ? $Cliente->nombre : null;
                    $orden->nombreAsesor = $Asesor ? $Asesor->nombre : null;
                    $orden->nombreTecnico = $Tecnico ? $Tecnico->nombre : null;
                    $orden->fechaIngreso = $dateI ? $fechaI : null;
                    $orden->fechaSalida = $dateSa ? $fechaS : '-';
                    $orden->ordenTotal = $TotalOrden ? $Total : 0;
                    $orden->fechaModificacion = $dateM ? $fechaM : null;

                    array_push($dataO, $orden);
                }


                return datatables()->of($dataO)->toJson();

            }
            return view('home');
        }

    }
    public function jsonClientes(){
        $negocio_id = Auth::user()->negocio_id;
        $fecha = Carbon::now();
        $mfecha = $fecha->month;
        $yfecha = $fecha->year;

            if( Auth::user()->perfil_n == 'Administrador' ){ // EGS Administrador (Tablero)
                $Clientes = Clientestienda::get();
                return datatables()->of($Clientes)->toJson();
            }
            if( Auth::user()->perfil_n == 'Tecnico' ){  // EGS Tecnico (Tablero)
                $Clientes = Clientestienda::get(['id','nombre']);
                return datatables()->of($Clientes )->toJson();

            }
            if( Auth::user()->perfil_n == 'Asesor' ){ // EGS Asesor (Tablero)
                $Clientes = Clientestienda::get(['id','nombre']);
                return datatables()->of($Clientes )->toJson();

            }
            return view('home');


    }

    public function show($id){
        $negocio_id = Auth::user()->negocio_id;

        $fecha = Carbon::now();
        $mfecha = $fecha->month;
        $yfecha = $fecha->year;

            if( Auth::user()->perfil_n == 'Administrador' ){ // EGS Administrador (Tablero)
                $Orden = Orden::where("id","=",$id)->first();
                return view("ordenes.showorden")->with('Orden', $Orden);
            }
            if( Auth::user()->perfil_n == 'Tecnico' ){  // EGS Tecnico (Tablero)
                $Orden = Orden::where("id","=",$id)->get();
                return view("ordenes.showorden");

            }
            if( Auth::user()->perfil_n == 'Asesor' ){ // EGS Asesor (Tablero)
                $Orden = Orden::where("id","=",$id)->get();
                return view("ordenes.showorden");

            }
            return view('home');
        }
}



