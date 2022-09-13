@extends('layouts.main')
@section('contenido')
<!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lista de alumnos</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarProyecto" style="background-color: #4B0082">
  Agregar Proyecto
</button>
    </div>

    <table class="table col-12">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre de proyecto</th>
                    <th>tipo de proyecto</th>
                    <th>Titular de proyecto</th>
                    <th>Colaboradores</th>
                    <th>Fecha tentativa</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
               
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn text-white"    >+</button>
                        </td> 
                    </tr>
              
            </tbody>
        </table>
</div>

<!-- Modal -->
<div class="modal fade" id="agregarProyecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicia tu proyecto</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"> </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group ">
    <label for="exampleInputtext">Nombre de Proyecto</label>
    <input type="text" class="form-control" id="nombreProyecto" aria-describedby="emailHelp">
  </div>
  <div class="form-group" >
    <label for="exampleInputnombre">Tipo de proyecto</label>
    <input type="text" class="form-control" id="exampleInputtext">
  </div>
  <div class="form-group">
    <label for="exampleInputnombre">Titular de proyecto</label>
    <input type="text" class="form-control" id="exampleInputtext">
  </div>
  <div1 class="form-group ">
    <label for="exampleInputnombre">Colaborador de proyecto</label>
    <input type="text" name="colaborador[]" class="form-control" id="exampleInputtext">
    <button type="button" class="btn btn-primary" id="add_btn"  style="background-color: #4B0082" >+</button>
  </div1>
  <div class="form-group">
    <label for="exampleInputnombre">Fecha de inicio</label>
    <input type="date" class="form-control" id="exampleInputtext">
  </div>
  <div class="form-group">
    <label for="exampleInputnombre">Fecha de terminación</label>
    <input type="date" class="form-control" id="exampleInputtext">
  </div>

  
  
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger  " data-dismiss="modal"  >Cerrar</button>
        <button type="button" class="btn btn-success" style="background-color: #4B0082">Guardar</button>
      </div>
    </div>
  </div>
</div>
    </div>

    

@section('scripts')
        <script  >
          $(document).ready(function(){
            $('#add_btn').on('click', function(){
            var html='';
            html+='<input type="text" name="colaborador[]" class="form-control" >'
            html+='<button type="button" class="btn btn-primary" id="remove"  style="background-color: #4B0082" >-</button>'
            $('div1').append(html);
      
        })
    });
         $(document).on('click','#remove',function(){
            $(this).closest('div').remove();
         });

        </script>
    @endsection

    

    
@endsection