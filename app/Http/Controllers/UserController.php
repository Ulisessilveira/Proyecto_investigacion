<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $usuarios = \DB::table('users')
                        ->select('users.*')
                        ->orderBy('id','ASC')
                        ->get();
                        
        if(Auth::user()->nivel !== 'Admin')
        {
            return view('/home');
        }
        return view('usuarios')->with('usuarios',$usuarios);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre'=>'required|min:3|max:20',
            'apellido_paterno'=>'required|min:3|max:20',
            'apellido_materno'=>'required|min:3|max:20',
            'nivel'=>'required|min:3|max:20',
            'email'=>'required|min:3|email',
            'pass1'=>'required|min:3|required_with:pass2|same:pass2',
            'pass2'=>'required|min:3',
        ]);
        if($validator -> fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert','Favor de llenar todos los campos')
            ->withErrors($validator)
            ;
        }else{
            $usuario = User::create([
                'name'=>$request->nombre,
                'apellido_paterno'=>$request->apellido_paterno,
                'apellido_materno'=>$request->apellido_materno,
                'nivel'=>$request->nivel,
                'email'=>$request->email,
                'password'=>Hash::make($request->pass2),
                'img'=>'default.jpg'
            ]);
            return back()->with('Listo','Se ha creado un usuario correctamente');
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->img != 'default.jpg'){
            if(file_exists( public_path('users/'.$user->img))){
                unlink(public_path('users/'.$user->img));
            }
        }
        $user ->delete();
        return back()->with('Listo','El registro se elimino correctamente');
    }
    public function editarUsuario(Request $request)
    {
        $user = User::find($request->id);
        $validator = Validator::make($request->all(),[
            'nombre'=>'required|min:3|max:20',
            'apellido_paterno'=>'required|min:3|max:20',
            'apellido_materno'=>'required|min:3|max:20',
            'nivel'=>'required|min:3|max:20',
            'email'=>'required|min:3|email',
        ]);
        if($validator -> fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert','Favor de llenar todos los campos')
            ->withErrors($validator)
            ;
        }else{   
            $user->name = $request->nombre;
            $user->apellido_paterno=$request->apellido_paterno;
            $user->apellido_materno=$request->apellido_materno;
            $user->nivel=$request->nivel;
            $user->email = $request->email;
            $validator2 = Validator::make($request->all(),[
                'pass1'=>'required|min:3|required_with:pass2|same:pass2',
                'pass2'=>'required|min:3',
            ]);
            if(!$validator2->fails()){
                $user->password = Hash::make($request->pass2);
            }else{
                $user->save();
                return back()->with('Listo','El registro se actualizo correctamente')
                ->with('Error','La contraseña no se actualizo');
            }
            $user->save();
            return back()->with('Listo','El registro se actualizo correctamente');
        }//llave else validator
    }//Llave funsion
}

