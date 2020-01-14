<?php

namespace App\Http\Controllers;
use App\Models\factura;
use App\Models\inquilino;
use App\Models\inmueble;
use App\Models\contrato;
use Illuminate\Http\Request;

class FacturaController extends Controller
{

    public function index(Request $request){

        if ($request->ajax()) {
                $factura = factura::orderBY('id','DESC')->paginate(5);
                $inquilino = inquilino::all();
                $inmueble = inmueble::all();
                $contrato = contrato::all();
                return ['paginate'=>[
                    'total' =>$factura->total(),
                    'current_page' =>$factura->currentPage(),
                    'per_page' =>$factura->perPage(),
                    'last_page' =>$factura->lastPage(),
                    'from' =>$factura->firstItem(),
                    'to' =>$factura->lastPage(),
                ],'factura'=>$factura,'inquilino'=>$inquilino,'inmueble'=>$inmueble,'contrato'=>$contrato];
            }else{
                return view('factura.inicio');
            }
    }

    public function destroy($id)
    {
        $factura = factura::find($id);
        $factura->delete();
    }

    public function store(Request $request)
    {
        $factura = new factura();
        $factura->id_inquilino = $request->id_inquilino;
        $factura->id_inmueble = $request->id_inmueble;
        $factura->id_contrato = $request->id_contrato;
        $factura->periodo = $request->periodo;
        $factura->avaladora = $request->avaladora;
        $factura->multas = $request->multas;
        $factura->otros = $request->otros;
        $factura->total  = $request->total;
        $factura->save();

        return $factura;

    
    } 
    
    public function update(Request $request, $id)
{
        $factura = factura::find($id);
        $factura->id_inquilino = $request->id_inquilino;
        $factura->id_inmueble = $request->id_inmueble;
        $factura->id_contrato = $request->id_contrato;
        $factura->periodo = $request->periodo;
        $factura->avaladora = $request->avaladora;
        $factura->multas = $request->multas;
        $factura->otros = $request->otros;
        $factura->total  = $request->total;
        $factura->save();

    return $factura;
}

    public function buscar(Request $request)
    {
        $codigo = $request->codigo;
        
        return factura::search($codigo)->orderBy('id')->get();
    }
   
    
    public function show(Request $request ,$id){

        if ($request->ajax()) {
                $factura = factura::where('id_inquilino',$id)->paginate(5);
                $inquilino = inquilino::where('id',$id)->get();
                $inmueble = inmueble::all();
                $contrato = contrato::where('id_inquilino',$id)->get();
                
                return ['paginate'=>[
                    'total' =>$factura->total(),
                    'current_page' =>$factura->currentPage(),
                    'per_page' =>$factura->perPage(),
                    'last_page' =>$factura->lastPage(),
                    'from' =>$factura->firstItem(),
                    'to' =>$factura->lastPage(),
                ],'factura'=>$factura,'inquilino'=>$inquilino,'inmueble'=>$inmueble,'contrato'=>$contrato];
            }else{
                return view('inquilino.factura');
            }
    }

}

