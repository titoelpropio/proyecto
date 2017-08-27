
<div class="panel panel-success">
<div class="panel-heading">
<h4>Actualizar Acceso para <?php echo $empleado->nombre." ".$empleado->apellido?></h4>       
  
  </div>  
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>
        <div class="col-sm-6 ">
         <div class="form-group">
    <?php echo Form::label('email','Email o Nick:'); ?>

    <?php echo Form::text('email',$usuario[0]->email,['class'=>'form-control','placeholder'=>'Ingresa el Email del usuario']); ?>

            </div>
          </div>
          <div class="col-sm-6 ">
            <div class="form-group">
                <?php echo Form::label('password','Contraseña:'); ?>

                <?php echo Form::password('password',null,['class'=>'form-control']); ?>

            </div>    
          </div>
        
            <div class="col-sm-3 ">
            
                <div class="form-group">
                    <?php echo Form::label('idPerfil','Perfil:'); ?>

                       <?php echo Form::select('idPerfil',$perfil,null,array('class'=>'form-control')); ?>

                </div>
 
          </div>
        </section>
      </div>
     
    </div>                  
                     
</div>
  <div class="panel-footer">
    <?php echo Form::submit('Actualizar',['class'=>'btn btn-primary']); ?>

  <a href="../Empleado" class="btn btn-danger">Cancelar</a>
    
  </div>
</div>