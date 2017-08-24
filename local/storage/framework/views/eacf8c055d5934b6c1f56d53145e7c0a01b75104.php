	
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
            <font size="6">GESTIONAR PERFIL</font>
        </div>
<input type="hidden" name="" id="perfilpuedeGuardar">
<input type="hidden" name="" id="perfilpuedeEliminar">
<input type="hidden" name="" id="perfilpuedeModificar">
<input type="hidden" name="" id="perfilpuedeListar">
<input type="hidden" name="" id="perfilpuedeImprimir">
<input type="hidden" name="" id="perfilpuedeVerReporte">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo URL::to('Perfil/create'); ?>"><i class="fa fa-plus-square" aria-hidden="true"></i></a> 
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
		<tbody id="listar">
		 <?php foreach($perfil as $tra): ?>
			<TR>
			<td><CENTER><?php echo e($tra->id); ?></CENTER></td>
			<td><CENTER><?php echo e($tra->nombre); ?></CENTER></td>


			
			
                
			
			<td><CENTER>

       <a href="Perfil/<?php echo e($tra->id); ?>/edit" class="btn btn-primary" title="Modificar"><i class="fa fa-pencil" aria-hidden="true" ></i></a>
         <button title="ELIMINAR" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
 <a href="PerfilObjeto/<?php echo e($tra->id); ?>" class="btn btn-warning" title="Perfil Objeto"><i class="fa fa-newspaper-o" aria-hidden="true"></i></a>

			</CENTER></td>
		</TR>
		<?php endforeach; ?> 
		</tbody>
		</table>
	<?php echo $perfil->render(); ?>

	</div>
</div>
</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>