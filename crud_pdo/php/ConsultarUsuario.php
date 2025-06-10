<?php

    require_once "Conexao.php";

    $emailDoUsuario = $_POST['emailFormulario'];

    if (!empty($emailDoUsuario)) {

        $sql = "SELECT * FROM usuarios WHERE email = :email";

        $requisicao = $conexao->prepare($sql);

        $requisicao->bindParam(':email', $email);

        try {
            $requisicao->execute();
            //fetch
            //Especificar como queremos o retorno da consulta no banco de dados
            //FETCH_ASSOC indica que queremos retornar um array indexado
            $usuario = $requisicao->fetch(PDO::FETCH_ASSOC);
            
            if ($usuario) {
                echo "Nome: " . $usuario['nomeFormulario'] . "<br>";
                echo "Email: " . $email['emailFormulario'] . "<br>";
            } else {
                echo "Usuário não encontrado ou não existe";
            }

        } catch(PDOException $e) {
            echo 'Erro ao consultar: ' . $e->getMessage();
        }
    } else { 
        echo "Digite um e-mail para realizar a consulta";
    }

?>