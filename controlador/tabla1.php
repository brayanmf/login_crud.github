<?php 
require_once './modelo/user.php';

$usuarios=new Usuario;
$a=$usuarios->getdataU();

$count=0;
?>
<tbody> <?php 
foreach($a as $fila){$count++; ?>


<tr>
<td ><?php echo $count;?></td>
<td ><?php echo $fila['usuario']; ?></td>
<td ><?php echo $fila['rol']; ?></td>
<td>    <a href="editar.php?editar&id=<?php echo $fila["id"] ?>"class="a">editar<i class="fas fa-trash-alt"></i></a>  
  <a href="panel.php?id=<?php echo $fila["id"] ?>" class="a" style="margin-left:5px">borrar<i class="fas fa-edit"></i></a></td>

  </tr>
<?php
}?>
 
</tbody>  
</table>

