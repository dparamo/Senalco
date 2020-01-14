<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arrendatario;
use App\Models\inmueble;
use App\Models\inquilino;
use App\Models\contrato;
use Illiminate\Support\Facades\Sessions;

class ArrendatarioController extends Controller
{
    //

    public function index(Request $request){
   
        if ($request->ajax()) {
                $arrendatario = arrendatario::orderBY('id','DESC')->paginate(5);

                return ['paginate'=>[
                    'total' =>$arrendatario->total(),
                    'current_page' =>$arrendatario->currentPage(),
                    'per_page' =>$arrendatario->perPage(),
                    'last_page' =>$arrendatario->lastPage(),
                    'from' =>$arrendatario->firstItem(),
                    'to' =>$arrendatario->lastPage(),
                ],'arrendatario'=>$arrendatario];
            }else{
                return view('arrendatario.inicio');
            }
    }

    public function destroy($id)
    {
        $arrendatario = arrendatario::find($id);
        $arrendatario->delete();
    }

    public function store(Request $request)
    {
        $arrendatario = new arrendatario();
        $arrendatario->nombre = $request->nombre;
        $arrendatario->email = $request->email;
        $arrendatario->telefono = $request->telefono;
        $arrendatario->observaciones = $request->observaciones;
        $arrendatario->estado = $request->estado;
        $arrendatario->save();

        return $arrendatario;
    } 
    
    public function update(Request $request, $id)
{
    $arrendatario = arrendatario::find($id);
    $arrendatario->nombre = $request->nombre;
    $arrendatario->email = $request->email;
    $arrendatario->telefono = $request->telefono;
    $arrendatario->observaciones = $request->observaciones;
    $arrendatario->estado = $request->estado;
    $arrendatario->save();

    return $arrendatario;
}

    public function buscar(Request $request)
    {
        $nombre = $request->nombre;
        
        return arrendatario::search($nombre)->orderBy('id')->get();
    }
   
}
