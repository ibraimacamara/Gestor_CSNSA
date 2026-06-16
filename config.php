<?php
// require_once __DIR__ . '/includes/error.php';


$host = 'localhost';
$user = 'root';
$password = '';
$database = 'gestor_assiduidade';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die('Erro na ligacao a base de dados: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');


// try {
//     $conn = new PDO(
//         "mysql:host=localhost;dbmane=gestor_assiduidade",
//         "root",
//         ""
//     );
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }catch(Exception $e){
//     $mensagem= "[" . date("Y-m-d H:i:s") . "]"
//     . $e->getMessage() . PHP_EOL;

//     file_put_contents(
//         __DIR__ . "/log/error.log",
//         $mensagem,
//         FILE_APPEND
//     );
//     header("location: 404.php");
// }