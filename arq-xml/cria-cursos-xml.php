<?php

    $arq = "./cursos.xml";

    $dom = new DOMDocument('1.0','UTF-8');
    $imp = new DOMImplementation();
    $dtd = $imp -> createDocumentType('cursos', '', '../dtd/cursos.dtd');
    $dom = $imp -> createDocument("", "", $dtd);
    $dom -> preserveWhiteSpace = false;
    $dom -> formatOutput = true;

    $cursos = $dom -> createElement('cursos');

    $curso = $dom -> createElement('curso');
    $nome = $dom -> createElement('nome', 'Informatica Basica');
    $semestres = $dom -> createElement('semestres', '1');
    $coordenador = $dom -> createElement('coordenador', "Maria Joana");

    $curso -> setAttribute('id', '1');
    $curso -> appendChild($nome);
    $curso -> appendChild($semestres);
    $curso -> appendChild($coordenador);

    $cursos -> appendChild($curso);

    $dom -> appendChild($cursos);

    if ($dom -> validate()) {
        echo ('Válido');
        $dom -> save($arq);
    }
    else {
        echo ('Não válido');
    }

?>