<?php
    //Página principal a qual é exibida quando o usuário é validado

    //Import da página de validação
    require_once('valida-login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4 ">
        <div class="row justify-content-center">
            <div class="col-6 offset-3">
                <h2>PÁGINA RESTRITA</h2>
                <div class="row">
                    <div class="col-6 ">
                        <a href='pagina-restrita.php'>Página restrita1</a> | 
                        <a href='sair.php'>Sair do sistema</a>
                    </div>
                </div>
            </div>       
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

