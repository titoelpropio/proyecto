
<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.cargando', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('planpago.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row"> 
<?php echo Form::open(['route'=>'Pago.store', 'method'=>'POST','onKeypress'=>'if(event.keyCode == 13) event.returnValue = false;', 'onsubmit'=>'javascript: return Validar_Plan_Pago()' ]); ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="panel panel-success">
            <div class="panel-heading"><b>PLAN DE PAGO</b></div>        
                <div class="panel-body">    
                    <div class="form-group">
                        <?php echo Form::label('tipoPago','Tipo De Pago:'); ?>

                        <?php echo Form::select('tipoPago', array('e'=>'EFECTIVO', 'b'=>'BANCO', 'be'=>'BANCO - EFECTIVO'),null,array('class'=>'form-control')); ?>

                    </div> 

                    <div class="form-group" id="div_montoEfectivo" style="display:block">
                        <?php echo Form::label('monto','Monto En Efectivo:'); ?>

                        <?php echo Form::text('monto',null,['class'=>'form-control','placeholder'=>'Monto En Efectivo','onkeypress'=>'return numerosmasdecimal(event)']); ?>

                    </div>                     

                    <div class="form-group" id="div_banco" style="display:none">
                        <?php echo Form::label('banco','Seleccione Un Banco:'); ?>

                        <select onchange=cargarCuenta(this) name="banco" class="form-control" id="banco"></select>
                    </div> 

                    <div class="form-group" id="div_cuenta" style="display:none">
                        <?php echo Form::label('cuenta','Seleccione Una Cuenta:'); ?>

                        <select  name="cuenta" class="form-control" id="cuenta"></select>                    
                    </div> 

                    <div class="form-group" id="div_nroDoc" style="display:none">
                        <?php echo Form::label('nroDocumento','Nro De Documento:'); ?>

                        <?php echo Form::number('nroDocumento',null,['class'=>'form-control ','placeholder'=>'Nro De Documento','onkeypress'=>'return bloqueo_de_punto(event)']); ?>                                     
                    </div>   

                    <div class="form-group" id="div_montoBanco" style="display:none">
                        <?php echo Form::label('montoBanco','Monto En Banco:'); ?>

                        <?php echo Form::number('montoBanco',null,['class'=>'form-control ','placeholder'=>'Monto En Banco','onkeypress'=>'return bloqueo_de_punto(event)']); ?>                                     
                    </div>  

                    <div class="form-group" id="div_fecha" style="display:none">
                        <?php echo Form::label('fecha','Fecha:'); ?>

                        <?php echo Form::date('fecha',null,['class'=>'form-control']); ?>                                     
                    </div>  
            
                    <?php foreach($debe as $deb): ?>
                        <input type="hidden" name="idVenta" value="<?php echo e($deb->idVenta); ?>">  <?php break; ?>
                    <?php endforeach; ?>                                 
                </div>
            </div>          
        </div>

        <?php /*<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_pago_banco" style="display:none">
          <div class="panel panel-success">
            <div class="panel-heading"><b>BANCO</b></div>        
                <div class="panel-body">    
                 
                    <div class="form-group" id="div_banco" style="display:none">
                        {!!Form::label('banco','Seleccione Un Banco:')!!}
                        <select onchange=cargarCuenta(this) name="banco" class="form-control" id="banco"></select>
                    </div> 

                    <div class="form-group" id="div_cuenta" style="display:none">
                        {!!Form::label('cuenta','Seleccione Un Cuenta:')!!}
                        <select  name="cuenta" class="form-control" id="cuenta"></select>                    
                    </div> 

                    <div class="form-group" id="div_nroDoc" style="display:none">
                        {!!Form::label('nroDocumento','Nro De Documento:')!!}
                        {!!Form::number('nroDocumento',null,['class'=>'form-control ','placeholder'=>'Nro de Documento','onkeypress'=>'return bloqueo_de_punto(event)'])!!}                                     
                    </div>              
             
                </div>
            </div>          
        </div>*/ ?>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="panel panel-success">
            <div class="panel-heading"><b>CONTROL</b></div>        
                <div class="panel-body">  

                    <!--table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th><CENTER>MONTO DEBE</CENTER></th>
                            <th><CENTER>COUTA</CENTER></th>
                        </thead>
                        <TR>
                        <?php foreach($monto_cuota as $pag): ?>
                            <td align="center"><?php echo e($pag->monto_cuota); ?></td>
                        <?php endforeach; ?> 
                        <?php foreach($mora as $mor): ?>
                            <td align="center"><?php echo e($mor->contador+1); ?> Cuota</td>
                        <?php endforeach; ?> 
                        </TR>
                    </table-->

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th><CENTER>MONTO TOTAL</CENTER></th>
                            <th><CENTER>CUOTA</CENTER></th>
                        </thead>
                        <TR>
                        <?php foreach($monto_pagar as $pag): ?>
                            <td align="center"><b><font size="4"><?php echo e($pag->cuota); ?></font> $u$</b></td>
                        <?php endforeach; ?> 
                        <?php foreach($cantidad as $pag): ?>
                            <td align="center"><font size="4"><b><?php echo e($pag->contador); ?> Cuota</b></font></td>
                        <?php endforeach; ?> 
                        </TR>
                    </table>                
                </div>
            </div>          
        </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
      <div class="panel panel-success">
        <div class="panel-heading">
            <b>CABIO DE MONEDA</b>
            <div class="pull-right"><button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#ModalMoneda"><i class="fa fa-usd" aria-hidden="true"></i></button></div>
        </div>        
            <div class="panel-body">    
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th><center>VENTA $u$</center></th>
                        <th><center>COMPRA $u$</center></th>
                    </thead>
                    <?php $moneda=DB::select("SELECT *from tipocambio WHERE tipocambio.deleted_at IS NULL"); ?>
                    <tbody align="center">
                        <tr>
                            <td><b><font id='venta' size="3"><?php echo e($moneda[0]->monedaVenta); ?></font> Bs.</b></td>
                            <td><b><font id='compra' size="3"><?php echo e($moneda[0]->monedaCompra); ?></font> Bs. </b><input type="hidden" name="compra_aux"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                            <div class="form-group">
                                <?php echo Form::label('boliviano','Monto Boliviano:'); ?>

                                <?php echo Form::number('boliviano',null,['class'=>'form-control ','placeholder'=>'Monto Boliviano','onkeypress'=>'return numerosmasdecimal(event)','onchange'=>'CalcularMoneda()']); ?>                                                             
                            </div>                                     
                            </td>
                            <td>
                            <div class="form-group">
                                <?php echo Form::label('dolar','Monto Dolar:'); ?>

                                <?php echo Form::text('dolar',null,['class'=>'form-control ','placeholder'=>'Monto Dolar','onkeypress'=>'return numerosmasdecimal(event)','readonly']); ?>                                                             
                            </div>                                     
                            </td>                                
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>          
    </div>

        </div>
    </div>



    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div align="right">
            <?php echo Form::submit('PAGAR',['class'=>'btn btn-primary','id'=>'btn_registrar','onclick'=>'btn_esconder()']); ?>  <br><br>                           
        </div>         
    </div>               

