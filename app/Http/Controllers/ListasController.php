<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listas;
use App\Models\Productos;
use Arr;
use DB;

class ListasController extends Controller
{
    //getListas
    public function getListas(Request $request)
    {
         
        $datos = Listas::all();
        return $datos;
 
    }

    //insertar lista
    public function GuardarLista(Request $request)
    {
            try{
                $lista = new Listas();
                $lista->nombre = $request->nombre;
                $lista->save();
                return Listas::all();
            }
            catch (\Exception $e) {
                
                return $e;
                
            }

    }

    //Delete lista
    public function EliminarLista(Request $request, $id)
    {
            try{
                Productos::where('fkLista', '=', $id)->delete();
                Listas::where('id', '=', $id)->delete();
                return Listas::all();
            }
            catch (\Exception $e) {
                
                return $e;
                
            }

    }
    
}
