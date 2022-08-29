@extends('layouts.main')
@section('contenido')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#modalAgregar"><i
            class="fas fa-user fa-sm text-white-50"></i> Añadir usuario</a>
    </div>
    <div class="row">
        @if($message = Session::get('Listo'))
            <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
                <h5>Mensaje: </h5>
                <span>{{$message}}</span>
            </div>
        @endif
        @if($message = Session::get('Error'))
            <div class="col-12 alert alert-warning alert-dismissable fade show" role="alert">
                <h5>Mensaje: </h5>
                <span>{{$message}}</span>
            </div>
        @endif

        <!-- Tabla general -->
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
                            <button class="btn btn-round btnEliminar" 
                                data-id="{{ $usuarios->id }}" 
                                data-toggle="modal" data-target="#modal_Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>

                            <button class="btn btn-round btnEditar" 
                                data-id="{{ $usuarios->id }}" 
                                data-name="{{ $usuarios->name }}" 
                                data-apellido_paterno="{{ $usuarios->apellido_paterno }}" 
                                data-apellido_materno="{{ $usuarios->apellido_materno }}" 
                                data-nivel="{{ $usuarios->nivel }}" 
                                data-email="{{ $usuarios->email }}" 
                                data-toggle="modal" data-target="#modal_Editar">
                                <i class="fa fa-edit"></i>
                            </button>
                            <form action="{{url('/admin/usuarios',['id'=>$usuarios->id])}}" method="post" id="formEli_{{ $usuarios->id}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$usuarios->id}}">
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<!-- Modal agregar-->
    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/usuarios" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('nombre')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido paterno" value="{{ old('apellido_paterno')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido materno" value="{{ old('apellido_materno')}}">
                        </div>
                        <div class="form-group">
                                <select type="text" class="form-control" name="nivel" placeholder="Nivel de usuario" value="{{ old('nivel')}}">
                                <option value="" selected disabled hidden>Nivel</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Alumno">Alumno</option>
                                    <option value="Docente">Docente</option>
				                </select>
                            </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass1" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass2" placeholder="Confirmar contraseña">
                        </div>
                    </div>
                    @if($message = Session::get('ErrorInsert'))
                        <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                            <h5>Errores: </h5>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal eliminar-->
<div class="modal fade" id="modal_Eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>¿Desea eliminar el usuario?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

<!-- Modal editar-->
    <div class="modal fade" id="modal_Editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/usuarios/edit" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="idEdit">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('nombre')}}" id="nameEdit">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido paterno" value="{{ old('apellido_paterno')}}" id="apellido_paternoEdit">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido materno" value="{{ old('apellido_materno')}}" id="apellido_maternoEdit">
                        </div>
                        <div class="form-group">
                                <select type="text" class="form-control" name="nivel" placeholder="Nivel de usuario" value="{{ old('nivel')}}">
                                    <option value="" selected disabled hidden>Nivel</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Alumno">Alumno</option>
                                        <option value="Docente">Docente</option>
				                </select>       
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" id="emailEdit">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass1" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass2" placeholder="Confirmar contraseña">
                        </div>
                    </div>
                    @if($message = Session::get('ErrorInsert'))
                        <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                            <h5>Errores: </h5>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
    @section('scripts')
        <script>
            var idEliminar=0;
            $(document).ready(function(){
                @if($message = Session::get('ErrorInsert'))
                    $("#modalAgregar").modal('show');
                @endif
                $(".btnEliminar").click(function(){
                    idEliminar = $(this).data('id');
                });
                
                $(".btnModalEliminar").click(function(){
                    $("#formEli_"+idEliminar).submit();
                });

                $(".btnEditar").click(function(){
                    $("#idEdit").val($(this).data('id'));
                    $("#nameEdit").val($(this).data('name'));
                    $("#apellido_paternoEdit").val($(this).data('apellido_paterno'));
                    $("#apellido_maternoEdit").val($(this).data('apellido_materno'));
                    $("#nivelEdit").val($(this).data('nivel'));
                    $("#emailEdit").val($(this).data('email'));
                });
            });
        </script>
    @endsection
