<?php

require_once "./conexao.php";

$sql = "SELECT * FROM professor;";
$stmt = mysqli_query($conn, $sql);

$xml = new DOMDocument('1.0', 'UTF-8');
$xml -> preserveWhiteSpace = false;
$xml -> formatOutput = true;

$imp = new DOMImplementation();
$dtd = $imp -> createDocumentType('professores', '', './dtd/professores.dtd');
$dom = $imp -> createDocument("", "", $dtd);

$professores = $xml -> createElement('professores');

while ($dados = mysqli_fetch_object($stmt)) {
    $professor = $xml -> createElement('professor');
    $nome = $xml -> createElement('nome', $dados -> nome);
    $email = $xml -> createElement('email', $dados -> email);

    $professor -> setAttribute('id', $dados -> id);
    $professor -> appendChild($nome);
    $professor -> appendChild($email);

    $professores -> appendChild($professor);

}

$xml -> appendChild($professores);

header('Content-type: text/xml');

print $xml -> saveXML();