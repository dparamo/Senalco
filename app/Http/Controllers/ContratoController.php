<?php

namespace App\Http\Controllers;
use App\Models\contrato;
use Illuminate\Http\Request;
use App\Models\inmueble;
use App\Models\inquilino;

class ContratoController extends Controller
{
    //
    public function index(Request $request){
   
        if ($request->ajax()) {
                $contrato = contrato::orderBY('id','DESC')->paginate(5);
                $inmueble = inmueble::all();
                $inquilino = inquilino::all();
                return ['paginate'=>[
                    'total' =>$contrato->total(),
                    'current_page' =>$contrato->currentPage(),
                    'per_page' =>$contrato->perPage(),
                    'last_page' =>$contrato->lastPage(),
                    'from' =>$contrato->firstItem(),
                    'to' =>$contrato->lastPage(),
                ],'contrato'=>$contrato,'inmueble'=>$inmueble,'inquilino'=>$inquilino];
            }else{
                return view('contrato.inicio');
            }
    }

    public function destroy($id)
    {
        $contrato = contrato::find($id);
        $contrato->delete();
    }

    public function store(Request $request)
    {
        $contrato = new contrato();
        $contrato->id_inquilino = $request->id_inquilino;
        $contrato->id_inmueble = $request->id_inmueble;
        $contrato->inicontrato = $request->inicontrato;
        $contrato->fincontrato = $request->fincontrato;
        $contrato->valorcanon = $request->valorcanon;
        $contrato->valoradmin = $request->valoradmin;
        $contrato->total = $request->total;
        $contrato->observaciones = $request->observaciones;
        $contrato->save();

        return $contrato;
    } 
    
    public function update(Request $request, $id)
{
    $contrato = contrato::find($id);
    $contrato->id_inquilino = $request->id_inquilino;
    $contrato->id_inmueble = $request->id_inmueble;
    $contrato->inicontrato = $request->inicontrato;
    $contrato->fincontrato = $request->fincontrato;
    $contrato->valorcanon = $request->valorcanon;
    $contrato->valoradmin = $request->valoradmin;
    $contrato->total = $request->total;
    $contrato->observaciones = $request->observaciones;
    $contrato->save();

    return $contrato;
}

    public function buscar(Request $request)
    {
        $codigo = $request->codigo;
        
        return contrato::search($codigo)->orderBy('id')->get();
    }
}
