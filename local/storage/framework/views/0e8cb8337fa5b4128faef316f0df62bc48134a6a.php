<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">   
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">CATEGORIAS</font>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo URL::to('Categoria/create'); ?>">REGISTRAR</a> 
            </div>
        </div>    
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>CATEGORIA</CENTER></th>
                <th><CENTER>DESCRIPCION</CENTER></th>
                <th><CENTER>PRECIO</CENTER></th>
                <th><CENTER>PROYECTO</CENTER></th>
                <th><CENTER>OPCION</CENTER></th>
                </thead>
                <?php foreach($categoria as $cli): ?>
                <TR>
                <td><CENTER><?php echo e($cli->categoria); ?></CENTER></td>
                <td><CENTER><?php echo e($cli->descripcion); ?></CENTER></td>
                <?php


                $precio=DB::select("SELECT *from preciocategoria WHERE deleted_at IS NULL and preciocategoria.idCategoria=".$cli->id." ORDER BY preciocategoria.fecha DESC LIMIT 1");
                if(count($precio) !=0)
                {
                    echo"<td><CENTER>{$precio[0]->precio}</CENTER></td>";
                }
                
                else
                {  echo"<td><CENTER>00.00</CENTER></td>"; }
                ?>
                <td><CENTER><?php echo e($cli->nombre); ?></CENTER></td>                
                <td><CENTER>
                <?php echo link_to_route('Categoria.edit', $title = 'ACTUALIZAR', $parameters = $cli->id, $attributes = ['class'=>'btn btn-primary']); ?> 
                </CENTER></td>
                </TR>
                <?php endforeach; ?> 
            </table>
            <?php echo $categoria->render(); ?>

        </div>
    </div>
</div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>