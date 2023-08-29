<?php

require_once "./conexao.php";

$sql = "SELECT d.id, d.codigo, d.nome, d.carga, d.ementa, d.semestre, c.nome as curso 
        FROM disciplina d JOIN curso c ON d.id_curso = c.id;";
$stmt = mysqli_query($conn, $sql);

$xml = new DOMDocument('1.0', 'UTF-8');
$xml -> preserveWhiteSpace = false;
$xml -> formatOutput = true;

$imp = new DOMImplementation();
$dtd = $imp -> createDocumentType('disciplinas', '', './dtd/disciplinas.dtd');
$dom = $imp -> createDocument("", "", $dtd);

$disciplinas = $xml -> createElement('disciplinas');

while ($dados = mysqli_fetch_object($stmt)) {
    $disciplina = $xml -> createElement('disciplina');
    $codigo = $xml -> createElement('codigo', $dados -> codigo);
    $nome = $xml -> createElement('nome', $dados -> nome);
    $carga = $xml -> createElement('carga', $dados -> carga);
    $ementa = $xml -> createElement('ementa', $dados -> ementa);
    $semestre = $xml -> createElement('semestre', $dados -> semestre);
    $curso = $xml -> createElement('curso', $dados -> curso);

    $disciplina -> setAttribute('id', $dados -> id);
    $disciplina -> appendChild($codigo);
    $disciplina -> appendChild($nome);
    $disciplina -> appendChild($carga);
    $disciplina -> appendChild($ementa);
    $disciplina -> appendChild($semestre);
    $disciplina -> appendChild($curso);

    $disciplinas -> appendChild($disciplina);

}

$xml -> appendChild($disciplinas);

header('Content-type: text/xml');

print $xml -> saveXML();