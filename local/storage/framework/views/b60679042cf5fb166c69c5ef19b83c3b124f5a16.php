<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.cargando', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('venta.modalDetalle', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
<?php echo Form::open(['route' => 'ListaVentasearch', 'method' => 'post', 'novalidate', 'class' => 'form-inline']); ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">LISTA DE VENTAS</font>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
        <label for="">HASTA</label>
                
            <?php $fecha=DB::select("SELECT curdate()as fecha"); ?>
           <input type="date" name="fecha_fin" value="<?php echo e($fecha[0]->fecha); ?>" class="form-control">
           <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>    
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
         <label for="">DESDE</label> 
               
                    
<input type="date" name="fecha_inicio" value="<?php echo e($fecha[0]->fecha); ?>" class="form-control">
       
    </div>
<?php echo Form::close(); ?>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>CARNET</CENTER></th>
                <th><CENTER>CLIENTE</CENTER></th>                
                <th><CENTER>CELULAR</CENTER></th>
                <th><CENTER>PROYECTO</CENTER></th>

                <th><CENTER>MANZANO</CENTER></th>

                <th><CENTER>NRO LOTE</CENTER></th>
                <th><CENTER>SUPERFICIE</CENTER></th>
                <th><CENTER>CUOTA INICIAL</CENTER></th>
                <th><CENTER>PRECIO DE VENTA</CENTER></th>

                <!--th><CENTER>PRECIO LOTE</CENTER></th-->
                <th><CENTER>CATEGORIA</CENTER></th>
                <th><CENTER>CARNET</CENTER></th>
                <th><CENTER>EMPLEADO</CENTER></th>
                <th><CENTER>FECHA</CENTER></th>
                <th><center>OPERACION</center></th>
                </thead>
                <?php foreach($lista as $lis): ?>
                <TR>
                    <td align=center><?php echo e($lis->ci_cliente); ?></td>
                    <td align=center><?php echo e($lis->cliente); ?></td>                
                    <td align=center><?php echo e($lis->celular); ?></td>
                    <td align=center><?php echo e($lis->nombre); ?></td>

                    <td align=center><?php echo e($lis->manzano); ?></td>

                    <td align=center><?php echo e($lis->nroLote); ?></td>
                    <td align=center><?php echo e($lis->superficie); ?> MT²</td>
                    <td align=center><?php echo e($lis->cuotaInicial); ?></td>
                    <td align=center><?php echo e($lis->precio); ?></td>

                    <!--td align=center><?php echo e($lis->precio); ?></td-->
                    <td align=center><?php echo e($lis->categoria); ?></td>
                    <td align=center><?php echo e($lis->ci_empleado); ?></td>
                    <td align=center><?php echo e($lis->empleado); ?></td>
                    <td align=center><?php echo e($lis->fecha); ?></td>
                    <td align=center><button onclick="buscarVenta(<?php echo e($lis->id); ?>)" class="btn btn-primary" type="button" data-toggle="modal" data-target="#ModalDetalleVenta">DETALLE</button></td>

                </TR>
                <?php endforeach; ?> 
            </table>
        </div>
    </div>

</div>
<?php echo Html::script('js/listaventa.js'); ?>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>