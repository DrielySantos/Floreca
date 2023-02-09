<?php

    $c = array(
        'sitename' => 'Floreça',
        'siteslogan' => '',
        'sitelogo' => '',
        'titlesep' => '&middot;&middot;&middot;',
        'siteemail' => 'admin@floreca.com',
        'ucookie' => 'mtuserdata',
        'ucookiedays' => 365
    );

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'floreca';
    $port = 3306;

    try{
    
        $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
            echo "Conexão com banco de dados realizado com sucesso!";

    } catch (PDOException $erro){
        echo "Erro: Conexão com banco de dados não realizada".$erro; 
    }
    

    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set('America/Sao_Paulo');

    $conn->query("SET NAMES 'utf8'");
    $conn->query('SET character_set_connection=utf8');
    $conn->query('SET character_set_client=utf8');
    $conn->query('SET character_set_results=utf8');

    $conn->query('SET GLOBAL lc_time_names = pt_BR');
    $conn->query('SET lc_time_names = pt_BR');

    require('functions.php');