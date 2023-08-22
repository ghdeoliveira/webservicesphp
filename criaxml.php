<?php

    $dom = new DOMDocument();
    $arq = "cursos.xml";

    // cria DOCTYP - DTD
    $imp = new DOMImplementation();
    $dtd = $imp -> createDocumentType('cursos', '', 'cursos.dtd');

    // cria uma instância DOMDocument
    $dom = $imp -> createDocument("", "", $dtd);
    $dom -> formatOutput = true;

    // cria o elemento
    $cursos = $dom -> createElement('cursos');

    $dom -> appendChild($cursos);

    $curso = $dom -> createElement('curso');
    $cursos -> appendChild($curso);

    $atr = $dom -> createAttribute('id');
    $atr -> value = '1';
    $curso -> appendChild($atr);

    $nome = $dom -> createElement('nome');
    $curso -> appendChild($nome);

    $semestres = $dom -> createElement('semestres');
    $curso -> appendChild($semestres);

    $coordenador = $dom -> createElement('coordenador');
    $curso -> appendChild($coordenador);

    if ($dom -> validate()) {
        echo ('Válido');
        $dom -> save($arq);
    }
    else {
        echo ('Não válido');
    }

?>