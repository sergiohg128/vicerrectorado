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
use App\TipoDocumento;
use App\ProyectoRecord;
use App\TipoGrupoRecord;

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
        $publicaciones = Publicacion::where("id_oficina",1)->where("estado","N")->where("tipo",1)->orderBy("id","desc")->paginate(10);
        $oficina = Oficina::find(1);
        $tiposgrupo = TipoGrupoRecord::where("estado","N")->get();
        $boletines = Publicacion::where("tipo",4)->where("id_tipodocumento",2)->where("estado","N")->orderBy("titulo","desc")->get();
        return view('index',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones,
            'tiposgrupo'=>$tiposgrupo,
            'boletines'=>$boletines
        ]);
    }

    public function Proyectos(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $slides = Slider::where("id_oficina",1)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        
        $oficina = Oficina::find(1);
        $tiposgrupo = TipoGrupoRecord::where("estado","N")->get();
        $tipo = $request->input("t");
        $proyectos = ProyectoRecord::where("id_tipo_grupo",$tipo)->orderBy("id","desc")->paginate(10);

        $boletines = Publicacion::where("tipo",4)->where("id_tipodocumento",2)->where("estado","N")->orderBy("titulo","desc")->get();
        return view('proyectos',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'proyectos'=>$proyectos,
            'tiposgrupo'=>$tiposgrupo,
            'boletines'=>$boletines
        ]);
    }

    public function Proyecto(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $slides = Slider::where("id_oficina",1)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        
        $oficina = Oficina::find(1);
        $tiposgrupo = TipoGrupoRecord::where("estado","N")->get();
        $idproyecto = $request->input("id");
        $proyecto = ProyectoRecord::find($idproyecto);

        $boletines = Publicacion::where("tipo",4)->where("id_tipodocumento",2)->where("estado","N")->orderBy("titulo","desc")->get();
        return view('proyecto',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'proyecto'=>$proyecto,
            'tiposgrupo'=>$tiposgrupo,
            'boletines'=>$boletines
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
        $publicacion->vistas = $publicacion->vistas +1;
        $publicacion->save();
        $oficina = Oficina::find($publicacion->id_oficina);
        $tiposgrupo = TipoGrupoRecord::where("estado","N")->get();

        $boletines = Publicacion::where("tipo",4)->where("id_tipodocumento",2)->where("estado","N")->orderBy("titulo","desc")->get();
        switch ($publicacion->tipo) {
            case 1:
                return view('noticia',[
                    'mensaje'=>$mensaje,
                    'oficinas'=>$oficinas,
                    'slides'=>$slides,
                    'oficina'=>$oficina,
                    'url_base'=>$url_base,
                    'url_base2'=>$url_base2,
                    'publicacion'=>$publicacion,
                    'tiposgrupo'=>$tiposgrupo,
                    'boletines'=>$boletines
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
                    'publicacion'=>$publicacion,
                    'tiposgrupo'=>$tiposgrupo,
                    'boletines'=>$boletines
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
                    'publicacion'=>$publicacion,
                    'tiposgrupo'=>$tiposgrupo,
                    'boletines'=>$boletines
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
                    'publicacion'=>$publicacion,
                    'tiposgrupo'=>$tiposgrupo,
                    'boletines'=>$boletines
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
            $idmenu = $menu->id;
            if(!empty($menu)){
                $descripcion = $menu->descripcion;
            }else{
                $descripcion = "";
            }
        }
        $tiposgrupo = TipoGrupoRecord::where("estado","N")->get();

        $boletines = Publicacion::where("tipo",4)->where("id_tipodocumento",2)->where("estado","N")->orderBy("titulo","desc")->get();
        return view('oficina',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones,
            'menus'=>$menus,
            'descripcion'=>$descripcion,
            'idmenu'=>$idmenu,
            'tiposgrupo'=>$tiposgrupo,
            'boletines'=>$boletines
        ]);
    }
    
    public function Pasantias(Request $request,  Response $response) {
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $oficina = Oficina::find(1);
        $slides = Slider::where("id_oficina",$oficina->id)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        $publicaciones = Publicacion::where("tipo",2)->where("estado","N")->paginate(10);
        $tiposgrupo = TipoGrupoRecord::where("estado","N")->get();

        $boletines = Publicacion::where("tipo",4)->where("id_tipodocumento",2)->where("estado","N")->orderBy("titulo","desc")->get();
        return view('pasantias',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones,
            'tiposgrupo'=>$tiposgrupo,
            'boletines'=>$boletines
        ]);
    }

    public function Financiamientos(Request $request,  Response $response) {
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $oficina = Oficina::find(1);
        $slides = Slider::where("id_oficina",$oficina->id)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        $publicaciones = Publicacion::where("tipo",3)->where("estado","N")->paginate(10);
        $tiposgrupo = TipoGrupoRecord::where("estado","N")->get();

        $boletines = Publicacion::where("tipo",4)->where("id_tipodocumento",2)->where("estado","N")->orderBy("titulo","desc")->get();
        return view('financiamientos',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones,
            'tiposgrupo'=>$tiposgrupo,
            'boletines'=>$boletines
        ]);
    }

    public function Docs(Request $request,  Response $response) {
        $mensaje = $request->session()->get('mensaje');
        $request->session()->forget('mensaje');
        $oficina = Oficina::find(1);
        $slides = Slider::where("id_oficina",$oficina->id)->where("estado","N")->get();
        $oficinas = Oficina::where("id",">",1)->where("estado","N")->orderBy("nombre")->get();
        $tipos = TipoDocumento::where("estado","N")->orderBy("id")->get();
        $idtipo = $request->input("t");
        if(empty($idtipo)){
            $idtipo = TipoDocumento::where("estado","N")->orderBy("id")->first()->id;
        }
        $publicaciones = Publicacion::where("tipo",4)->where("id_tipodocumento",$idtipo)->where("estado","N")->paginate(10);
        $tiposgrupo = TipoGrupoRecord::where("estado","N")->get();

        $boletines = Publicacion::where("tipo",4)->where("id_tipodocumento",2)->where("estado","N")->orderBy("titulo","desc")->get();
        return view('documentos',[
            'mensaje'=>$mensaje,
            'slides'=>$slides,
            'oficina'=>$oficina,
            'oficinas'=>$oficinas,
            'publicaciones'=>$publicaciones,
            'tipos'=>$tipos,
            'idtipo'=>$idtipo,
            'tiposgrupo'=>$tiposgrupo,
            'boletines'=>$boletines
        ]);
    }

    
    

}
    