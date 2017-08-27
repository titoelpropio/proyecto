<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php echo Html::script('js/mapas.js'); ?>


<div class="panel panel-success">
     <div class="panel-heading">
          <ul class="nav nav-pills">
            
        
       <li onclick="cambiomapa(3)" class=" pull-right"><a href="#">FASE 3</a></li>
            <li onclick="cambiomapa(2)" class=" pull-right"><a href="#">FASE 2</a></li>
              <li  onclick="cambiomapa(4)"class=" pull-right"><a href="#">FASE 1-B</a></li>
               
            <li  onclick="cambiomapa(1)"class=" pull-right"><a href="#">FASE 1</a></li>
  <input type="hidden" value="<?php echo URL::to('seccion2/2'); ?>" id="mapa2">
  <input type="hidden" value="<?php echo URL::to('seccion3/2'); ?>" id="mapa3">
  <input type="hidden" value="<?php echo URL::to('seccion1b/2'); ?>" id="mapa1b">

  <input type="hidden" value="<?php echo URL::to('seccion1/2'); ?>" id="mapa1">
        </ul>
        
    </div>  
  <div class="panel-body">
                     

                     
      <iframe id="seccion" style="border: none; height: 800px ; overflow: none;width: 100%" src="http://104.198.231.176/seccion1/1">
                         
                     </iframe>
                     
</div>
  <div class="panel-footer">Pie del panel</div>
</div>

<!--
<div id="caja" style="    min-width: 189px;
     max-height: 128px;
     " >
    <span>Detalle</span>
    <div style="text-align: right;"><a id="active">x</a></div>
    <span style="color: white">
        LOTE NRO: <span style="color: yellow">  1058</span>
    </span> <br>
        <span style="color: white">
            DIMENSION: <span style="color: yellow"> 300x300 mt2</span>
        </span> <br>
            <span style="color: white">
                PRECIO CONTADO: <span style="color: yellow"> 2000$</span>
            </span> <br>
                <span style="color: white">
                    PRECIO CREDITO: <span style="color: yellow"> 3000$</span>
                </span> <br>


                    </div>-->

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>