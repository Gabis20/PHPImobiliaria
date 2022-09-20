<?php   

    require_once 'Banco.php';
    require_once 'Conexao.php';

    class Galeria extends Banco 
    {
        private $idImovel;
        private $idImagens;
        private $foto;
        private $fotoTipo;

        public function getIdImovel(){
            return $this->idImovel;
        }
    
        public function setIdImovel($idImovel){
            $this->idImovel = $idImovel;
        }
        public function getIdImagens(){
            return $this->idImagens;
        }
    
        public function setIdImagens($idImagens){
            $this->idImagens = $idImagens;
        }
        public function getFoto(){
            return $this->foto;
        }
    
        public function setFoto($foto){
            $this->foto = $foto;
        }
        public function setFotoTipo($fotoTipo){
            $this->fotoTipo = $fotoTipo;
        }
    
        public function getFotoTipo(){
            return $this->fotoTipo;
        }
        public function save()
        {
            $result = false;
            $conexao = new Conexao();

            if ($conn = $conexao->getConection())
            {
                if ($this->idImovel > 0)
                {
                    $query = "UPDATE galeria SET foto = :foto, fotoTipo = :fotoTipo WHERE idImagens = :idImovel";
                    $stmt = $conn->prepare($query);
                    if ($stmt->execute(array(':foto' => $this->foto,
                                             ':fotoTipo' => $this->fotoTipo,
                                             ':idImovel' => $this->idImovel)))
                    {
                        $result = $stmt->rowCount();
                    }
                }
                else
                {
                    $query = "INSERT INTO galeria (foto, fotoTipo, idImovel) VALUES (:foto, :fotoTipo, null)";
                    $stmt = $conn->prepare($query);
                    if ($stmt->execute(array(':foto' => $this->foto,
                                             ':fotoTipo' => $this->fotoTipo)))
                    {
                        $result = $stmt->rowCount();
                    }
                }
            }

            return $result;
        }

        public function remove($idImagens)
        {
            $result = false;
            $conexao = new Conexao();
            $conn = $conexao->getConection();
            $query = "delete from galeria where idImagens = :idImagens";
            $stmt = $conn->prepare($query);

            if ($stmt->execute(array(':idImagens' => $idImagens)))
            {
                if ($stmt->rowCount() > 0)
                {
                    $result = $stmt->fetchObject(Galeria::class);
                }

                else
                {
                    $result = false;
                }
            }

            return $result;
        }

        public function find($idImagens)
        {
            $conexao = new Conexao();
            $conn = $conexao->getConection();
            $query = "SELECT * FROM galeria WHERE idImagens = :idimagens";
            $stmt = $conn->prepare($query);

            if ($stmt->execute(array(':idImagens' => $idGaleria)))
            {
                if ($stmt->rowCount() > 0)
                {
                    $result = $stmt->fetchObject(Galeria::class);
                }
            }

            else
            {
                $result = false;
            }

            return $result;
        }

        public function count()
        {
            
        }

        public function listAll()
        {
            $result = false;
            $conexao = new Conexao();
            $conn = $conexao->getConection();
            $query = "SELECT * FROM galeria";
            $stmt = $conn->prepare($query);
            $result = array();

            if ($stmt->execute())
            {
                while ($rs = $stmt->fetchObject(Galeria::class))
                {
                    $result[] = $rs;
                }
            }

            return $result;
        }
    }
?>