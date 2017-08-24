<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.cargando', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="row"> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">RESERVA</font>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">         
            <div class="pull-right">
                <button type="button"  class="btn btn-success" id="btn_agregar" onclick="crear()">REGISTRAR</button> 
            </div>
        </div>    
    </div>
    <?php echo Form::open(['route'=>'Reserva.store', 'method'=>'POST' , 'enctype'=>'multipart/form-data','onKeypress'=>'if(event.keyCode == 13) event.returnValue = false;']); ?>    
        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
        Codigo Vendedor:
          <select name="idVendedor" class="form-control selectpicker" data-live-search="true">
          <option value="0">seleccione</option>
            <?php 
              foreach ($vendedor as $key => $value) {
                echo "<option value=".$value->id.">".$value->codigo;
              }
             ?>
          </select>
        </div> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th><center>URBANIZACION</center></th>

                <th><center>FASE</center></th>

                <th><center>NRO MANZANO</center></th>
                <th><center>NRO LOTE</center></th>
                <th><center>DETALLE</center></th>
                <th><center>PRECIO</center></th>
                 <th><center>TIPO DE PAGO</center></th>
                
                 <th><center>ELIMINAR</center></th>

                <th><center><button type="button" id="btn_agre" class="btn btn-success" onclick="agregar()"><i class="fa fa-plus" aria-hidden="true"></i></button></center></th>
            </tr>
        </thead>
        <tbody id="body_busqueda"></tbody>
        <tfoot>
            
            <td colspan="4"><font size="4" color="red">MONTO TOTAL</font></td>
            <td></td>
            <td align="center">
            <input type="text" name="montoTotal" id="montoTotal" size="7" style="text-align: center; font-size: 20px" value="0.0" readonly="" onkeypress="return bloqueo_de_punto(event)"></td>
            <td align="center"></td>
            </tr>
        </tfoot>
        </table>
      </div>
            <?php /*<tr>
                <td> Nro. Lote: <input type="text" id="nro_lote" class="form-control" placeholder="Nro Lote"> </td>
                <td> Nro. Manzano: <input type="text" id="nro_manzano" class="form-control" placeholder="Nro Manzano"> </td>
                <td> <button type="button" class="btn btn-info" onclick="Buscar_Lote()"><i class="fa fa-search" aria-hidden="true"></i></button></td>
            </tr>*/ ?>


      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_crear_1">

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >

            <div class="form-group">
            <!-- este tipo reserva es para especificar en estoy en el formulario de reserva -->
            <input type="hidden" name="tipoReserva" value="0">
                <?php echo Form::label('ci','Carnet:'); ?>

                <?php echo Form::text('ci',null,['class'=>'form-control ','placeholder'=>'Carnet','onchange'=>'BuscarCliente()','onkeypress'=>'return bloqueo_de_punto(event)']); ?>

            </div>  
            </div>     
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="form-group">
                <?php echo Form::label('expedido','Expedido:'); ?>

                <select name="expedido" class="form-control">
                    <option value="SC">[SC] SANTA CRUZ</option>
                    <option value="LP">[LP] LA PAZ</option>
                    <option value="CB">[CB] COCHABAMBA</option>
                    <option value="BN">[BN] BENI</option>
                    <option value="CH">[CH] CHUQUISACA</option>
                    <option value="PA">[PA] PANDO</option>
                    <option value="TJ">[TJ] TARIJA</option>
                    <option value="PT">[PT] POTOSI</option>

                    <option value="OR">[OR] ORURO</option>
                      <option value="EX">[EX] EXTRANJERO</option>
                </select>
            </div>       
            </div>       
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>
                 <input type="radio" name="genero" id="m" value="m" checked="" class="minimal"> Masculino 
                 </label>
                 <label> 
                 <input type="radio" name="genero" id="f" value="f" class="minimal"> Femenino 
                 </label>
                
            </div>

            </div>
            </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_crear_1">

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="form-group">
                <?php echo Form::label('nombre','Nombres:'); ?>

                <input  class="form-control" name="nombre" type="text" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            </div>

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="form-group">
                <?php echo Form::label('apellidos','Apellidos:'); ?>

                 <input  class="form-control" name="apellidos" type="text" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="form-group">
                <?php echo Form::label('nacionalidad','Pais de origen:'); ?>

                <select name="nacionalidad" class="form-control" onchange="cargarCiudad()">
                    <option>Seleccione un pais</option>
                    <?php foreach ($nacionalidad as $key => $value) {
                        echo "<option value=".$value->id.">".$value->paisnombre;
                    } ?>
                </select>
            </div>
            </div>
             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="form-group">
                <?php echo Form::label('apellidos','Lugar de Nacimiento(ciudad-provincia):'); ?>

                 <input  class="form-control" name="apellidos" type="text" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="form-group">
                <?php echo Form::label('fechaNacimiento','Fecha Nacimiento:'); ?>

                <?php echo Form::date('fechaNacimiento',null,['class'=>'form-control ','placeholder'=>'Fecha Nacimiento']); ?>

            </div>
            </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="form-group">
                <?php echo Form::label('estadoCivil','Estado Civil:'); ?>

                <?php echo Form::select('estadoCivil', array('s' => 'SOLTERO(A)', 'c' => 'CASADO(A)', 'v' => 'VIUDO(A)', 'd' => 'DIVORCIADO(A)'),null,array('id'=>'estado','class'=>'form-control')); ?>

            </div>  
            </div> 
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
      
            <div class="form-group">
                <?php echo Form::label('lugarProcedencia','Ciudad de Procedencia:'); ?>

                <?php echo Form::text('lugarProcedencia',null,['class'=>'form-control ','placeholder'=>'Lugar Procedencia']); ?>

            </div>
            </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
             <div class="form-group">
                <?php echo Form::label('ocupacion','Ocupacion:'); ?>

                <?php echo Form::text('ocupacion',null,['class'=>'form-control ','placeholder'=>'Ocupacion']); ?>

            </div>
            </div>

    

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >

            <div class="form-group">
                <?php echo Form::label('celular','Celular:'); ?>

                <?php echo Form::text('celular',null,['class'=>'form-control ','placeholder'=>'Celular','onkeypress'=>'return bloqueo_de_punto(event)']); ?>

            </div>  
            </div>  
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="form-group">
                <?php echo Form::label('celular_ref','Celular Referencia:'); ?>

                <?php echo Form::text('celular_ref',null,['class'=>'form-control ','placeholder'=>'Celular Referencia','onkeypress'=>'return bloqueo_de_punto(event)']); ?>

            </div>   
            </div>   
     
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="form-group">
                <?php echo Form::label('domicilio','Domicilio:'); ?>

                <?php echo Form::text('domicilio',null,['class'=>'form-control ','placeholder'=>'Domicilio']); ?>

            </div>  
            </div>  
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="form-group">
                <?php echo Form::label('nit','NIT:'); ?>

                <?php echo Form::text('nit',null,['class'=>'form-control ','placeholder'=>'NIT','onkeypress'=>'return bloqueo_de_punto(event)']); ?>

            </div>    
            </div>    
            <div class="pull-right">
                <?php echo Form::submit('RESERVAR',['class'=>'btn btn-primary','id'=>'btn_registrar','onclick'=>'btn_esconder()']); ?>

                <a href="<?php echo URL::to('Reserva'); ?>" class="btn btn-danger">CANCELAR</a>
            </div>                                                                                                             
      </div> 

<?php echo Form::close(); ?>


</div>

<?php echo Html::script('js/reserva.js'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>