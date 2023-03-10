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
    <title>Cadastro de Produtos</title>
</head>
<body>
    
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
            <a class="nav-link active" aria-current="page" href="./list.php">Listar produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./processar.php">Algoritmo para encontrar a maior e a menor  palavra</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<?php


require './classes/Conn.php';
require './classes/Product.php';

$listProducts = new Product();

//estancia o método list() e atribui o valor deste método a variável $result_usuarios
$result_products = $listProducts->list();


//para ler o valor usa-se o laço de repetição foreach para ler o arra, para que toda vez  que passar dentro do laço imprimir um único usuário

    
    
?>



<div class="container-fluid bg-body-secondary vh-100"> 

    <h1 class="fs-5">Produtos:</h1>

    <div class="row">
        <?php foreach($result_products as $row_products){ ?>
          
        <!-- card  dos produtos cadastrados -->
        <div class="col-4">
            <div class="card text-center mx-auto my-auto mt-3 border border-secondary " style="width: 18rem;">
                <div class="card-body">



                <ul class="list-group">
                    <li class="list-group-item"><?php echo $row_products['descricao']; ?></li>
                    <li class="list-group-item"><?php echo "Quantidade do Produto: " . $row_products['quantidade']; ?></li>
                    <li class="list-group-item"><?php echo "Valor: " . $row_products['valor'] . "R$"; ?></li>
                </ul>
     
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div> 



<footer class="navbar fixed-bottom bg-dark-subtle text-emphasis-dark">
  <div class="container mx-auto text-center">
    <span class="navbar-text mx-auto">Desenvolvido por Vinícius Magnus</span>
  </div>
</footer>

</body>
</html>





                    