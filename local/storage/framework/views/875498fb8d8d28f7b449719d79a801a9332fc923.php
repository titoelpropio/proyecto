<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <font size="6">LISTA DE VENDEDORES</font>
        </div>

<?php $perfil=DB::select("SELECT *from empleado WHERE empleado.id=".Session::get('idEmpleado')); ?>  
    <?php if ($perfil[0]->idCargo != 3): ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                <div class="pull-right">
                <a class="btn btn-success" href="<?php echo URL::to('RegistroEmpleado'); ?>"><i class="fa fa-plus-square" aria-hidden="true"></i></a> 
                </div>
            </div>
            <?php endif ?>
    
    </div>  
  <div class="row"> 
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">

    

        <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <th><CENTER>C.I.</CENTER></th>
            <th><CENTER>EMPLEADO</CENTER></th>
            <th><CENTER>DIRECCION</CENTER></th>
            <th><CENTER>CELULAR</CENTER></th>
            <th><CENTER>GENERO</CENTER></th>
            <th><CENTER>CODIGO</CENTER></th>
            <th><CENTER>CARGO</CENTER></th>
            <?php if ($perfil[0]->idCargo != 3): ?>
                <th><CENTER>OPCIONES</CENTER></th>                
            <?php endif ?>
        </thead>

         <?php foreach($empleado as $tra): ?>
            <TR style="background: #81DAF5; font-size: 16px;">         
            <td><CENTER><?php echo e($tra->ci); ?> <?php echo e($tra->expedido); ?></CENTER></td>
            <td><?php echo e($tra->nombre); ?> <?php echo e($tra->apellido); ?></td>
            <td><?php echo e($tra->direccion); ?></td>
            <td><CENTER><?php echo e($tra->celular); ?></CENTER></td>
            <td><CENTER><?php echo e($tra->genero); ?></CENTER></td>
            <td><CENTER><?php echo e($tra->codigo); ?></CENTER></td>
            <td><CENTER><?php echo e($tra->cargo); ?></CENTER></td> 
            <?php if ($perfil[0]->idCargo != 3): ?>
            <td><CENTER><a href="Vendedor/<?php echo e($tra->id); ?>" class="btn btn-primary" onclick="actualizar_empleado(<?php echo e($tra->id); ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></CENTER></td>                                 
            <?php endif ?>                   
            </TR> 

            <?php $lista1=DB::select("SELECT empleado.*,cargo.nombre as cargo,vendedor.idEmpleadoPadre,vendedor.idEmpleadoHijo from empleado,vendedor,cargo WHERE empleado.deleted_at IS NULL AND cargo.id=empleado.idCargo AND empleado.id=vendedor.idEmpleadoHijo AND vendedor.idEmpleadoPadre=".$tra->id);             
            for ($i=0; $i < count($lista1); $i++) { ?>
                    <TR style="background: #81F79F; font-size: 16px;">
                    <td><CENTER><?php echo e($lista1[$i]->ci); ?> <?php echo e($lista1[$i]->expedido); ?></CENTER></td>
                    <td><?php echo e($lista1[$i]->nombre); ?> <?php echo e($lista1[$i]->apellido); ?></td>
                    <td><?php echo e($lista1[$i]->direccion); ?></td>
                    <td><CENTER><?php echo e($lista1[$i]->celular); ?></CENTER></td>
                    <td><CENTER><?php echo e($lista1[$i]->genero); ?></CENTER></td>
                    <td><CENTER><?php echo e($lista1[$i]->codigo); ?></CENTER></td>
                    <td><CENTER><?php echo e($lista1[$i]->cargo); ?></CENTER></td>
                    <td><CENTER><a href="Vendedor/<?php echo e($lista1[$i]->id); ?>" class="btn btn-primary" onclick="actualizar_empleado(<?php echo e($lista1[$i]->id); ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></CENTER></td>            
                    </TR>  

                    <?php $lista2=DB::select("SELECT empleado.*,cargo.nombre as cargo,vendedor.idEmpleadoPadre,vendedor.idEmpleadoHijo from empleado,vendedor,cargo WHERE empleado.deleted_at IS NULL AND cargo.id=empleado.idCargo AND empleado.id=vendedor.idEmpleadoHijo AND vendedor.idEmpleadoPadre=".$lista1[$i]->id);             
                    for ($j=0; $j < count($lista2); $j++) {?>
                        <TR style="background: #F3F781; font-size: 16px;">
                        <td><CENTER><?php echo e($lista2[$j]->ci); ?> <?php echo e($lista2[$j]->expedido); ?></CENTER></td>
                        <td><?php echo e($lista2[$j]->nombre); ?> <?php echo e($lista2[$j]->apellido); ?></td>
                        <td><?php echo e($lista2[$j]->direccion); ?></td>
                        <td><CENTER><?php echo e($lista2[$j]->celular); ?></CENTER></td>
                        <td><CENTER><?php echo e($lista2[$j]->genero); ?></CENTER></td>
                        <td><CENTER><?php echo e($lista2[$j]->codigo); ?></CENTER></td>
                        <td><CENTER><?php echo e($lista2[$j]->cargo); ?></CENTER></td>
                        <td><CENTER><a href="Vendedor/<?php echo e($lista2[$j]->id); ?>" class="btn btn-primary" onclick="actualizar_empleado(<?php echo e($lista2[$j]->id); ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></CENTER></td>            
                        </TR>                    
                    <?php } ?> 

            <?php } ?>  
        <?php endforeach; ?> 
        </table>

    </div>
    
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>