<?php
    // usuarios
    $usuarios = [
        "Tio carlos" => "carlos123",
        "Berton" => "berton123",
        "Padilha"    => "padilha123"
    ];

    // Criando um array 
    $arrRetorno = [];
    //valores enviados para o POST
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Verificações de segurança e validação
    if (empty($login) || empty($senha)) {
        $arrRetorno['status'] = 'erro';
        $arrRetorno['mensagem'] = 'Login e senha são obrigatórios.';
    } elseif (!isset($usuarios[$login])) {
        $arrRetorno['status'] = 'erro';
        $arrRetorno['mensagem'] = 'Usuário não encontrado.';
    } elseif ($usuarios[$login] !== $senha) {
        $arrRetorno['status'] = 'erro';
        $arrRetorno['mensagem'] = 'Senha incorreta.';
    } else {
        $arrRetorno['status'] = 'sucesso';
        $arrRetorno['mensagem'] = 'Login bem-sucedido.';
        $arrRetorno['usuario'] = $login;
    }

    header("Content-Type: application/json;charset=UTF-8");
    echo json_encode($arrRetorno);
?>
