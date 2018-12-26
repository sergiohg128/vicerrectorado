<?php

namespace App\Http\Controllers;

use Datetime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Oficina;
use App\Publicacion;
use App\Slider;

class Controlador extends Controller
{
    
    private function ComprobarUsuario($usuario){
        if(empty($usuario)){
            return FALSE;
        }
        if(empty($usuario->id)){
            return FALSE;
        }
        if($usuario->id==null){
            return FALSE;
        }
        if($usuario->id==0){
            return FALSE;
        }
        return TRUE;
    }
    
    
    public function Index(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $slides = Slider::where("id_oficina",1)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        $publicaciones = Publicacion::where("id_oficina",1)->where("estado","N")->where("tipo",1)->get();
        $oficina = Oficina::find(1);
        return view('index',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones
        ]);
    }

    public function Oficina(Request $request,  Response $response) {
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $oficina = Oficina::find($request->input("id"));
        $slides = Slider::where("id_oficina",$oficina->id)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        $publicaciones = Publicacion::where("id_oficina",$oficina->id)->where("estado","N")->where("tipo",1)->get();
        return view('oficina',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones
        ]);
    }
    
    public function Pasantias(Request $request,  Response $response) {
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $oficina = Oficina::find(1);
        $slides = Slider::where("id_oficina",$oficina->id)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        $publicaciones = Publicacion::where("tipo",2)->where("estado","N")->get();
        return view('pasantias',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones
        ]);
    }

    public function Financiamientos(Request $request,  Response $response) {
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $oficina = Oficina::find(1);
        $slides = Slider::where("id_oficina",$oficina->id)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        $publicaciones = Publicacion::where("tipo",2)->where("estado","N")->get();
        return view('financiamientos',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones
        ]);
    }

    public function Docs(Request $request,  Response $response) {
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $oficina = Oficina::find(1);
        $slides = Slider::where("id_oficina",$oficina->id)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        $publicaciones = Publicacion::where("tipo",2)->where("estado","N")->get();
        return view('documentos',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones
        ]);
    }
    
    
    

}
    