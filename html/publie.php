<?php   

 require ('../database/publicAction.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include '../includes/navbar.php';?>
<br></br>
<form class = "container" method ="post">
  <?php
  if(isset($errorMssg)){
    echo '<p>' .$errorMssg .'</p>';
  }elseif(isset($successMssg)){
    echo '<p>' .$successMssg .'</p>';
  }
  
  ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">titre</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="titre">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea type="textarea" class="form-control" name="description" ></textarea>

  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">titre</label>
    <input type="file" class="form-control" aria-describedby="emailHelp" name="titre" name="photo">
  </div>
  
  
  <button type="submit" class="btn btn-primary" name="valider">Publier</button>

</form>
</body>
</html>