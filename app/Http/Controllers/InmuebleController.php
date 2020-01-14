<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inmueble;
use Illiminate\Support\Facades\Sessions;
use App\Models\arrendatario;

class InmuebleController extends Controller
{
    //

    public function index(Request $request){

        if ($request->ajax()) {
                $inmueble = inmueble::orderBY('id','DESC')->paginate(5);
                $arrendatario = arrendatario::all();
                return ['paginate'=>[
                    'total' =>$inmueble->total(),
                    'current_page' =>$inmueble->currentPage(),
                    'per_page' =>$inmueble->perPage(),
                    'last_page' =>$inmueble->lastPage(),
                    'from' =>$inmueble->firstItem(),
                    'to' =>$inmueble->lastPage(),
                ],'inmueble'=>$inmueble,'arrendatario'=>$arrendatario];
            }else{
                return view('inmueble.inicio');
            }
    }

    public function destroy($id)
    {
        $inmueble = inmueble::find($id);
        $inmueble->delete();
    }

    public function store(Request $request)
    {
        $inmueble = new inmueble();
        $inmueble->id_arrendatario = $request->id_arrendatario;
        $inmueble->direccion = $request->direccion;
        $inmueble->observaciones = $request->observaciones;
        $inmueble->save();

        return $inmueble;
    } 
    
    public function update(Request $request, $id)
{
    $inmueble = inmueble::find($id);
    $inmueble->id_arrendatario = $request->id_arrendatario;
    $inmueble->direccion = $request->direccion;
    $inmueble->observaciones = $request->observaciones;
    $inmueble->save();

    return $inmueble;
}

    public function buscar(Request $request)
    {
        $codigo = $request->codigo;
        
        return inmueble::search($codigo)->orderBy('id')->get();
    }
   
}
