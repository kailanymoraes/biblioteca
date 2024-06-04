<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteca";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo=mysqli_real_escape_string($conn,$_POST["titulo"]);
        $autor=mysqli_real_escape_string($conn,$_POST["autor"]);     
        $disponivel=isset($_POST["disponivel"])? 1:0;
        
        $diretorio_imagens="../uploads/";
        $imagem_nome=$_FILES["imagem"]["name"];

        $imagem_tmp=$_FILES["imagem"]["tmp_name"];
        $destino=$diretorio_imagens.$imagem_nome;
        move_uploaded_file($imagem_tmp,$destino);
    }
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="titulo">Bem vindo a biblioteca</h1>
    <?php include 'cabecalho.php'?>
    <h1>Cadastro de livro</h1>
    <form method="POST" enctype="multipart/form-data">

        <label for="titulo">título</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="autor">autor</label>
        <input type="autor" id="autor" name="autor" required>

        <label for="disponivel">disponivel</label>
        <input type="checkbox" id="disponivel" name="disponivel">

        <label for="imagem">imagem do livro</label>
        <input type="file" id="imagem" name="imagem" required>
        <button type="submit">Cadastrar</button>
        
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>