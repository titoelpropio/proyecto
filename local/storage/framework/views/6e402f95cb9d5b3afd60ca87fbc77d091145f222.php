<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>REPORTE DE RESERVAS</title>
</head>

<body>

  <img src="<?php echo e(asset('images/logo.png')); ?>" width="150px" height="100px" style="float: right;">
  <table>
    <tr>
      <td align="center"> <font size="6">REPORTE DE VENTAS DEL</font> <br>
      <font size="6" color="red"> <?php echo e($fecha_inicio_aux[0]->fecha); ?> </font> <font size="6"> AL </font> <font size="6" color="red"> <?php echo e($fecha_fin_aux[0]->fecha); ?> </font></td>
    </tr> 
  </table>
<br><br>
  <table border="1" style="border-radius: 10px;">
    <thead>
    <tr style="background: #CEF6F5;">
      <th><center>VENDEDOR</center></th>
      <th><center>PROYECTO</center></th>
      <th><center>CLIENTE</center></th>
      <th><center>REGISTRO</center></th>
      <th><center>VENTA</center></th>          
    </tr>
    </thead>
    <tbody align="center">
      <?php foreach($lista as $list): ?>
      <tr>
        <td align="left"><?php echo e($list->empleado); ?> <br>
        <b>CI:</b> <?php echo e($list->ci_empleado); ?></td>
        <td align="left"><?php echo e($list->nombre); ?> <br>
        Fase <?php echo e($list->fase); ?> <br>
        Categoria: <?php echo e($list->categoria); ?><br>
        Manzano: <?php echo e($list->manzano); ?><br>
        Lote: <?php echo e($list->nroLote); ?></td>
        <td align="left"><?php echo e($list->cliente); ?> <br>
        <b>CI:</b> <?php echo e($list->ci_cliente); ?></td>
        <td><?php echo e($list->fecha); ?></td>
      <?php 
      switch ($list->estado) {
          case 'c':
              echo "<td>PLAZO</td>";                
              break;
          case 'p':
              echo "<td>CONTADO</td>";                                 
              break;
      }         
      ?>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
