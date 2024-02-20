<?php
namespace App\Http\Controllers;

use App\Models\Clientestienda;
use App\Models\Asesor;
use Illuminate\Http\Request;
use DataTables;




class clientesController extends Controller
{
    public function indexClientes()
    {
        return view('clientes.lista');
    }
    public function getClientes(Request $request)
{
    $Clientestienda = Clientestienda::select('nombre', 'id_Asesor', 'correo', 'telefono', 'telefonoDos', 'etiqueta', 'compras', 'fecha')->orderBy('id', 'DESC')->get();

    $data = array();
    //if ($request->ajax()) {

        // Obtener los nombres de los asesores correspondientes
        foreach ($Clientestienda as $cliente) {
           // $Asesor = Asesor::where('id','=', $cliente->id_Asesor)->first(['id','nombre']);
           // $cliente->nombreAsesor = $Asesor ? $Asesor->nombre : null;
            array_push($data, $cliente);
        }

        return datatables()->of($data)->toJson();
    //}
    //return view('clientes.lista'); // Reemplaza 'clientes.index' con la vista donde mostrarás la tabla
}


}
