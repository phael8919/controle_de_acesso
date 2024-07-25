<?php 
/*Página que é utilizada para validar o login e a senha, 
permitindo o acesso ou não a todas as páginas restritas*/

session_start();

if(isset($_SESSION['usuario']) && isset($_SESSION['senha'])){
    $login_usuario = $_SESSION['usuario'];
    $login_senha = $_SESSION['senha'];
    if(!empty($login_usuario) or !empty($login_senha)){
        require_once('conexao.php');
        $query = mysqli_query($conexao, "select * from users 
        where login = '$login_usuario' and senha = '$login_senha'");
        $num_linhas = mysqli_num_rows($query);

        if($num_linhas == 0){
            session_destroy();
            header('location: login.php');
            exit;
        }}
}elseif($_SESSION['usuario'] == '' && $_SESSION['senha']== ''){
    session_destroy();
    header('location: login.php');
    exit;    
}

?>