<?php

require __DIR__ . '/vendor/autoload.php';

use Rats\Zkteco\Lib\ZKTeco;

$zk = new ZKTeco('172.20.10.11', 4370);

if (!$zk->connect()) {
    die("Erro ao ligar ao terminal.");
}

echo "<h3>Ligado ao terminal</h3>";

$zk->disableDevice(); //função responsavel para bloquiar td ativadadi no terminal para evitar conflito

$resultado = $zk->setUser(
    2,          // uid interno
    '11',       // user_id que aparece no terminal
    'Ibra',    // nome curto, sem acentos
    '',         // password
    0,          // role normal
    0           // cartão
);

var_dump($resultado); // server para ver se setUser devolveu true ou false

$users = $zk->getUser();

echo "<pre>";
print_r($users);
echo "</pre>";

$zk->enableDevice();
$zk->disconnect();