
<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
<?php echo Form::open(['route' => 'PagoVenta/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']); ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">LISTA DE VENTAS</font>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
            <div class="pull-right">
                <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>        
            <div class="pull-right"><B>CARNET:</B> <input type="text" name="ci" class="form-control" onkeypress="return bloqueo_de_punto(event)"></div>
        </div>    
    </div>
<?php echo Form::close(); ?>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>CARNET</CENTER></th>
                <th><CENTER>CLIENTE</CENTER></th>                
                <th><CENTER>CELULAR</CENTER></th>
                <th><CENTER>NRO LOTE</CENTER></th>
                <th><CENTER>MANZANO</CENTER></th>
                <th><CENTER>CUOTA INICIAL</CENTER></th>
                <!--th><CENTER>PRECIO LOTE</CENTER></th-->
                <th><CENTER>CATEGORIA</CENTER></th>
                <!--th><CENTER>CARNET</CENTER></th>
                <th><CENTER>EMPLEADO</CENTER></th-->
                <th><CENTER>FECHA</CENTER></th>
                <th><CENTER>OPCION</CENTER></th>
                </thead>
                <?php foreach($lista as $lis): ?>
                <TR>
                    <td align=center><?php echo e($lis->ci_cliente); ?></td>
                    <td align=center><?php echo e($lis->cliente); ?></td>                
                    <td align=center><?php echo e($lis->celular); ?></td>                
                    <td align=center><?php echo e($lis->nroLote); ?></td>
                    <td align=center><?php echo e($lis->manzano); ?></td>
                    <td align=center><?php echo e($lis->cuotaInicial); ?></td>
                    <!--td align=center><?php echo e($lis->precio); ?></td-->
                    <td align=center><?php echo e($lis->nombre); ?></td>
                    <!--td align=center><?php echo e($lis->ci_empleado); ?></td>
                    <td align=center><?php echo e($lis->empleado); ?></td-->
                    <td align=center><?php echo e($lis->fecha); ?></td>
                    <td align=center><?php echo link_to_route('PlanPago.show', $title='PAGAR', $parameters=$lis->id, $attributes=['class'=>'btn-sm btn-success']); ?>

                    </td>                    
                </TR>
                <?php endforeach; ?> 
            </table>
        </div>
    </div>

</div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>