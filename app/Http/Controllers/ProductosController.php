<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listas;
use App\Models\Productos;
use Arr;
use DB;

class ProductosController extends Controller
{
    //getProductos
    public function getProductos(Request $request, $id)
    {
         
        $datos = Productos::where('fkLista', '=', $id)->get();
        return $datos;
 
    }

    //marcarProducto
    public function marcarProducto(Request $request, $id, $estado)
    {
        try{
            DB::table('productos')
            ->where('id', $id)
            ->update(['comprado' => $estado]);
            
            return true;
        
            
        }
        catch (\Exception $e) {
            return $e;
        }
    }

    //GuardarProducto
    public function GuardarProducto(Request $request)
    {
        try{

            //guarda Imagen
            if($request->imageName != ''){
                $productoname = $request->nombre;
                $imageName = 'img_' .$productoname. rand(1000000, 9999999) . '.' . $request->image->getClientOriginalExtension(); 
                $request->image->move(public_path('/img'), $imageName);
            }else{
                $imageName = '';
            }

            $producto = new Productos();
            $producto->nombre = $request->nombre;
            $producto->fkLista = $request->idLista;
            $producto->imagen = $imageName === '' ? './img/canasta.jpg' :'./img/'.$imageName;
            $producto->save();
            return Productos::where('fkLista', '=', $request->idLista)->get();
        }
        catch (\Exception $e) {
            
            return $e;
            
        }
    }

}
