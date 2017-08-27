	
	<?php $__env->startSection('contenido'); ?>
        <?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>
 <?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php echo $__env->make('empleado.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">Gestionar Empleado</font>
   
        </div>    
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo URL::to('Empleado/create'); ?>"><i class="fa fa-plus-square" aria-hidden="true"></i></a> 
            </div>
        </div>  
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
            <?php echo Form::open(['route' => 'BuscarEmpleado', 'method' => 'post', 'novalidate', 'class' => 'form-inline']); ?>


            <div class="pull-right">
                <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>        
                <div class="pull-right"><?php echo Form::number('ci',null,['class'=>'form-control ','placeholder'=>'Coloque el CI a buscar']); ?></div>
          
        </div>    
 
<?php echo Form::close(); ?>  
    </div>  
  <div class="row">	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="table-responsive">
		  

		<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<th><CENTER>Nombre</CENTER></th>
		<th><CENTER>Apellido</CENTER></th>
		<th><CENTER>Direccion</CENTER></th>
                <th><CENTER>C.I.</CENTER></th>
                <th><CENTER>Celular</CENTER></th>
                <th><CENTER>Genero</CENTER></th>
                <th><CENTER>Estado</CENTER></th>
                <th><CENTER>Cargo</CENTER></th>
                <th><CENTER>Turno</CENTER></th>
                <th><CENTER>Codigo Vendedor</CENTER></th>

                <th><CENTER>Operacion</CENTER></th>
		</thead>
		 <?php foreach($empleado as $tra): ?>
			<TR  onmouseover="this.style.backgroundColor = '#F6CED8'" onmouseout="this.style.backgroundColor = 'white'">
			<td><CENTER><?php echo e($tra->nombre); ?></CENTER></td>
			<td><CENTER><?php echo e($tra->apellido); ?></CENTER></td>
            <td><CENTER><?php echo e($tra->direccion); ?></CENTER></td>
            <td><CENTER><?php echo e($tra->ci); ?></CENTER></td>
            <td><CENTER><?php echo e($tra->celular); ?></CENTER></td>
            <td><CENTER><?php echo e($tra->genero); ?></CENTER></td>

            <td><CENTER><?php echo e($tra->estado); ?></CENTER></td>
            <td><CENTER><?php echo e($tra->nombreCargo); ?></CENTER></td>

            <td><CENTER><?php echo e($tra->nombreTurno); ?></CENTER></td>
            <td><CENTER><?php echo e($tra->codigo); ?></CENTER></td>

			
			<td><CENTER>
			 <a href="Empleado/<?php echo e($tra->id); ?>/edit" class="btn btn-primary" title="Modificar"><i class="fa fa-pencil" aria-hidden="true" ></i></a>
			   <BUTTON  class="btn btn-danger" title="Eliminar" onclick="cargarDatos(<?php echo e($tra->id); ?>)" data-toggle='modal' data-target='#myModal'><i class="fa fa-trash-o"></i></BUTTON>
			  <a href="Usuario/<?php echo e($tra->id); ?>" class="btn btn-warning" title="Asignar Usuario"><i class="fa fa-user"></i></a>
			</CENTER></td>
		</TR>
		<?php endforeach; ?> 
		</table>

	</div>
	<?php echo $empleado->render(); ?>

	<script type="text/javascript">
		function cargarDatos(id){
				$('input[name=idEmpleado]').val(id);
		}
	</script>
</div>
</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>