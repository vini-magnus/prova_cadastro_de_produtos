<?php
session_start();
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&family=Overpass:wght@400;700&family=VT323&display=swap" rel="stylesheet">
    

    <title>Cadastrar produto</title>
</head>
<body class="bg-body-secondary">

<!-- Header -->
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark-subtle text-emphasis-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo da empresa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./list.php">Listar produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./processar.php">Algoritmo para encontrar a maior e a menor  palavra</a>
        </li>
      </ul>
    </div>
  </div>
</nav>






<?php

//verificando se há alguma msg na página, se tiver, fazer com que ela apareça e logo depois removê-la
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

//implementando os arquivos necessários
require './classes/Conn.php';
require './classes/Product.php';

//recebendo os dados do formulário desta página
$dadosFormulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);


//verificando se o botão de cadastrar produto foi clicado
if(!empty($dadosFormulario['SendAddProduct'])){
   
    //instanciando a classe product
    $product = new Product();

    //passando os dados da variável $dadosFormulario para o atributo da classe Product
    $product->formData = $dadosFormulario;

    //estanciando o método createProduct
    $value = $product->createProduct();

    //usando SESSION para quando cadastrar um novo produto redirecionar para a página index novamente
    if($value){
        $_SESSION['msg'] = "Produto cadastrado com sucesso!</p>";
        header("Location: index.php");
    } else{
        echo "Erro: Produto não cadastrado!</p>";
    }
}


?>
    
        <div class="container d-flex align-items-center justify-content-center vh-100  bg-body-secondary pb-5 w-100">

         


      <form class="bg-body w-50 rounded-4" name="CreateProduct" method="POST" action="">

          <h1 class="fs-5 mt-3 px-2">Cadastrar Produtos:</h1>

         <div class="mb-3 px-2">
          <label for="formGroupExampleInput" class="form-label">Nome do produto:</label>
          <input type="text" name="descricao" class="form-control" id="formGroupExampleInput" placeholder="Nome do Produto" required>
        </div>

        <div class="mb-3 px-2">
          <label for="formGroupExampleInput2" class="form-label">Quantidade:</label>
          <input type="number" name="quantidade" class="form-control" id="formGroupExampleInput2" placeholder="Quantidade de itens" required>
        </div>

        <div class="mb-3 px-2">
          <label for="formGroupExampleInput3" class="form-label">Preço:</label>
          <input type="float" name="valor" class="form-control" id="formGroupExampleInput3" placeholder="Preço em R$" required>
        </div>
        
        <div class="mb-3 px-2">
        <input class="btn btn-secondary" type="submit" value="Cadastrar Produto" name="SendAddProduct">
        </div>
      </form>

        </div>
   

    <footer class="navbar fixed-bottom bg-dark-subtle text-emphasis-dark">
        <div class="container">
        <span class="navbar-text mx-auto">Desenvolvido por Vinícius Magnus</span>
        </div>
    </footer>

</body>
</html>