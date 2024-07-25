<?php 
    //Página de login
    //Inicia a sessão
    session_start(); 
    
    //Variável que armazena uma mensagem de erro
    $mensagem = ''; 

    //Verificar se o nome de usuário e a senha foram setados
    if(isset($_POST['usuario']) && isset($_POST['senha'])){
        //Cria duas variáveis para armazenar os valores inseridos no formulário
        $login_usuario = $_POST['usuario'];
        $login_senha = $_POST['senha'];

        /*Se o usuário não digitou o nome de usuário e senha, destrói a sessão e
        exibe uma mensagem de erro*/
        if(empty($login_usuario) || empty($login_senha)){
            session_destroy();
            $mensagem = 'Login ou senha incorretos!';
        }

        /*Se o usuário digitou o nome de usuário e senha, verifica-se se ambos 
        constam no banco de dados*/
        elseif(!empty($login_usuario) || !empty($login_senha)){
            //Conecta à página de conexão ao banco de dados
            require_once('conexao.php');
            //Executa a query para identificar o login e senha
            $query = mysqli_query($conexao, "select * from users where login = '$login_usuario'
             and senha = '$login_senha'");
            $num_linhas = mysqli_num_rows($query);
            
            /*Se a consulta não retornar nada, destrói a sessão e
            exibe uma mensagem de erro*/
            if($num_linhas == 0){
                session_destroy();
                $mensagem = 'Login ou senha incorretos!';
                exit;

            /*Se $num_linhas > 0, atribui as variáveis de sessão ao valor digitado no formulário
            e rerediciona para a primeira página restrita*/
            }else{
                $_SESSION['usuario'] = $login_usuario;
                $_SESSION['senha'] =  $login_senha;
                header('Location: pagina-restrita.php');
            }            
        }
    }else{
        session_destroy();        
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    
    <div class="container mt-5 text-light">
        <div class="row justify-content-center">
            <div class="col-md-4 col-9">
                <form action="login.php" method="post" class="card p-4 bg-dark">
                    <h2 class="text-center">LOGIN</h2>
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control mb-2" id="usuario" name="usuario">
                                        
                    <label for="senha">Senha</label>
                    <input type="text" class="form-control mb-4" id="senha" name="senha">

                    <p class="text-danger text-center"><?= $mensagem ?></p>
                    
                    <div class="row justify-content-center">
                        <input type="submit" value="Logar" class="btn btn-primary col-5 ">
                        <input type="reset" value="Limpar" class="btn btn-warning text-danger col-5 offset-1">
                    </div>
                    
                </form>
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>