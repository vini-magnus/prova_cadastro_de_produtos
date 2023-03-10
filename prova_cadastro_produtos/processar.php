<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>algoritmo</title>
</head>
<body class="bg-body-secondary">

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark-subtle text-emphasis-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo da empresa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="./index.php">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./list.php">Listar produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./processar.php">Algoritmo para encontrar a maior e a menor  palavra</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



  <div class="container d-flex flex-column mb-5 align-items-center justify-content-center vh-100  bg-body-secondary pb-5 w-100">
    <form class="bg-body w-50 rounded-4" method="POST" action="">

      <div class="mb-3 px-2">
        <label for="formGroupExampleInput" class="form-label">Digite uma frase para aparecer a maior e menor palavra da mesma:</label>
        <input type="text" name="frase" class="form-control" id="formGroupExampleInput" placeholder="Digite uma frase" required>
      </div>

        <div class="mb-3 px-2">
        <input class="btn btn-secondary" type="submit" value="Enviar" name="enviar">
        </div>

    </form>
 

<?php

    //implementando os arquivos necess??rios para este script
    require './classes/Algoritmo.php';

    //pegando os dados do formul??rio 
    $dadosFormulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    
    //usando condicional if para verificar se foi enviado algo pelo usu??rio (afim de evitar erros)
    if(!empty($dadosFormulario['enviar'])){
    

    //declarando a vari??vel frase que cont??m a frase digitada pelo usu??rio
    $frase = $_POST['frase'];

    //intanciando a classe
    $algoritmo = new Algoritmo();

    //instanciando o m??todo 
    $resultado = $algoritmo->encontrarMaiorMenorPalavra($frase);


    ?>

    <div class="d-inline-flex bg-body rounded-4 mt-5">
    <?php
    //imprimindo na tela as duas palavras 
    echo "<div class='my-3 px-2'> Maior palavra: " . $resultado["maior"] . "<br> </div>";
    echo "<div class='my-3 px-2'> Menor palavra: " . $resultado["menor"] . "<br> </div>";
}
?>
    </div>
  </div> 
   <footer class="navbar fixed-bottom bg-dark-subtle text-emphasis-dark">
        <div class="container mx-auto text-center">
        <span class="navbar-text mx-auto">Desenvolvido por Vin??cius Magnus</span>
        </div>
    </footer>

</body>
</html>