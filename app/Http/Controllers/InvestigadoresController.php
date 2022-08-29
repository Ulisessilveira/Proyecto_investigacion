<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;

class InvestigadoresController extends Controller
{
    public function alumnos()
    {
        $usuarios = \DB::table('users')
                        ->select('users.*')
                        ->orderBy('id','ASC')
                        ->where('Nivel','Alumno')
                        ->get();
                        
        return view('alumnos')->with('usuarios',$usuarios);
    }
    public function docentes()
    {
        $usuarios = \DB::table('users')
                        ->select('users.*')
                        ->orderBy('id','ASC')
                        ->where('Nivel','Docente')
                        ->get();
                        
        return view('docentes')->with('usuarios',$usuarios);
    }
}
