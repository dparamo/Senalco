<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inquilino;
use Illiminate\Support\Facades\Sessions;

class InquilinoController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $datos = inquilino::search($request->nombre)->orderBy('id')->paginate(5);
        return view('inquilino.inicio',['datos'=>$datos]);
    }

    public function save(Request $request){
        $codigo = $request->codigo; 
        $nombre = $request->nombre;
        $email = $request->email;
        $telefono = $request->telefono;
        $observaciones = $request->observaciones;
        $estado = $request->estado;

        inquilino::create([
            'codigo' => $codigo,
            'nombre' => $nombre,
            'email' => $email,
            'telefono' => $telefono,
            'observaciones' => $observaciones,
            'estado' => $estado,
        ]);
        
        return redirect()->action('InquilinoController@index');
       }

       public function edit($id){
           
            $inquilino = inquilino::find($id);
            return view('inquilino.edit',['id'=>$id,'inqui'=>$inquilino]);
       }
       
       public function update(Request $request,$id){
    
        
        $codigo = $request->codigo; 
        $nombre = $request->nombre;
        $email = $request->email;
        $telefono = $request->telefono;
        $observaciones = $request->observaciones;
        $estado = $request->estado;

        inquilino::find($id)->update(
            ['codigo' =>  $codigo,'nombre' =>  $nombre,
            'email' =>  $email,'telefono' =>  $telefono,
            'observaciones' =>  $observaciones,
            'estado' =>  $estado,
            ]);
        
        return redirect()->action('InquilinoController@index');

       }

       public function eliminar($id){
        inquilino::where('id',$id)->delete();
        return response()->json(["mensaje"=>"el usuario a sido eliminado correctamente"]);

   }

}
