<div class="container">
<link rel="stylesheet" href="css/stilo.css">
<h1>Usuários</h1>
<hr>
<table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Login</th>
                <th>Permissão</th>
                <th><a href="index.php?page=usuario">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'controller/UsuarioController.php';
           
            $usuarios = call_user_func(array('UsuarioController','listar'));
        
            if (isset($usuarios) && !empty($usuarios)) {
                foreach ($usuarios as $usuario) {
                    ?>
                    <tr>
                    
                        <td><?php echo $usuario->getLogin(); ?></td>
                        <td><?php echo $usuario->getPermissao();?></td>
                        <td>
                            <a href="index.php?action=editar&id=<?php echo $usuario->getId();?>&page=usuario" class="btn btn-primary btn-sm">Editar</a>
                            <a href="index.php?action=excluir&id=<?php echo $usuario->getId();?>&page=usuario" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>