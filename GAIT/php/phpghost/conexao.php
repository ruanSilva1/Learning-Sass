<?php
/* Connect to a MySQL database using driver invocation */
try{
    $dsn = 'mysql:dbname=team_gait;host=127.0.0.1;port=3333';
    $user = 'root';
    $password = '';
    
    $dbh = new PDO($dsn, $user, $password);
}catch(PDOException $e){
    echo "Erro de conexao com o banco de dados";
}
?>