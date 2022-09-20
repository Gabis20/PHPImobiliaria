<?php
if(isset($_GET['tipo'])){
  $galerias = call_user_func(array('GaleriaController','listarTipo'),$_GET['tipo']);
}else{
  $galerias = call_user_func(array('GaleriaController','listar'));
}

?>
<div class="container">
  <link rel="stylesheet" href="css/stilo.css">

<h1>Galeria</h1>
<table class="table" style="top:40px;">
        <tbody>
        <?php
        $cont=0;

        if (isset($galerias) && !empty($galerias)) {
          foreach ($galerias as $galeria) {
            
            if($cont==0){
              echo '<tr>';
            }
            
            echo '<p align="center"><img class="img-thumbnail" style="width: 25%;" 
            src="data:'.$galeria->getFotoTipo().';base64,'.base64_encode($galeria->getFoto()).'"></p><br>';;
            echo '<a href="index.php?action=excluir&id='.$galeria->getIdImagens().'&page=galeria" class="btn btn-danger btn-sm">Excluir</a>&nbsp;&nbsp;&nbsp;';
            $cont++;
            if($cont==4)
              $cont=0;

          }
        }else{
            ?>
                <tr>
                    Nenhum registro encontrado
                </tr>
                <?php
        }
?>
        </tbody>
</table>
</div>