
<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">	
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <font size="6">LISTA DE PRE-RESERVAS ACTIVAS</font>

        
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>URBANIZACION</CENTER></th>
                <th><CENTER>FASE</CENTER></th>
                <th><CENTER>CATEGORIA</CENTER></th>
                <th><CENTER>MANZANO</CENTER></th>
                <th><CENTER>LOTE</CENTER></th>
                <th><CENTER>CLIENTE</CENTER></th>
                <th><CENTER>CARNET</CENTER></th>

                <th><CENTER>REGISTRO</CENTER></th>
                <th><CENTER>VENCIMIENTO</CENTER></th>

                </thead>
                <?php foreach($lista as $lis): ?>
                <TR>
                <td align="CENTER"><?php echo e($lis->nombre); ?></td>
                <td align="CENTER"><?php echo e($lis->fase); ?></td>
                <td align="CENTER"><?php echo e($lis->categoria); ?></td>
                <td align="CENTER"><?php echo e($lis->manzano); ?></td>
                <td align="CENTER"><?php echo e($lis->nroLote); ?></td>
                <td align="CENTER"><?php echo e($lis->cliente); ?></td>

                <td align="CENTER"><?php echo e($lis->ci_cliente); ?></td>
                <td align="CENTER"><?php echo e($lis->fecha); ?></td>
                <td align="CENTER"><?php echo e($lis->vencimiento); ?></td>
              
                </TR>
                <?php endforeach; ?> 
            </table>
           
        </div>
    </div>
</div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>