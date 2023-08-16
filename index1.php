<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de base de donnee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="py-5"> Ce tableau represente l'enregistrement dans la base de données des produits stockés dans les magasins</h2>
        <a href="ajouter1.php" class="btn bg-light"><img src="./images/plus.jpg" alt="plus" width="100%">Ajouter</a>
        <?php 
        include_once "connexion.php";
        $req = "SELECT * FROM produits_stockes ORDER BY id ASC";
        $result = $conn->query($req);
        
        if(!$result){
            echo "Aucun produit n'a ete ajouter";
          }else{
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">produit_stockes</th>
                    <th scope="col">date_de_fabrication</th>
                    <th scope="col">date_d_expiration</th>
                </tr>
                </thead>
                <?php
                 while($ligne= $result->fetch(PDO::FETCH_NUM)){
                    echo "<tr>";
                    foreach ($ligne as $valeur){
                      echo "<td>$valeur</td>";
                    }
                    echo "</tr>";
                  }
                  ?>
            </table>
            <?php
             $result->closeCursor();
          }
        ?>
        <h2 class="py-5"> Ce tableau represente l'enregistrement dans la base de données des produits pris dans le stocks</h2>  
        <a href="ajouter2.php" class="btn bg-light"><img src="./images/plus.jpg" alt="plus" width="100%">Ajouter</a>
        <?php 
        include_once "connexion.php";
        $req = "SELECT * FROM produits_pris ORDER BY id ASC";
        $result = $conn->query($req);
        
        if(!$result){
            echo "Aucun produit n'a ete ajouter";
          }else{
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">produit_pris</th>
                    <th scope="col">date_de_fabrication</th>
                    <th scope="col">date_d_expiration</th>
                </tr>
                </thead>
                <?php
                 while($ligne= $result->fetch(PDO::FETCH_NUM)){
                    echo "<tr>";
                    foreach ($ligne as $valeur){
                      echo "<td>$valeur</td>";
                    }
                    echo "</tr>";
                  }
                  ?>
            </table>
            <?php
             $result->closeCursor();
          }
        ?>  
                
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>    