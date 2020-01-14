<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arrendatario;
use App\Models\inmueble;
use App\Models\inquilino;
use App\Models\contrato;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $inmueble = inmueble::orderBY('id','DESC')->paginate(5);
            $arrendatario = arrendatario::orderBY('id','DESC')->paginate(5);
            $contrato = contrato::orderBY('id','DESC')->paginate(5);
            $inquilino = inquilino::orderBY('id','DESC')->paginate(5);
                return ['inmueble'=>$inmueble,'arrendatario'=>$arrendatario,'contrato'=>$contrato,'inquilino'=>$inquilino];
        }else{
            return view('home');
        }
    }
}
