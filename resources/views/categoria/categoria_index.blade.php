
@extends('plantilla')

@section('estados', 'categoria')

@section('contenido')
<section class="content-header">
  <h1>
    Categorias
    <small>Control Categorias</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Categorias</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" align="center">ADMINISTRACION DE CATEGORIAS</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">NUEVA CATEGORIA</button>
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>ESTADO</th>
                <th>FECHA</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $con =1; foreach ($obj_cate as  $value) {  ?>
              <tr>
                <td><?php echo $con++; ?></td>
                <td><?php echo $value->c_nombre ?></td>
                <td><?php echo $value->c_descripcion ?></td>
                <td>
                  <?php if($value->c_estado=='activo'){ ?>
                    <small class="label label-success">activo</small>
                  <?php }else{ ?>
                    <small class="label label-danger">inactivo</small>
                  <?php } ?>
                </td>
                <td><?php echo $value->c_fecha_reg ?></td>
                <td>
                  
                </td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>ESTADO</th>
                <th>FECHA</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>




<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal contenido-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">NUEVA CATEGORIA</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="guardarNuevoCategoria" role="form" method="post">
            @csrf
            <div class="form-group">
              <label class="control-label col-sm-3">NOMBRE :</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="c_nombre" placeholder="Ingresar...">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">DESCRIPCION :</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="c_descripcion" placeholder="Ingresar...">
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-default" >GUARDAR DATOS</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
            </div>
          </form>
        </div>
    </div>
</div>
</div>




<script>
  $(function () {
    $("#example1").DataTable();
    $('#fer').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

$("#guardarNuevoCategoria").submit(function(event) {
  event.preventDefault();
  var formData=new FormData($("#guardarNuevoCategoria")[0]);
  $.ajax({
      url:'<?php echo route('categoria.guardarNuevoCategoria') ?>',
      type:'POST',
      data:formData,
      cache:false,
      processData:false,
      contentType:false,
      success:function(dat){ 
        window.location='';
        /*alertify.success("<b>Datos enviados...</b>"); 
        alertify.alert("<b style='color: #008000;'>"+dat+"</b> ", function () { */
          // window.location='';
    
        /*});*/ 
      }
  });
});
</script>
@endsection