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
use App\Usuario;
use App\Menu;

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

    public function Publicacion(Request $request,  Response $response) {
        $url_base = "http://209.97.182.163/";
        $url_base2 = "http%3A%2F%2F209.97.182.163%2F";

        $usuario = $request->session()->get('usuario');
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $slides = Slider::where("id_oficina",1)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        $id = $request->input("id");
        $publicacion = Publicacion::find($id);
        $oficina = Oficina::find($publicacion->id_oficina);
        switch ($publicacion->tipo) {
            case 1:
                return view('noticia',[
                    'mensaje'=>$mensaje,
                    'oficinas'=>$oficinas,
                    'slides'=>$slides,
                    'oficina'=>$oficina,
                    'url_base'=>$url_base,
                    'url_base2'=>$url_base2,
                    'publicacion'=>$publicacion
                ]);
                break;
            case 2:
                return view('pasantia',[
                    'mensaje'=>$mensaje,
                    'oficinas'=>$oficinas,
                    'slides'=>$slides,
                    'oficina'=>$oficina,
                    'url_base'=>$url_base,
                    'url_base2'=>$url_base2,
                    'publicacion'=>$publicacion
                ]);
                break;
            case 3:
                return view('financiamiento',[
                    'mensaje'=>$mensaje,
                    'oficinas'=>$oficinas,
                    'slides'=>$slides,
                    'oficina'=>$oficina,
                    'url_base'=>$url_base,
                    'url_base2'=>$url_base2,
                    'publicacion'=>$publicacion
                ]);
                break;
            case 4:
                return view('documento',[
                    'mensaje'=>$mensaje,
                    'oficinas'=>$oficinas,
                    'slides'=>$slides,
                    'oficina'=>$oficina,
                    'url_base'=>$url_base,
                    'url_base2'=>$url_base2,
                    'publicacion'=>$publicacion
                ]);
                break;
            default:
                # code...
                break;
        }
                
    }

    public function Oficina(Request $request,  Response $response) {
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $oficina = Oficina::find($request->input("id"));
        $slides = Slider::where("id_oficina",$oficina->id)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        $publicaciones = Publicacion::where("id_oficina",$oficina->id)->where("estado","N")->where("tipo",1)->get();
        $menus = Menu::where("id_oficina",$oficina->id)->orderBy("orden")->get();
        $idmenu = $request->input("m");
        if($idmenu>0){
            $descripcion = Menu::find($idmenu)->descripcion;
        }else{
            $menu = Menu::where("id_oficina",$oficina->id)->orderBy("orden")->first();
            if(!empty($menu)){
                $descripcion = $menu->descripcion;
            }else{
                $descripcion = "";
            }
        }
        return view('oficina',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones,
            'menus'=>$menus,
            'descripcion'=>$descripcion,
            'idmenu'=>$idmenu
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
        $publicaciones = Publicacion::where("tipo",3)->where("estado","N")->get();
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
        $publicaciones = Publicacion::where("tipo",4)->where("estado","N")->get();
        return view('documentos',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones
        ]);
    }

    
    

}
    