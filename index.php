<?php
//importações
require_once('./app/config.php');
require_once('./app/core/core.php');
require_once('./app/model/funcionarios_model.php');
require_once('./app/controllers/funcionarios_controller.php');
require_once('./app/controllers/erro_controller.php');
require_once('./vendor/autoload.php');
//template
$template = file_get_contents('./template/index.html');
//inicia a aplicação

ob_start();
    $core = new Core;
    $core->start($_GET);
    $saida = ob_get_contents();
ob_end_clean();


$tplPronto = str_replace('{{URL_BASE}}', BASE_URL, $template);
$tplPronto = str_replace('{{conteudo}}', $saida, $tplPronto);
//imprime o template
echo $tplPronto;