<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">LISTA DE RESERVAS</font>
        </div>

<?php echo Form::open(['route' => 'ListaReservasearch', 'method' => 'post', 'novalidate', 'class' => 'form-inline']); ?>


        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
            <div class="pull-right">
                <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>        
            <?php $fecha=DB::select("SELECT curdate()as fecha"); ?>
            <div class="pull-right"><input type="date" name="fecha_inicio" value="<?php echo e($fecha[0]->fecha); ?>" class="form-control"></div>
        </div>    
<?php echo Form::close(); ?>


<?php echo Form::open(['route' => 'ListaReservasearchci', 'method' => 'post', 'novalidate', 'class' => 'form-inline']); ?>


        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
            <div class="pull-right">
                <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>        
            <?php $fecha=DB::select("SELECT curdate()as fecha"); ?>
            <div class="pull-right">
            <label>C.I</label>
            <input type="number" name="ci" value="" class="form-control"></div>
        </div>    
<?php echo Form::close(); ?>

    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>CARNET</CENTER></th>
                <th><CENTER>CLIENTE</CENTER></th>                
                <th><CENTER>PROYECTO</CENTER></th>
                <th><CENTER>FASE</CENTER></th>
                <th><CENTER>MANZANO</CENTER></th>
                <th><CENTER>NRO LOTE</CENTER></th>
                <th><CENTER>CATEGORIA</CENTER></th>
                <th><CENTER>FECHA REGISTRO</CENTER></th>
                <th><CENTER>VENCIMIENTO</CENTER></th>
                <th><CENTER>EMPLEADO</CENTER></th>
                <th><CENTER>OPCION</CENTER></th>
                </thead>
                <?php foreach($lista as $lis): ?>
                <TR>
                    <td align=center><?php echo e($lis->ci_cliente); ?></td>
                    <td align=center><?php echo e($lis->cliente); ?></td>                
                    <td align=center><?php echo e($lis->nombre); ?></td>
                    <td align=center>Fase <?php echo e($lis->fase); ?></td>
                    <td align=center><?php echo e($lis->manzano); ?></td>
                    <td align=center><?php echo e($lis->nroLote); ?></td>
                    <td align=center><?php echo e($lis->categoria); ?></td>
                    <td align=center><?php echo e($lis->fecha); ?></td>
                    <td align=center><?php echo e($lis->vencimiento); ?></td>
                    <td align=center><?php echo e($lis->empleado); ?></td>
                    <td align=center>
                    <?php echo link_to_route('DevolucionReserva.show', $title = 'DEVOLUCION', $parameters = $lis->idDetalleReserva, $attributes = ['class'=>'btn-sm btn-danger']); ?> 
                    <a class="btn-sm btn-primary" href=<?php echo "VentaReserva/".$lis->idDetalleReserva; ?> >VENDER</a>
                    </td>
                </TR>
                <?php endforeach; ?> 
            </table>
        </div>
    </div>

</div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>