<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        nav{
            background-color: blue;
            padding-bottom: 100px;
        }
        nav span{
            display: inline-block;
        }
        img{
            float: right;
            max-width: 100px;
            max-height: 100px;
        }
        #lista{
            background-color: grey;
            float: left;
            padding-bottom: 100%;
        }
    </style>
</head>
<body>
    <?php
    require_once "auth.php";
    ?>
    <nav><span><a href="index.php">home</a></span><span><?php echo $usuario ?></span><span><a href="destroy.php">Sair</a></span><span><?php echo "Sua permissão é $perm"?></span><img src=<?php echo "$foto" ?> alt=""></nav>
    <div id="lista">
        <ul>
            <li><a href="prod.php">Cadastrar produto</a></li>
            <li><a href="usuario.php">Cadastrar usuario</a></li>
            <li><a href="prodlista.php">Ver lista de produtos</a></li>
            <li><a href="usuariolista.php">Ver lista de usuarios</a></li>
            <li><a href="apagarproduto.php">Apagar produtos</a></li>
            <li><a href="apagarusuario.php">Apagar usuarios</a></li>
        </ul>
    </div>
    <div>
    <?php
    include_once("conexao.php");

    $nome = $_POST["nomeusuario"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $perms = $_POST["perm"];

    if(mb_strlen($nome)<1 || mb_strlen($senha)<1){
        echo "INSIRA OS DADOS CORRETAMENTE<br>";

    }elseif($perm!=1){
        echo "VOCÊ NÃO TEM PERMISSÃO PARA CADASTRAR PESSOAS";
    }else{

    $resultado_usuario = "INSERT INTO usuario (Username,email,Password,Permissao) VALUES ('$nome','$email','$senha','$perms')";
    $resultado_usuario = mysqli_query($conn, $resultado_usuario);

    echo "PESSOA CADASTRADA";
    }
    ?>
    <div><a href="usuario.php">RETORNAR</a></div>
</div>
</body>
</html>