<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>HTML em um arquivo PHP</h2>

    <?php
        $hora = 20;
        if($hora<12){
            print("<p>Bom dia!</p>");
        }
        elseif($hora<18){
            print("<p>Boa tarde!</p>");
        }
        else{
            print("<p>Boa noite!</p>");
        }
    ?>

</body>
</html>