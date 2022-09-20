<main>
    <h1>Editar Imóvel</h1>
    <hr>
    <div>
        <table class="tableGeral">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Link Foto</th>
                    <th>Foto</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $imoveis = call_user_func(array($imovelController, 'encontrar'), $_POST['id']);
                if (isset($imoveis)) {
                    foreach ($imoveis as $imovel) {
                ?>
                        <form method="post">
                            <tr>

                                <input type="hidden" name="id" value="<?php echo $imovel->getId(); ?>">
                                <td><input type="text" name="descricao" value="<?php echo $imovel->getDescricao(); ?>"></td>
                                <td><input type="text" name="foto" value="<?php echo $imovel->getFoto(); ?>"></td>
                                <td><img class="fotoCasa" src="<?php echo $imovel->getFoto(); ?>"></td>
                                <td><input type="text" name="valor" value="<?php echo $imovel->getValor(); ?>"></td>
                                <td><input type="radio" name="tipo" id="tipo" value="A">Alugar<br />
                                    <input type="radio" name="tipo" id="tipo" value="V">Venda
                                </td>
                            </tr>

                    <?php
                    }
                }
                    ?>
            </tbody>
        </table>
    </div>
    <div class=" botao">
        <button name="pagina" value="inicio" class="buttonLink">Início</button>
        <button class="buttonLink" name="acao" value="editarImovel">Salvar</button>
        <button name="pagina" value="listImoveis" class="buttonLink">Listar Imóveis</button>
    </div>
    </form>
</main>
</body>

</html>