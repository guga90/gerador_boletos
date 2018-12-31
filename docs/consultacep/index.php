<?php

header('Access-Control-Allow-Origin: *');

if ($_GET) {

    $cep = $_GET['cep']; // o cep!
    $tpRetorno = empty($_GET['tipo']) ? 'xml' : $_GET['tipo']; // o tipo de retorno json ou xml!
// parametros passados pela URL
    $postCorreios = "CEP=" . $cep . "&Metodo=listaLogradouro&TipoConsulta=cep";

// url para fazer a requisicao
    $cURL = curl_init("http://www.buscacep.correios.com.br/servicos/dnec/consultaLogradouroAction.do");

// seta opcoes para fazer a requisicao
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURL, CURLOPT_HEADER, false);
    curl_setopt($cURL, CURLOPT_POST, true);
    curl_setopt($cURL, CURLOPT_POSTFIELDS, $postCorreios);

// faz a requisicao e retorna o conteudo do endereco
    $saida = curl_exec($cURL);

    curl_close($cURL); // encerra e retorna os dados

    $saida = utf8_encode($saida); // codifica conteudo para utf-8

    $campoTabela = "";

// pega apenas o conteudo das tds e transforma em um array
    preg_match_all('@<td (.*?)<\/td>@i', $saida, $campoTabela);

// mostra o conteudo!
    $retorno = array('rua' => strip_tags($campoTabela[0][0]),
        'bairro' => strip_tags($campoTabela[0][1]),
        'cidade' => strip_tags($campoTabela[0][2]),
        'estado' => strip_tags($campoTabela[0][3]),
        'cep' => strip_tags($campoTabela[0][4]));

    if ($tpRetorno == 'json') {
        print json_encode($retorno);
    } else {
        print utf8_decode('<?xml version="1.0" encoding="UTF-8"?>'
                        . '<rua>' . $retorno['rua'] . '</rua>'
                        . '<bairro>' . $retorno['bairro'] . '</bairro>'
                        . '<cidade>' . $retorno['cidade'] . '</cidade>'
                        . '<estado>' . $retorno['estado'] . '</estado>'
                        . '<cep>' . $retorno['cep'] . '</cep>');
    }
}
?>
