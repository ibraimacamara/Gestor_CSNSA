<?php
date_default_timezone_set('Europe/Lisbon');

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

function guardarErro($mensagem)
{
    $log = "[" . date("Y-m-d H:i:s") . "] " . $mensagem . PHP_EOL;

    file_put_contents(
        __DIR__ . "/../log/error.log",
        $log,
        FILE_APPEND
    );
}

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    guardarErro("ERRO: $errstr em $errfile na linha $errline");

    header("Location: /Gestor_CSNSA/404.php");
    exit;
});

set_exception_handler(function ($exception) {
    guardarErro(
        "EXEÇÃO: " . $exception->getMessage()
        . " em " . $exception->getFile()
        . " na linha " . $exception->getLine()
    );
    header("Location: /Gestor_CSNSA/404.php");

    exit;
});

register_shutdown_function(function () {
    $erro = error_get_last();

    if ($erro !== null) {
        guardarErro(
            "ERRO FATAL: " . $erro['message']
            . " em " . $erro['file']
            . " em linha " . $erro['line']
        );

        if (!headers_sent()) {
            header("Location: /Gestor_CSNSA/404.php");

            exit;
        }
    }
});