@extends('layouts.main')
@section('contenido')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lista de alumnos</h1>
    </div>

    <table class="table col-12">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Email</th>
                    <th>Nivel</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuarios)
                    <tr>
                        <td>{{$usuarios->id}}</td>
                        <td>{{$usuarios->name}}</td>
                        <td>{{$usuarios->apellido_paterno}}</td>
                        <td>{{$usuarios->apellido_materno}}</td>
                        <td>{{$usuarios->email}}</td>
                        <td>{{$usuarios->nivel}}</td>
                        <td>
                            <button type="button" class="btn text-white" style="background-color: #4B0082">+</button>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
@section('scripts')
        <script>
            var idEliminar=0;
            $(document).ready(function(){
                
            });
        </script>
    @endsection