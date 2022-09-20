<?php
ob_start();
?>
<div class="container">
    <link rel="stylesheet" href="css/style.css">
        <form name="cadgaleria" id="cadgaleria" action="" method="post" enctype="multipart/form-data">
            <div class="card" style="top:40px">
                <div class="card-header">
                    <span class="card-title">Galeria</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Foto:</label>
                    <input type="file" class="form-control col-sm-8" name="foto" id="foto"/>
                </div>
                <?php
                    if(isset($galeria) && !empty($galeria->getFoto())){
                ?>
                <div class="form-group form-row">
                    <div class="text-center">
                        <img class="img-thumbnail" style="width: 25%;" 
                        src="data:<?php echo $galeria->getFotoTipo();?>;base64,<?php echo base64_encode($galeria->getFoto());?>">
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="card-footer">
                    <input type="hidden" name="idImagens" id="idImagens" value="<?php echo isset($galeria)?$galeria->getIdImagens():''; ?>" />

                    <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
                </div>
            </div>
        </form>
    </div>


<?php


if(isset($_POST['btnSalvar'])){


    if(isset($galeria)){
        call_user_func(array('GaleriaController','salvar'),$galeria->getFoto(),$galeria->getFotoTipo());
    }else{
        call_user_func(array('GaleriaController','salvar'));
    }

    header('Location: index.php?action=listar&page=galeria');
}

ob_end_flush();

?>