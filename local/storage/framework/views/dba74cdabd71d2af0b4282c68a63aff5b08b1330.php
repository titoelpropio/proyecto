
<?php $__env->startSection('contenido'); ?>
<H3>REGISTRAR PERFIL</H3>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo Form::open(['route'=>'Perfil.store', 'method'=>'POST']); ?>	
		<?php echo $__env->make('perfil.forms.mod', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>		
	<?php echo Form::submit('Registrar',['class'=>'btn btn-primary']); ?>

	<?php echo Form::reset('Cancelar',['class'=>'btn btn-danger']); ?>

	<?php echo Form::close(); ?>

	</div>
</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>