<?php
session_start();  // quero iniciar ou continuar para ler o gravar dados dela 
require_once '../connect_db/database.php';
 $erros=[]; // array para armazenar os erros
 $sucesso=false;
 echo ($_SERVER['REQUEST_METHOD']);


if($_SERVER['REQUEST_METHOD'] === 'POST'){

     //  pegar dados do metodo post
    $nome = trim($_POST['nome'] ?? '');
    $email= trim($_POST['email' ?? '']);
    $senha = trim($_POST['senha'] ?? '');
    $confirmar_senha = trim($_POST['confirmar_senha'] ?? '');

    // fazer validações 
    if(empty($nome)){
        $erros[] = 'O campo nome deve ser preenchido';
    }

    if(empty($email)){
        $erros[] = 'O campo email deve ser preenchido';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erros[] = 'O campo email deve ser um email valido';
    }

    if(empty($senha || strlen($senha) < 8)){
        $erros[] = 'O campo senha deve ser preenchido';
    }
    if($senha !== $confirmar_senha){
        $erros[] = 'As senhas nao conferem';
    }

    // verificar so o email existe no banco de dados 
    if(empty($erros)){
        $checkEmail_db= $db_connection->prepare('SELECT email FROM usuarios WHERE email = :email');
        $checkEmail_db->bindValue(':email', $email);
        $checkEmail_db->execute();

        if($checkEmail_db->fetch()){
            $erros[] = 'O email ja esta cadastrado';
        }
    }

        //  gravar os dados no banco de dados 

        if(empty($erros)){
            $senha_hash= password_hash($senha, PASSWORD_DEFAULT);

            $insertInto_db= $db_connection->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
            $insertInto_db->bindValue(':nome', $nome);
            $insertInto_db->bindValue(':email', $email);
            $insertInto_db->bindValue(':senha', $senha_hash);
            $insertInto_db->execute();

            $sucesso=true;
        }
    }

   



?>