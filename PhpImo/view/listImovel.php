<?php
if(isset($_GET['tipo'])){
  $imoveis = call_user_func(array('ImovelController','listarTipo'),$_GET['tipo']);
}else{
  $imoveis = call_user_func(array('ImovelController','listar'));
}

?>
<div class="container">
  <link rel="stylesheet" href="css/stilo.css">

<h1>Imóveis</h1>
<table class="table" style="top:40px;">
        <tbody>
        <?php
        $cont=0;

        if (isset($imoveis) && !empty($imoveis)) {
          foreach ($imoveis as $imovel) {
            
            if($cont==0){
              echo '<tr>';
            }
            
            echo '<p align="center"><img class="img-thumbnail" style="width: 25%;" 
            src="data:'.$imovel->getFotoTipo().';base64,'.base64_encode($imovel->getFoto()).'"></p><br>';;
            echo substr($imovel->getDescricao(),0,70).'...<br>';
            echo '<strong>Valor: </strong>'.$imovel->getValor().'<br>';
            $tipo = $imovel->getTipo()=='A'?'Aluguel':'Venda';
            echo '<strong>Tipo: </strong>'.$tipo.'<br>';
            echo '<a href="index.php?action=editar&id='.$imovel->getId().'&page=imovel" class="btn btn-primary btn-sm">Editar</a>&nbsp;&nbsp;&nbsp;';
            echo '<a href="index.php?action=excluir&id='.$imovel->getId().'&page=imovel" class="btn btn-danger btn-sm">Excluir</a>&nbsp;&nbsp;&nbsp;';
            echo '<a href="index.php?action=galeria&id='.$imovel->getId().'&page=imovel" class="btn btn-warning btn-sm">Galeria</a>&nbsp;&nbsp;&nbsp;';
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