<?php $cont=0; ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">      
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">      
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <!--th><CENTER>ID</CENTER></th-->
                <th><CENTER>FECHA</CENTER></th>
                <th><CENTER>DEBE</CENTER></th>
                <th><CENTER>MORA</CENTER></th>
                <!--th><CENTER>ID VENTA</CENTER></th-->
                <th><CENTER>ESTADO</CENTER></th>
                </thead>
                <?php foreach($debe as $deb): ?>

                <?php if ($deb->mora == 1): ?>
                <TR style="background: #F5A9BC">
                <?php else: ?>
                <TR style="background: #E6F8E0">                    
                <?php endif ?>
                
                <!--td><CENTER><?php echo e($deb->id); ?></CENTER></td-->
                <td><CENTER><?php echo e($deb->fechaPago); ?></CENTER></td>

                <?php if ($cont==0) {
                    if ($ultimo[0]->contador == 1) {
                        echo "<td><CENTER>".$monto_pagar[0]->cuota."</CENTER></td>";                                                       
                    } else {
                        if ($monto_cuota[0]->monto_cuota > 0) {
                            echo "<td><CENTER>".$monto_cuota[0]->monto_cuota."</CENTER></td>";                             
                        }else{
                            echo "<td><CENTER>".$deb->cuota."</CENTER></td>";                               
                        }                          
                    }
                    $cont++;                                           
                } else {
                    echo "<td><CENTER>".$deb->cuota." </CENTER></td>";
                }
                 ?>

                <!--td><CENTER><?php echo e($deb->cuota); ?></CENTER></td-->
                <td><CENTER><?php echo e($deb->mora); ?></CENTER></td>
                <!--td><CENTER><?php echo e($deb->idVenta); ?></CENTER></td-->
                <td><CENTER><?php echo e($deb->estado); ?></CENTER></td>
                </TR>
                <?php endforeach; ?> 
            </table>
        </div>  
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">      
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <!--th><CENTER>ID</CENTER></th-->
                <th><CENTER>FECHA</CENTER></th>
                <th><CENTER>PAGADO</CENTER></th>
                <th><CENTER>MORA</CENTER></th>
                <!--th><CENTER>ID VENTA</CENTER></th-->
                <th><CENTER>ESTADO</CENTER></th>
                </thead>
                <?php foreach($pago as $pag): ?>
                <TR>
                <!--td><CENTER><?php echo e($pag->id); ?></CENTER></td-->
                <td><CENTER><?php echo e($pag->fechaPago); ?></CENTER></td>                
                <td><CENTER><?php echo e($pag->cuota); ?></CENTER></td>
                <td><CENTER><?php echo e($pag->mora); ?></CENTER></td>
                <!--td><CENTER><?php echo e($pag->idVenta); ?></CENTER></td-->
                <td><CENTER><?php echo e($pag->estado); ?></CENTER></td>
                </TR>
                <?php endforeach; ?> 
            </table>
        </div>            
    </div>    
<?php echo Form::close(); ?>

</div>
<?php echo Html::script('js/plan_pago.js'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>