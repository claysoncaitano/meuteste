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
            if($perm!=1){
                echo  "VOCÊ NÃO TEM PERMISSÃO PARA EDITAR PRODUTOS!</br>";
                echo "<a href = 'prodlista.php'>Retornar</a>";
                exit;
            }else{
                $idteste = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $result_prod = "SELECT * FROM produto WHERE idproduto = '$idteste'";
                $resultado_prod = mysqli_query($conn, $result_prod);
                $linha_prod = mysqli_fetch_array($resultado_prod);
            }
        ?>
        <form action="processaeditarproddois.php" method="post">
            <input type="hidden" name="id" id="" value="<?php echo $linha_prod['idproduto'] ?>">
            Nome: <input type="text" name="nome" id="" value="<?php echo $linha_prod['nomeproduto'] ?>"><br>
            IDUsuario: <input type="text" name="idusuario" id="" value="<?php echo $linha_prod['usuario_idusuario'] ?>"><br>
            <input type="submit" value="Editar">
        </form>
    </div>
</body>
</html>