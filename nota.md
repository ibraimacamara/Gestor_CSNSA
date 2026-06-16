  # Gestor de assiduidade de CSNSA com terminal #

este projeto é um sistema de controlo de assiduidade de CSNSA(centro social nossa senhora de auxiliadora) que permite o administrador controlar a entra e saida dos funcionarios atraves de leitor biometrico

# Como funciona (Visão geral)

 o funcionário é registado no sistema atraves de interface web e ele é registado automáticamente no terminal e funcionário precisa confirmar a sua impressão digital no terminal. e depois ele regista as entras e saidas de cada funcionário registado no sistema, permitindo assim contabilizar as horas feitas pelos funcionários.

 # o que precisas de instalar

  *XAMPP* | Apache (PHP) + MYSQL

  > NO Xampp inicia o *Apache* e *mysql*.

# Passo 1 criar a base de dados

1. Abre o *Xampp* e clica em *Start* no Apache e no Mysql
2. Corre o script SQL  de criação de base de dados ou criar a tua base de zero se quiser.

>> Ou abre o `phpMyAdmin` (`http://localhost/phpmyadmin`), clica em **Import** e seleciona o ficheiro `database/gestor_assiduidade`.

o script cria automáticamento a base de dados.

# passo 2 - configurar  o ficheiro de conexão

cria um arquivo `conexao.php` e estabelce a conexão com base de dados usando **PDO** e confirma se os dados estão corretos.

```php
 $pdo= new PDO(
        "mysql:host=localhost;dbname=gestor_assiduidade;",
        "root",
        ""
    );
```

# passo 3 - instalar a biblioteca zkteco
usa o composer para instalar a biblioteca, onde depois de executar este comando abaixo, ele vai criar automáticamento a pasta vendor que contem a biblioteca 

```bash
composer require rats/zkteco
```

## Importar a Biblioteca

```php
require __DIR__ . '/vendor/autoload.php';

use Rats\Zkteco\Lib\ZKTeco;
```

## Ligar ao Terminal

```php
$zk = new ZKTeco('192.168.1.201');

$zk->connect();
```