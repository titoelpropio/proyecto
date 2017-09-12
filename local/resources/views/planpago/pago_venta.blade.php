@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.success')
@include('planpago.DetalleCuota')
@include('alerts.cargando')
<section class="content-header">
    <h1>
        GESTION DE COBRANZA
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">VENTAS</a></li>
        <li class="active">GESTION DE COBRANZA</li>
    </ol>
</section>

<div class="col-md-12">
    <div class="box box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">

            </div>
        </div>
<div class="box-body">
<div class="row">
{!! Form::open(['route' => 'PagoVenta/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
            <div class="pull-right">
                <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>        
            <div class="pull-right"><B>CARNET:</B> <input type="text" name="ci" class="form-control" onkeypress="return bloqueo_de_punto(event)"></div>
        </div>    
    </div>
{!!Form::close()!!}

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <th><CENTER>DATOS DEL CLIENTE</CENTER></th>
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
                @foreach ($lista as $lis)

                <tbody id="idTbody">
                                <?php
                                 
                                    echo '<td>'.$lis->cliente;

                                 ?>

               
                                
               
                    <!--td align=center>{{$lis->precio}}</td-->
                    <!--td align=center>{{$lis->ci_empleado}}</td>
                    <td align=center>{{$lis->empleado}}</td-->
                   
                               

                    </td>                             
                </TR>
                @endforeach 
            </table>
        </div>
    </div>

</div>
       </div><!-- /.row -->
    </div><!-- /.box-body -->
</div>
{!!Html::script('js/cuotas.js')!!}

    @endsection