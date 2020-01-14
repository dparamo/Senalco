<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inquilino;
use Illiminate\Support\Facades\Sessions;


class InquilinoController extends Controller
{
    //

    public function index(Request $request){
   
        
        if ($request->ajax()) {
                $inquilino = inquilino::orderBY('id','DESC')->paginate(5);

                return ['paginate'=>[
                    'total' =>$inquilino->total(),
                    'current_page' =>$inquilino->currentPage(),
                    'per_page' =>$inquilino->perPage(),
                    'last_page' =>$inquilino->lastPage(),
                    'from' =>$inquilino->firstItem(),
                    'to' =>$inquilino->lastPage(),
                ],'inquilino'=>$inquilino];
            }else{
                return view('inquilino.inicio');
            }
    }

    public function destroy($id)
    {
        $inquilino = inquilino::find($id);
        $inquilino->delete();
    }

    public function store(Request $request)
    {
        $inquilino = new inquilino();
        $inquilino->nombre = $request->nombre;
        $inquilino->email = $request->email;
        $inquilino->telefono = $request->telefono;
        $inquilino->observaciones = $request->observaciones;
        $inquilino->estado = $request->estado;
        $inquilino->save();

        return $inquilino;
    } 
    
    public function update(Request $request, $id)
{
    $inquilino = inquilino::find($id);
    $inquilino->nombre = $request->nombre;
    $inquilino->email = $request->email;
    $inquilino->telefono = $request->telefono;
    $inquilino->observaciones = $request->observaciones;
    $inquilino->estado = $request->estado;
    $inquilino->save();

    return $inquilino;
}

    public function buscar(Request $request)
    {
        $nombre = $request->nombre;
        
        return inquilino::search($nombre)->orderBy('id')->get();
    }
   
}
