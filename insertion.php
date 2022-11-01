<?php
    session_start();
     $user = 'root';
     $pass = '';

    $dbc = new PDO ('mysql:host=localhost;dbname=e_card',$user,$pass);
    $date = date("Y-m-d H:i:s");
    

    
    // $stmt = $dbc->prepare("INSERT INTO enrolement (id,nom_citoyen,prenom_citoyen,sexe,profession_citoyen,date_naissance,
    // lieu_naissance,departement,telephone,email,teint,taille,groupe_ethnique,
    // nom_pere,profession_pere,nom_mere,profession_mere,image_citoyen,image_certificat_nationalite,
    // image_acte_naissance) VALUES (NULL,:nom_citoyen,:prenom_citoyen,:sexe,:profession_citoyen,:date_naissance,:lieu_naissance,
    // :departement,:telephone,:email,:teint,:taille,:groupe_ethnique,:nom_pere,:profession_pere,:nom_mere;profession_mere,
    // :image_citoyen,:image_certificat_nationalite,:image_acte_naissance)");

  $stmt = $dbc->prepare("INSERT INTO `enrolement`(`id`, `poste_identification`, `email`, `telephone`, 
  `nom_citoyen`, `prenom_citoyen`, `sexe`, `profession_citoyen`, `date_naissance`, `lieu_naissance`, 
  `departement`,  `teint`, `taille`, `groupe_ethnique`, `nom_pere`, `profession_pere`, `nom_mere`, 
  `profession_mere`, `image_citoyen`, `image_certificat_nationalite`,`image_acte_naissance`, `date_enregistrement`,`cle`)
  VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bindParam(1, $_POST['poste_identification']);
    $stmt->bindParam(2, $_POST['email']);
    $stmt->bindParam(3, $_POST['telephone']);
    $stmt->bindParam(4, $_POST['nom_citoyen']);
    $stmt->bindParam(5, $_POST['prenom_citoyen']);
    $stmt->bindParam(6, $_POST['sexe']);
    $stmt->bindParam(7, $_POST['profession_citoyen']);
    $stmt->bindParam(8, $_POST['date_naissance']);
    $stmt->bindParam(9, $_POST['lieu_naissance']);
    $stmt->bindParam(10, $_POST['departement']);
    $stmt->bindParam(11, $_POST['teint']);
    $stmt->bindParam(12, $_POST['taille']);
    $stmt->bindParam(13, $_POST['groupe_ethnique']);
    $stmt->bindParam(14, $_POST['nom_pere']);
    $stmt->bindParam(15, $_POST['profession_pere']);
    $stmt->bindParam(16, $_POST['nom_mere']);
    $stmt->bindParam(17, $_POST['profession_mere']);
    $stmt->bindParam(18, $_POST['image_citoyen']);
    $stmt->bindParam(19, $_POST['image_certificat_nationalite']);
    $stmt->bindParam(20, $_POST['image_acte_naissance']);
    $stmt->bindParam(21, $date);
    $stmt->bindParam(22, $_POST['cle']);
    
    $insertIsOk =  $stmt->execute();

    if($stmtUser->rowcount()>0);{
      $userInfos = $stmtUser->fetch();
      $_SESSION['id'] = $userInfos['id'];
    }

    if($insertIsOk) {
        $message = 'informations enregistrées avec succèss!!!';
      }
      else{
        $message = 'echec d\enregistrement';
      }

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href ="logo.png">
    <script src="js/bootstrap.js"></script>
    <title>E.CARD</title>
  </head>
  <body>
    <div class="container">
      <div class="col-md-12">
        <div class="row">
          <h1 style = "color:black;margin-top:35px";> <?php echo $message; ?></h1>
          <button style="display: inline-block; background-color:red;color:#fff; user-select: none; position: relative;left:450px;top: 200px;height: 50px";>
            <a href="lister.php" style="text-decoration:none;color:#fff";>VOIR DETAILS</a>
          
          </button>
        </div>      
      </div>   
    </div>       
  </body>
</html>