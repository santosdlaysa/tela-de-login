<?php

$nome = $_POST['NOME'];
$login = $_POST['EMAIL'];
$senha = MD5($_POST['SENHA']);
$connect = mysql_connect('nome_do_servidor', 'nome_de_usuario','senha');
$db = mysql_select_db('nome_do_banco_de_dados');
$query_select = "SELECT email FROM usuarios WHERE email = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['email'];

    if($email == "" || $email == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo email deve ser preenchido');window.location.href='cadastro.html';</script>";
        }else{
            if($logarray == $email){
                echo"<script language='javascript' type='text/javascript'>alert('Esse email já existe');window.location.href='cadastro.html';</script>";
                die();
            }else{
                $query = "INSERT INTO usuarios (nome,email,senha) VALUES ('$nome','$email','$senha')";
                $insert = mysql_query($query,$connect);
                 
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
                }
            }
        }
?>
