
<?php $__env->startSection('contenido'); ?>
<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('alerts.cargando', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('pre_reserva.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
<?php echo Form::open(['route' => 'ListaPreReserva', 'method' => 'post', 'novalidate', 'class' => 'form-inline']); ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">LISTA DE PRE RESERVAS</font>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
            <div class="pull-right">
                <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>        
            <?php $fecha=DB::select("SELECT curdate()as fecha"); ?>
            <div class="pull-right"><input type="date" name="fecha_inicio" value="<?php echo e($fecha[0]->fecha); ?>" class="form-control"></div>
        </div>    
    </div>
<?php echo Form::close(); ?>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead style="text-align: center">
                <th><CENTER>URBANIZACION</CENTER></th>
                <th><CENTER>FASE</CENTER></th>
                <th><CENTER>MANZANO</CENTER></th>
                <th><CENTER>LOTE</CENTER></th>

                <th><CENTER>DATOS DEL CLIENTE</CENTER></th>
                <th><CENTER>REGISTRO</CENTER></th>
                <th><CENTER>VENCIMIENTO</CENTER></th>
                <th><CENTER>EMPLEADO</CENTER></th>
                <th><center>OPCION</center></th>
                </thead>
                <?php foreach($lista as $lis): ?>
                <TR>
                    <td align=center><?php echo e($lis->nombre); ?></td>
                    <td align=center><?php echo e($lis->fase); ?></td>
                    <td align=center><?php echo e($lis->manzano); ?></td>
                    <td align=center><?php echo e($lis->nroLote); ?></td>

                    <td ><span style="font-weight: bold">NOMBRE: </span><?php echo e($lis->cliente); ?>. <br><span style="font-weight: bold">CI: </span><?php echo e($lis->ci_cliente); ?> <?php echo e($lis->expedido); ?>.</td>
                    <td align=center><?php echo e($lis->fecha); ?></td>
                    <td align=center><?php echo e($lis->vencimiento); ?>:00</td>
                    <td align=center><?php echo e($lis->empleado); ?></td>
                    <td><a class="btn btn-primary" href=<?php echo "VentaPreReserva/".$lis->idDetalle; ?>>Vender</a>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalReserva" onclick="cargarDatos(<?php echo e($lis->idDetalle); ?>,<?php echo e($lis->idCliente); ?>,<?php echo e($lis->idLote); ?>)">Reservar</button></td>
                </TR>
                <?php endforeach; ?> 
            </table>
        </div>
    </div>

</div>
 <script type="text/javascript">
$(document).ready(function(){
    $('#loading').css('display','none');      

});

$("#tipoPago").change(function(event){    
    $('#loading').css('display','block');
    switch($("#tipoPago").val()) {
        case 'e':
            $('select[name=banco]').empty();
            $('select[name=cuenta]').empty();
            $('input[name=nroDocumento]').val("");        
            $('input[name=monto]').val("");         
            $('input[name=montoBanco]').val("");         
            $('#divEfectivo').css('display','block');             
            $('#divBanco').css('display','none'); 
            $('#loading').css('display','none');
            break;
        case 'b':
            $('#divBanco').css('display','block'); 
            $('#divEfectivo').css('display','none');             
            $('select[name=banco]').empty();
            $('select[name=cuenta]').empty();
            $('input[name=nroDocumento]').val("");  
            $('input[name=monto]').val("");         
            $('input[name=montoBanco]').val("");         
            $.get('cargarBanco',function(res){
                $('select[name=banco]').append('<option value=0> Seleccione Un Banco') ;
                for (var i = 0; i < res.length; i++) {
                   $('select[name=banco]').append('<option value='+res[i].id+'>'+res[i].nombre) ;
                }
                $('#loading').css('display','none');      
            });            
            break;
        case 'be':
            $('select[name=banco]').empty();
            $('select[name=cuenta]').empty();
            $('input[name=nroDocumento]').val("");         
            $('input[name=monto]').val("");         
            $('input[name=montoBanco]').val("");         
            $('#divEfectivo').css('display','block');             
            $('#divBanco').css('display','block');                         
            $.get('cargarBanco',function(res){
                $('select[name=banco]').append('<option value=0> Seleccione Un Banco') ;
                for (var i = 0; i < res.length; i++) {
                   $('select[name=banco]').append('<option value='+res[i].id+'>'+res[i].nombre) ;
                }
                $('#loading').css('display','none');      
            });
            break;                       
    }        
});   


function cargarCuenta(select){
    $('#loading').css('display','block');      
    idBanco=$(select).val();
    $('#cuenta').empty();
    $('#cuenta').append('<option value=0> Seleccione Una Cuenta');    
    $.get('cargarCuenta/'+idBanco,function(res){
        for (var i = 0; i < res.length; i++) {
           $('#cuenta').append('<option value='+res[i].id+'>'+res[i]. nroCuenta) ;
        }
    $('#loading').css('display','none');      
    });
}

function validar(){
    switch($("#tipoPago").val()) {
    case 'e':
        if ($('input[name=monto]').val() < 50) { toastr.error("EL MONTO EFECTIVO TIENE QUE SER MAYOR A 50 $U$"); return false; } 
        else {
            if ($('input[name=monto]').val() == "") { toastr.error('El campo Monto no debe estar vacio'); return false; }
            else{toastr.success('GUARDADO CORRECTAMENTE'); return true; }
        }
        break;
    case 'b':
        if ($('input[name=montoBanco]').val() < 50) { toastr.error("EL MONTO BANCO TIENE QUE SER MAYOR A 50 $U$"); return false; } 
        else {     
            if ($('input[name=montoBanco]').val() == "" || $('select[name=banco]').val() == 0 || $('select[name=cuenta]').val() == 0 || $('input[name=nroDocumento]').val() == "") {
                if ($('input[name=montoBanco]').val()=="") { toastr.error('El campo Monto Banco no debe estar vacio'); }                           
                if ($('input[name=nroDocumento]').val()=="") { toastr.error('El campo Nro de Documento no debe estar vacio'); }  
                if ($('select[name=banco]').val()==0) { toastr.error('No Selecciono un Banco'); }                      
                if ($('select[name=cuenta]').val()==0) { toastr.error('No Selecciono una Cuenta'); }                                        
                return false; 
            }else{toastr.success('GUARDADO CORRECTAMENTE'); return true; }
        }   
        break;
    case 'be':
        montoTotal = parseFloat($('input[name=montoBanco]').val()) + parseFloat($('input[name=monto]').val());
        if (montoTotal < 50) { toastr.error("EL MONTO TIENE QUE SER MAYOR A 50 $U$"); return false; } 
        else {     
            if ($('input[name=monto]').val() == "" || $('input[name=montoBanco]').val() == "" || $('select[name=banco]').val() == 0 || $('select[name=cuenta]').val() == 0 || $('input[name=nroDocumento]').val() == "") {
                if ($('input[name=montoBanco]').val()=="") { toastr.error('El campo Monto Banco no debe estar vacio'); }
                if ($('input[name=monto]').val()=="") { toastr.error('El campo Monto Efectivo no debe estar vacio'); }
                if ($('input[name=nroDocumento]').val()=="") { toastr.error('El campo Nro de Documento no debe estar vacio'); }  
                if ($('select[name=banco]').val()==0) { toastr.error('No Selecciono un Banco'); }                      
                if ($('select[name=cuenta]').val()==0) { toastr.error('No Selecciono una Cuenta'); }                                        
                return false; 
            }else{toastr.success('GUARDADO CORRECTAMENTE'); return true; }
        }   
        break;                      
    }
}

function cargarDatos(idPreReserva,idCliente,idLote){
$('input[name=idCliente]').val(idCliente);
$('input[name=idPreReserva]').val(idPreReserva);
$('input[name=idLote]').val(idLote);
$('input[name=monto]').val("");
$('input[name=nroDocumento]').val("");


}
 </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>