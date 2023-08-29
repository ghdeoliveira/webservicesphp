<?php

    $arq = "./disciplinas.xml";

    $dom = new DOMDocument('1.0','UTF-8');
    $imp = new DOMImplementation();
    $dtd = $imp -> createDocumentType('disciplinas', '', '../dtd/disciplinas.dtd');
    $dom = $imp -> createDocument("", "", $dtd);
    $dom -> preserveWhiteSpace = false;
    $dom -> formatOutput = true;

    $disciplinas = $dom -> createElement('disciplinas');

    $disciplina = $dom -> createElement('disciplina');
    $codigo = $dom -> createElement('codigo', 'STB0332');
    $nome = $dom -> createElement('nome', 'WebServices');
    $carga = $dom -> createElement('carga', '60h');
    $ementa = $dom -> createElement('ementa', 'XML, JSON, REST ...');
    $semestre = $dom -> createElement('semestre', '6');
    $curso = $dom -> createElement('curso', 'TSI');

    $disciplina -> setAttribute('id', '1');
    $disciplina -> appendChild($codigo);
    $disciplina -> appendChild($nome);
    $disciplina -> appendChild($carga);
    $disciplina -> appendChild($ementa);
    $disciplina -> appendChild($semestre);
    $disciplina -> appendChild($curso);

    $disciplinas -> appendChild($disciplina);

    $dom -> appendChild($disciplinas);

    if ($dom -> validate()) {
        echo ('Válido');
        $dom -> save($arq);
    }
    else {
        echo ('Não válido');
    }

?>