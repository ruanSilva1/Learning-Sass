<?php
    include('./phpghost/conexao.php');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if(empty($usuario) || empty($senha)){
        echo "<script>alert('Campos obrigadorios vazios')</script>";
        //header('location: ../login.php');
    }else{

        try{
            $query = $dbh->prepare("SELECT * FROM adm WHERE usuario=:usuario AND senha=:senha");
            $query->execute(array(
                ':usuario' => $usuario,
                ':senha' => $senha
            ));

            $resultado = $query->fetch();

            if(empty($resultado)){
                echo "<script>alert('Usuarios e/ou senha invalidos')</script>";
            }else{
                header('location: ../html/inicio.html');
            }
            
        }catch(PDOException $e){
            echo $e;
        }

        try{
            $squery = $dbh->prepare("SELECT usuario, senha FROM funcionario WHERE usuario=:usuario AND senha=:senha");
            $squery->execute(array(
                ':usuario' => $usuario,
                ':senha' => $senha
            ));

            $sresult = $squery->fetch();

            if(empty($sresult)){
                echo "<script>alert('Usuarios e/ou senha invalidos')</script>";
            }else{
                header('location: ../html/inicio.html');
            }
        }catch(PDOException $e){
            echo $e;
        }
    }
?>