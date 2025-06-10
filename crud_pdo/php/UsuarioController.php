<?php

    $requisicao = $_POST['requisicao'];

    switch ($requisicao) {
        
        case 'Atualizar';
            include 'AtualizarUsuario.php';
            break;

        case 'Cadastrar';
            include 'CadastroUsuario.php';
            break;

        case 'Consultar';
            include 'ConsultarUsuario.php';
            break;

        case 'Remover';
            include 'RemoverUsuario.php';
            break;

        default:
            echo 'Ação inválida, por gentileza selecionar uma opção válida';
            break;
    }

?>