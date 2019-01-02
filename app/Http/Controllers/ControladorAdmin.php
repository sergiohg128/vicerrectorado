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

class ControladorAdmin extends Controller
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
        if(!empty($usuario)){
            return redirect("/admin/inicio");
        }else{
            return view('/admin/index',[
                'mensaje'=>$mensaje
            ]);
        }
    }

    public function Login(Request $request,  Response $response) {
        $user = $request->input('user');
        $pass = $request->input('pass');
        $usuario = Usuario::where('usuario',$user)->first();
        if(!empty($usuario)){
            if($usuario->estado=="N"){
                if($usuario->password==$pass){
                    $request->session()->put('usuario', $usuario);
                    return redirect("/admin/");
                }else{
                    $request->session()->put('mensaje', "CONTRASEÑA INCORRECTA");
                    return redirect("/admin/");
                }
            }else{
                $request->session()->put('mensaje', "EL USUARIO HA SIDO ELIMINADO");
                return redirect("/admin/");
            }
        }else{
            $request->session()->put('mensaje', "EL USUARIO NO EXISTE");
            return redirect("/admin/");
        }   
    }
    
    public function Logout(Request $request,  Response $response) {
        $request->session()->invalidate();
        return redirect("/index");
    }

    public function Inicio(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        if($this->ComprobarUsuario($usuario)){
            $mensaje = $request->session()->get('mensaje');
            $request->session()->forget('mensaje');
            return view('/admin/inicio',[
                'usuario'=>$usuario,
                'mensaje'=>$mensaje,
                'w'=>0
            ]);
        }else{
            return redirect("/index");
        }
    }

    public function Noticias(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        if($this->ComprobarUsuario($usuario)){
            $mensaje = $request->session()->get('mensaje');
            $request->session()->forget('mensaje');
            $publicaciones = Publicacion::where("tipo",1)->where("id_oficina",$usuario->id_oficina)->orderBy("id")->get();
            return view('/admin/noticias',[
                'usuario'=>$usuario,
                'mensaje'=>$mensaje,
                'publicaciones'=>$publicaciones,
                'w'=>0
            ]);
        }else{
            return redirect("/index");
        }
    }

    public function Pasantias(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        if($this->ComprobarUsuario($usuario)){
            $mensaje = $request->session()->get('mensaje');
            $request->session()->forget('mensaje');
            $publicaciones = Publicacion::where("tipo",2)->where("id_oficina",$usuario->id_oficina)->orderBy("id")->get();
            return view('/admin/pasantias',[
                'usuario'=>$usuario,
                'mensaje'=>$mensaje,
                'publicaciones'=>$publicaciones,
                'w'=>0
            ]);
        }else{
            return redirect("/index");
        }
    }

    public function Financiamientos(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        if($this->ComprobarUsuario($usuario)){
            $mensaje = $request->session()->get('mensaje');
            $request->session()->forget('mensaje');
            $publicaciones = Publicacion::where("tipo",3)->where("id_oficina",$usuario->id_oficina)->orderBy("id")->get();
            return view('/admin/financiamientos',[
                'usuario'=>$usuario,
                'mensaje'=>$mensaje,
                'publicaciones'=>$publicaciones,
                'w'=>0
            ]);
        }else{
            return redirect("/index");
        }
    }

    public function Documentos(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        if($this->ComprobarUsuario($usuario)){
            $mensaje = $request->session()->get('mensaje');
            $request->session()->forget('mensaje');
            $publicaciones = Publicacion::where("tipo",4)->where("id_oficina",$usuario->id_oficina)->orderBy("id")->get();
            return view('/admin/documentos',[
                'usuario'=>$usuario,
                'mensaje'=>$mensaje,
                'publicaciones'=>$publicaciones,
                'w'=>0
            ]);
        }else{
            return redirect("/index");
        }
    }

    public function NoticiaFormulario(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        if($this->ComprobarUsuario($usuario)){
            $mensaje = $request->session()->get('mensaje');
            $request->session()->forget('mensaje');
            $id = $request->input("id");
            $publicacion = new Publicacion();
            $modo = "nuevo";
            if($id>0){
            	$modo = "editar";
            	$publicacion = Publicacion::find($id);
            }
            return view('/admin/noticia-formulario',[
                'usuario'=>$usuario,
                'mensaje'=>$mensaje,
                'publicacion'=>$publicacion,
                'modo'=>$modo,
                'w'=>0
            ]);
        }else{
            return redirect("/index");
        }
    }

    public function PasantiaFormulario(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        if($this->ComprobarUsuario($usuario)){
            $mensaje = $request->session()->get('mensaje');
            $request->session()->forget('mensaje');
            $id = $request->input("id");
            $publicacion = new Publicacion();
            $modo = "nuevo";
            if($id>0){
                $modo = "editar";
                $publicacion = Publicacion::find($id);
            }
            return view('/admin/pasantia-formulario',[
                'usuario'=>$usuario,
                'mensaje'=>$mensaje,
                'publicacion'=>$publicacion,
                'modo'=>$modo,
                'w'=>0
            ]);
        }else{
            return redirect("/index");
        }
    }

    public function FinanciamientoFormulario(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        if($this->ComprobarUsuario($usuario)){
            $mensaje = $request->session()->get('mensaje');
            $request->session()->forget('mensaje');
            $id = $request->input("id");
            $publicacion = new Publicacion();
            $modo = "nuevo";
            if($id>0){
                $modo = "editar";
                $publicacion = Publicacion::find($id);
            }
            return view('/admin/financiamiento-formulario',[
                'usuario'=>$usuario,
                'mensaje'=>$mensaje,
                'publicacion'=>$publicacion,
                'modo'=>$modo,
                'w'=>0
            ]);
        }else{
            return redirect("/index");
        }
    }

    public function DocumentoFormulario(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        if($this->ComprobarUsuario($usuario)){
            $mensaje = $request->session()->get('mensaje');
            $request->session()->forget('mensaje');
            $id = $request->input("id");
            $publicacion = new Publicacion();
            $modo = "nuevo";
            if($id>0){
                $modo = "editar";
                $publicacion = Publicacion::find($id);
            }
            return view('/admin/documento-formulario',[
                'usuario'=>$usuario,
                'mensaje'=>$mensaje,
                'publicacion'=>$publicacion,
                'modo'=>$modo,
                'w'=>0
            ]);
        }else{
            return redirect("/index");
        }
    }

    public function PublicacionFormulario(Request $request,  Response $response) {
        $usuario = $request->session()->get('usuario');
        if($this->ComprobarUsuario($usuario)){
            $modo = $request->input("modo");
            $tipo = $request->input("tipo");
            $imagen = $request->file("imagen");
            $archivo = $request->file("archi");

            DB::beginTransaction();
            try{
	            $publicacion = new Publicacion();
	            if($modo=="editar"){
	            	$publicacion = Publicacion::find($request->input("publicacion"));
	            }

	            $publicacion->titulo = $request->input("titulo");
	            $publicacion->corta = $request->input("corta");
	            $publicacion->larga = $request->input("larga");
	            $publicacion->tipo = $request->input("tipo");
	            $publicacion->id_oficina = $usuario->id_oficina;
	            $publicacion->save();

	            if($imagen!=null){
		            $ext = $imagen->getClientOriginalExtension();
		            $publicacion->imagen = $ext;
		            \Storage::disk('publicacion')->put($publicacion->id_oficina."/publicaciones/".$publicacion->id."a.".$ext,  \File::get($imagen));
	            }

	            if($archivo!=null){
		            $ext = $archivo->getClientOriginalExtension();
		            $publicacion->archivo = $ext;
		            \Storage::disk('publicacion')->put($publicacion->id_oficina."/publicaciones/".$publicacion->id."b.".$ext,  \File::get($archivo));
	            }
	            $publicacion->save();
	            DB::commit();

                switch ($publicacion->tipo) {
                    case 1:
                            return redirect("/admin/noticias");
                        break;
                    case 2:
                            return redirect("/admin/pasantias");
                        break;
                    case 3:
                            return redirect("/admin/financiamientos");
                        break;
                    case 4:
                            return redirect("/admin/documentos");
                        break;
                    default:
                        # code...
                        break;
                }
            }
            catch (Exception $ex) {
                return redirect("/admin/index");
            }
        }else{
            return redirect("/admin/index");
        }
    }
    

}
    