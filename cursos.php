<?php

require_once "./conexao.php";

$sql = "SELECT c.id, c.nome, c.semestres, p.nome as coordenador 
        FROM curso c JOIN professor p ON c.id_coordenador = p.id;";

$stmt = mysqli_query($conn, $sql);
$data = [];
$i = 0;

while($row = mysqli_fetch_assoc($stmt)){
    $data[$i]['id'] = $row['id'];
    $data[$i]['nome'] = $row['nome'];
    $data[$i]['semestres'] = $row['semestres'];
    $data[$i]['coordenador'] = $row['coordenador'];
    $i++;
}

require_once('./exportar.php');
$export = new Export();

// if(isset($_GET['export']) && $_GET['export'] == 'excel'){
//     $export->excel('Lista de Contatos', $_GET['fileName'], $data);
// }

if(isset($_GET['export']) && $_GET['export'] == 'xml'){
    $export->xml($_GET['fileName'], $data);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML - PHP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
</head>
<body>
<div class="container">
        <div class="row">
            <h1>Lista de Cursos</h1>
        </div>
        <div class="row">
            <a href="?export=xml&&fileName=cursos">
            <button href="?export=xml&&fileName=cursos" class="dropdown-button btn right" data-activates="btn-export">Exportar</button>
            </a>
            <!-- <ul id="btn-export" class="dropdown-content" style="margin-top: 40px;">
                <li><a href="?export=excel&&fileName=cursos">Excel</a></li> 
                <li><a href="?export=xml&&fileName=cursos">XML</a></li>
            </ul> -->
        </div>
        <div class="row">
            <table class="bordered highlight">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Semestres</th>
                        <th>Coordenador</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row): ?>
                        <tr>
                            <td><?php echo $row['id'];  ?></td>
                            <td><?php echo $row['nome'];  ?></td>
                            <td><?php echo $row['semestres'];  ?></td>
                            <td><?php echo $row['coordenador'];  ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>
</html>