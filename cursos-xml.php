<?php

require_once "./conexao.php";

$sql = "SELECT c.id, c.nome, c.semestres, p.nome as coordenador FROM curso c JOIN professor p ON c.id_coordenador = p.id;";
$stmt = mysqli_query($conn, $sql);

$xml = new DOMDocument('1.0', 'UTF-8');
$xml -> preserveWhiteSpace = false;
$xml -> formatOutput = true;

$imp = new DOMImplementation();
$dtd = $imp -> createDocumentType('cursos', '', 'cursos.dtd');
$dom = $imp -> createDocument("", "", $dtd);

$cursos = $xml -> createElement('cursos');

while ($dados = mysqli_fetch_object($stmt)) {
    $curso = $xml -> createElement('curso');
    $id = $xml -> createElement('id', $dados -> id);
    $nome = $xml -> createElement('nome', $dados -> nome);
    $semestres = $xml -> createElement('semestres', $dados -> semestres);
    $coordenador = $xml -> createElement('coordenador', $dados -> coordenador);

    $curso -> setAttribute('id', $dados -> id);

    $curso -> appendChild($id);
    $curso -> appendChild($nome);
    $curso -> appendChild($semestres);
    $curso -> appendChild($coordenador);

    $cursos -> appendChild($curso);

}

$xml -> appendChild($cursos);

header('content-type: text/xml');
print $xml -> saveXML();