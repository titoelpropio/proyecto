	<?php $__env->startSection('contenido'); ?>
   
	<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo Form::open(['route'=>'Empleado.store', 'method'=>'POST']); ?>

	     <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php echo $__env->make('empleado.forms.usr', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

   <div class="panel-footer">
   <?php echo Form::submit('Registrar',['class'=>'btn btn-primary']); ?>

  <a class="btn btn-danger" href="../Empleado">Cancelar</a>    
  </div>
</div>

		       </div>
</div>
	<?php echo Form::close(); ?>

 
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>