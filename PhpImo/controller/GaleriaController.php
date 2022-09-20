<?php
    require_once 'model/Galeria.php';

    class GaleriaController
    {
        public static function salvar($fotoAtual="", $fotoTipo="")
        {
            $galeria = new Galeria();
            $imagem = array();
            if (is_uploaded_file($_FILES['foto']['tmp_name']))
            {
                $imagem['data'] = file_get_contents($_FILES['foto']['tmp_name']);
                $imagem['tipo'] = $_FILES['foto']['type'];
            }

            if (!empty($imagem))
            {
                $galeria->setFoto($imagem['data']);
                $galeria->setFotoTipo($imagem['tipo']);
            }
            else
            {
                $galeria->setFoto($fotoAtual);
                $galeria->setFotoTipo($fotoTipo);
            }
        $galeria->setIdImagens($_POST['idImagens']);

        $galeria->save();
        }

        public static function listar()
        {
            $galerias = new Galeria();
            return $galerias->listAll();
        }

        public static function excluir($idImagens)
        {
            $galeria = new Galeria();
            $galeria = $galeria->remove($idImagens);
        }
        public static function galeria(){

        }
    }
?>