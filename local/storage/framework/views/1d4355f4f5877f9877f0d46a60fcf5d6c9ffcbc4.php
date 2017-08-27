
<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">   
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">TIPO DE CAMBIO</font>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo URL::to('TipoCambio/create'); ?>">REGISTRAR</a> 
            </div>
        </div>    
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>MONEDA VENTA</CENTER></th>
                <th><CENTER>MONEDA COMPRA</CENTER></th>
                </thead>
                <?php foreach($tipo_cambio as $tc): ?>
                <TR>
                <td><CENTER><?php echo e($tc->monedaVenta); ?></CENTER></td>
                <td><CENTER><?php echo e($tc->monedaCompra); ?></CENTER></td>
                </TR>
                <?php endforeach; ?> 
            </table>
        </div>
    </div>
</div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>