<?php
require_once 'model/Imovel.php';

class ImovelController{

    public static function salvar($fotoAtual="",$fotoTipo=""){
    
    $imovel = new Imovel;
            $imagem = array();
            if(is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $imagem['data'] =file_get_contents($_FILES['foto']['tmp_name']);
            $imagem['tipo'] = $_FILES['foto']['type'];
            }
            if(!empty($imagem)) {
            $imovel->setfoto($imagem['data']);
            $imovel->setFotoTipo($imagem['tipo']);
        }else{
            $imovel->setfoto($fotoAtual);
            $imovel->setFotoTipo($fotoTipo);
        }
        $imovel->setId($_POST['id']);
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);
    
        $imovel->save();
    }

    public static function listar(){
        $imoveis = new Imovel();
        return $imoveis->listAll();
    }

    public static function editar($id){
        $imovel = new Imovel();

        $imovel = $imovel->find($id);

        return $imovel;
    }

    public static function excluir($id){
        $imovel = new Imovel();
        $imovel = $imovel->remove($id);
    }
    public static function galeria(){

    }
}

?>