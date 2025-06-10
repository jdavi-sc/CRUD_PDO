<?php

    require_once 'Conexao.php'; //conecta no banco

    $email = $_POST['emailFormulario'];

    if(!empty($email)) {
        
        $sql = "DELETE FROM usuarios WHERE email = :email";
        
        //preparar a remoção
        $requisicao = $conexao->prepare($sql);
        
        //Vamos pegar o email digitado no form e passar por parametro
        //isso fara que a consulta na variavel $sql, use o e-mail que 
        //usuario digitou, o bindParam serve para evirar SQLInjection.
        //é uma protecao da aplicacao no banco de dados;
        $requisicao->bindParam(':email', $email);
        
        try {
            $requisicao->execute();
            if ($requisicao->rowCount() > 0) {
                echo "Usuário removido com sucesso!";
            } else {
                echo "Usuário não existe!";
            }
        } catch(PDOException $e){
            echo "Erro ao remover o usuário: " . $e->getMessage();
        }

    } else {
        echo"Digite um e-mail para remover algum usuário! <br>";
    }

?>