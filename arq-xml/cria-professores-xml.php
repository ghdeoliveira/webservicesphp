<?php

    $arq = "./professores.xml";

    $dom = new DOMDocument('1.0','UTF-8');
    $imp = new DOMImplementation();
    $dtd = $imp -> createDocumentType('professores', '', '../dtd/professores.dtd');
    $dom = $imp -> createDocument("", "", $dtd);
    $dom -> preserveWhiteSpace = false;
    $dom -> formatOutput = true;

    $professores = $dom -> createElement('professores');

    $professor = $dom -> createElement('professor');
    $nome = $dom -> createElement('nome', 'Jose da Silva');
    $email = $dom -> createElement('email', 'jose@dasilva.com');

    $professor -> setAttribute('id', '1');
    $professor -> appendChild($nome);
    $professor -> appendChild($email);

    $professores -> appendChild($professor);

    $dom -> appendChild($professores);

    if ($dom -> validate()) {
        echo ('Válido');
        $dom -> save($arq);
    }
    else {
        echo ('Não válido');
    }

?>