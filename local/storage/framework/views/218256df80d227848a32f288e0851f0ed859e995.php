



<div class="panel panel-success">
<div class="panel-heading">
<h4>DATOS DEL EMPLEADO</h4>       
  
  </div>  
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>
        <div class="col-sm-6 ">
         <div class="form-group">
    <?php echo Form::label('nombre','Nombre:'); ?>

    <?php echo Form::text('nombre',null,['class'=>'form-control ','placeholder'=>'Ingresa el Nombre del usuario']); ?>

</div>
          </div>
          <div class="col-sm-6 ">
            <div class="form-group">
                <?php echo Form::label('apellido','Apellido:'); ?>

                <?php echo Form::text('apellido',null,['class'=>'form-control ','placeholder'=>'Ingresa el apellido del usuario']); ?>

            </div>    
          </div>
           <div class="col-sm-6 ">
         <div class="form-group">
            <?php echo Form::label('ci','C.I.:'); ?>

            <?php echo Form::number('ci',null,['class'=>'form-control ','placeholder'=>'Ingresa el C.I. del usuario']); ?>

        </div> 
          </div>
          <div class="col-sm-6 ">

 <div class="form-group">
                <?php echo Form::label('nacionalidad','Nacionalidad:'); ?>

                   <?php echo Form::select('idPais',$pais,null,array('class'=>'form-control')); ?>

            </div>
          </div>
          <div class="col-sm-6 ">
          <div class="form-group">
                <?php echo Form::label('direccion','Direccion:'); ?>

                <?php echo Form::text('direccion',null,['class'=>'form-control ','placeholder'=>'Ingresa el Direccion del usuario']); ?>

            </div>
          </div>
           
            <div class="col-sm-3 ">
                <div class="form-group">
                    <?php echo Form::label('celular','Celular:'); ?>

                    <?php echo Form::number('celular',null,['class'=>'form-control ','placeholder'=>'Ingresa el Celular del usuario']); ?>

                </div>
 
          </div>
            <div class="col-sm-3 ">
                <div class="form-group">
                    <?php echo Form::label('idTurno','Turno:'); ?>

                      <?php echo Form::select('idTurno',$turno,null,array('class'=>'form-control')); ?>

                </div>
 
          </div>
                <div class="col-sm-3 ">
                <div class="form-group">
                    <?php echo Form::label('idCargo','Cargo:'); ?>

                   <?php echo Form::select('idCargo',$cargo,null,array('class'=>'form-control')); ?>

                </div>
 
          </div>
                <div class="col-sm-3 ">

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
            
               <div class="col-sm-3 ">
                <div class="form-group">
                    <?php echo Form::label('codigo','Generar Codigo Vendedor:'); ?>

                    <?php echo Form::hidden('codigo',null,['class'=>'form-control ','placeholder'=>'Ingresa el codigo del usuario']); ?>

                </div>
            <input class="btn btn-warning" onclick="generarCodigo()" value="generar">
          </div>
            <div class="col-sm-3 ">
                <div class="form-group">
          <label>Género</label><br>
          <label>

     <?php echo Form::radio('genero','m',['class'=>'form-control']); ?>Masculino
  </label>

 <label>

         <?php echo Form::radio('genero','f',null); ?>Femenino


  </label>    </div>
 
          </div>
        </section>
      </div>
     
    </div>                  
                     
</div>
 <script type="text/javascript">
   function generarCodigo(){
yourNumber=parseInt($('input[name=ci]').val());
    hexString = yourNumber.toString(16);
    $('input[name=codigo]').attr('type','text');
    $('input[name=codigo]').val(hexString);

   }

 </script>