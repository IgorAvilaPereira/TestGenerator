<?php
// ==================================================================
// para mostrar os erros no navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ==================================================================
// start na sessao
// ==================================================================
session_start();
define("URL", "http://localhost:8081/");
define("DIR", trim(str_replace("lib", "", shell_exec("pwd"))));
// ==================================================================
// Banco - Parametros
$usuario = "postgres";
$senha = "postgres";
$banco = "test_generator";
$HOST = "localhost";
$porta = 5432;
// string de conexao
$connection_string = "host=$HOST port=$porta user=$usuario password=$senha dbname=$banco";
// realizando a conexao
$conexao = pg_connect($connection_string) or die("Falha em conectar - Banco de Dados....");

function dump() {
    global $banco, $senha, $porta, $HOST, $usuario;
    $path_back = DIR."/dumps/";    
    //  funcionando mas preferi retirar - apagando todos os dumps anteriores
    $link = $path_back . $banco . date("dmY") . ".sql";
    $cmd = "PGPASSWORD=" . $senha . " pg_dump --host " . $HOST . " --port " . $porta . " --username " . $usuario . " --format plain --create --clean --inserts --verbose --file " . $link . " " . $banco;
    // criando um novo dump atualizado => Executa o comando pg_dump que esta na variável cmd
    shell_exec($cmd);
    

    // removendo dumps velhos (Mantem somente os ultimos)
    $vetArquivo = explode("\n",shell_exec("cd ".$path_back." && ls -alt | grep \"test_generator*\" | awk '{print $(NF)}'") ?? '');
    $x = 7;
    if (count($vetArquivo) > $x){
        for ($i=$x; $i < count($vetArquivo); $i++) { 
            if (strlen($vetArquivo[$i]) > 0){
                unlink($path_back.trim($vetArquivo[$i]));
            }
        }
    }
}
?>
