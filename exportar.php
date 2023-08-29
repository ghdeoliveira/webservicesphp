<?php

class Export{

    public function xml($fileName, $data){
        $file = $fileName . '.xml';

        $xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml .= "<{$fileName}>\n";

        for($i=0; $i < count($data); $i++){
            $xml .= "  <curso>\n";
            foreach($data[$i] as $k => $v){
                $xml .= "    <{$k}>$v</{$k}>\n";
            }
            $xml .= "  </curso>\n";
        }

        $xml .= "</{$fileName}>";

        // configurando header para download
        header("Content-Description: PHP Generated Data");
        header("Content-Type: application/xml");
        header("Content-Disposition: attachment; filename=\"{$file}\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        // envio conteúdo
        echo $xml;
        exit;

    }
}