	
	<?php $__env->startSection('contenido'); ?>
        <?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>
 <?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">MODULO</font>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo URL::to('Modulo/create'); ?>">REGISTRAR</a> 
            </div>
        </div>    
    </div>  
  <div class="row">	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="table-responsive">
		
		<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<th><CENTER>ID</CENTER></th>
		<th><CENTER>Nombre</CENTER></th>
	
                <th><CENTER>Operacion</CENTER></th>
		
		</thead>
		 <?php foreach($modulo as $tra): ?>
			<TR>
			<td><CENTER><?php echo e($tra->id); ?></CENTER></td>
			<td><CENTER><?php echo e($tra->nombre); ?></CENTER></td>


			
			
                
			
			<td><CENTER>

         <?php echo link_to_route('Modulo.edit', $title = 'Editar', $parameters = $tra->id, $attributes = ['class'=>'btn btn-primary']); ?>


			</CENTER></td>
		</TR>
		<?php endforeach; ?> 
		</table>
	<?php echo $modulo->render(); ?>

	</div>
</div>
</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>