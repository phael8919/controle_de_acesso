<?php
session_start(); //Inicia a sessão
session_abort(); //Deleta  a sessão
header('Location: login.php'); //Rerediciona para a página de login