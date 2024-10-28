<?php
if(isset($_POST['submit']))
{
    //Teste de Informações
    // print('Nome: '. $_POST['name']);
    // print('<br>');
    // print('Email: '. $_POST['email']);
    // print('<br>');
    // print('Senha : ' . $_POST['password']);

    include_once('config.php');

    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, senha) 
    VALUES ('$nome',  '$email',  '$senha')");

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro MyCaps</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #8B5E3C;
            color: white;
            text-align: center;
        }
        form {
            margin-top: 20px;
            padding: 20px;
        }
        input {
            display: block;
            margin: 10px auto;
            padding: 10px;
            width: 80%;
            max-width: 400px;
        }
        button {
            padding: 10px 20px;
            background-color: #77B28C;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
        }
        table {
            width: 80%;
            margin: 20px auto;
            color: white;
        }
        td, th {
            padding: 10px;
        }
        .delete-btn {
            color: red;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <form action="cadastro.php" method="POST" id="userForm">
        <h2>Se inscreva agora para acessar todo o conteúdo!</h2>
        <input type="text" name="name" id="name" placeholder="Nome" required>
        <input type="email" name="email" id="email" placeholder="E-mail" required>
        <input type="password" name="password" id="password" placeholder="Senha" required>
        <button type="submit" name="submit">Registrar</button>
    </form>

    <h2>Lista de Usuários</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="userList"></tbody>
    </table>

    <script src="app.js"></script>
</body>
</html>
