<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./main.css">

</head>
<body>
    <?php
    include_once "connexion.php";
    if(isset($_POST['boutton'])){
      
      $nom = $_POST['produit_stockes'];
      $date1 = $_POST['date_de_fabrication'];
      $date2 = $_POST['date_d_expiration'];

        if(!empty($nom) && !empty($date1) && !empty($date2)){
          
          $req = $conn->prepare("INSERT INTO produits_stockes(produit_stockes, date_de_fabrication, date_d_expiration) VALUES(:nom, :date1, :date2)");
          $req->bindvalue(':nom', $nom);
          $req->bindvalue(':date1', $date1);
          $req->bindvalue(':date2', $date2);

          $result = $req->execute();

          if(!$result){
            echo "un probleme est survenu!";
          }else{
            echo "bien enregistrer!";
          }
        }else{
          echo "Veuillez remplir tous les champs !";
        }
      }
    ?>
 
    <div class="form">
        <a href="index1.php" class="fs-4 py-3"><img src="./images/back (1).svg" alt="" width="100%">Retour</a>
        <h3>Ajouter un produit</h3>
        <p>
        </p>
       <div class="row justify-content-center">
        <div class="col-5 bg-light">
            <form action="" method="post">
                <div class="mb-3">
                  <label for="nom" class="form-label">produit_stockes:</label>
                  <input type="text" class="form-control" id="nom" name="produit_stockes">
                </div>
                <div class="mb-3">
                  <label for="date" class="form-label">date_de_fabrication:</label>
                  <input type="date" class="form-control" id="date" name="date_de_fabrication">
                </div>
                <div class="mb-3">
                  <label for="date" class="form-label">date_d_expiration:</label>
                  <input type="date" class="form-control" id="date" name="date_d_expiration">
                </div>
                <button type="submit" class="btn btn-success" name="boutton" value="Ajouter">Ajouter</button>
              </form>
        </div>
       </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>