<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmSuppression() {
            return confirm("Êtes-vous sûr de vouloir supprimer cette recette ?");
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin-Page</title>
</head>
<body>
    <div class="container mt-3">
        <div class=" d-flex justify-content-between">  
            <p >Ajouter une recette :</p>
           <form action="" method="get">
                <button name="choix" value="ajout">Ajouter</button>
           </form> 
         </div>
    <?php
         ob_start();
         try
         {
             $connect=mysqli_connect('localhost','root','','bonnebouffe');
             echo "connexion réussie <br>";
             $result=10;
             $req=mysqli_query($connect,'SELECT COUNT(*) AS total FROM RECETTES');
             $rows=mysqli_fetch_assoc($req);
             $total_pages = ceil($rows['total'] / $result);

             $page = isset($_GET['page']) ? $_GET['page'] : 1;
             $page_actuel = ($page - 1) * $result;

             $requete=mysqli_query($connect,"SELECT * FROM RECETTES LIMIT $page_actuel,$result");
             echo '<table class="table table-bordered table-hover">';
             echo '<thead class="table-info">';
             echo '<td>NUMERO</td>';
             echo '<td>NOM</td>';
             echo '<td>INGREDIENT</td>';
             echo '<td>PHOTO</td>';
             echo '<td>DATE INSCRITE</td>';
             echo '<td>MODIFICATION</td>';
             echo '<td>SUPPRESSION</td>';
             echo '</thead>';
             echo '<tbody>';
             if(mysqli_num_rows($requete)>0){
                 while($row=mysqli_fetch_assoc($requete))
                 {
                     echo'<tr>'; 
                     echo'<td>'.$row["idrecette"].'</td>';
                     echo'<td>'.$row["nom"].'</td>';
                     echo'<td>'.$row["ingredients"].'</td>';
                     echo'<td><img class="para" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'"></td>';
                     echo'<td>'.$row["dateinscrite"].'</td>';
                     echo'<td><form action="modifrect.php" method="get"><button name="idrecette" value="'.$row["idrecette"].'">Modifier</button></form></td>';
                     echo'<td><form action="" method="post" onsubmit="return confirmSuppression();"><input type="hidden" name="idrecette" value="'.$row["idrecette"].'"><button name="choix" value="supprimer">Supprimer</button></form></td>';
                     echo'</tr>';
                       
                 }
             }
            echo '</tbody>';
            echo '</table>'; 
            echo'<div>';
            echo'<nav aria-label="Page navigation example">';
            echo'<ul class="pagination">';
            ?>
                <?php for ($i = 1; $i <= $total_pages; $i++) { echo'<li class="page-item">'; ?>
                    <a class="page-link" href="admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php  echo'</li>';} ?>
            <?php
            echo'</nav>';
            echo'</div>';
         }
         catch(Exception $e)
         {
             echo "il n'y a une erreur dans le code de ma connexion";
         }
           
    ?>
    <?php
        if (isset($_POST['choix']) && $_POST['choix'] == 'supprimer') {
            $idrecette = $_POST['idrecette'];
            deleteBD($idrecette);
            echo 'Recette supprimée avec succès';
            header('Location: membre.php');
            exit();
        }
        if(isset($_GET['choix']))
        {
            switch($_GET['choix'])
            {
                case 'ajout':
                    header('Location:ajoutrect.php');
                break;
                case 'ajoutmembre':
                    header('Location:ajout.php');
                break;
            }

        }
        function deleteBD($idrecette) {
            try {
                $connect = mysqli_connect('localhost', 'root', '', 'bonnebouffe');
                echo "connexion réussie <br>";
                mysqli_query($connect, "DELETE FROM RECETTES WHERE idrecette=$idrecette");
            } catch (Exception $e) {
                echo "il y a une erreur dans le code de ma connexion";
            }
        }
        ob_end_flush();
    ?>
    <div class=" d-flex justify-content-between">  
        <p >Ajouter un membre : </p>
        <form action="" method="get">
            <button name="choix" value="ajoutmembre">Ajouter</button>
        </form> 
    </div>
    <?php
        try
        {
            $connect=mysqli_connect('localhost','root','','bonnebouffe');
            echo "connexion réussie <br>";
            $results=10;
            $reqs=mysqli_query($connect,'SELECT COUNT(*) AS total FROM MEMBRES');
            $rows=mysqli_fetch_assoc($reqs);
            $total_page = ceil($rows['total'] / $results);

            $pages = isset($_GET['page']) ? $_GET['page'] : 1;
            $page_actuels = ($pages - 1) * $results;

            $request=mysqli_query($connect,"SELECT * FROM MEMBRES LIMIT $page_actuels,$results");
            echo '<table class="table table-bordered table-hover">';
            echo '<thead class="table-info">';
            echo '<td>NUMERO</td>';
            echo '<td>NOM</td>';
            echo '<td>PRENOM</td>';
            echo '<td>TELEPHONE</td>';
            echo '<td>LOGIN</td>';
            echo '<td>MODIFICATION</td>';
            echo '<td>SUPPRESSION</td>';
            echo '</thead>';
            echo '<tbody>';
            if(mysqli_num_rows($request)>0){
                while($row=mysqli_fetch_assoc($request))
                {
                    echo'<tr>'; 
                    echo'<td>'.$row["idmembre"].'</td>';
                    echo'<td>'.$row["nom"].'</td>';
                    echo'<td>'.$row["prenom"].'</td>';
                    echo'<td>'.$row["telephone"].'</td>';
                    echo'<td>'.$row["login"].'</td>';
                    echo'<td><form action="modifrect.php" method="get"><button name="idmembre" value="'.$row["idmembre"].'">Modifier</button></form></td>';
                    echo'<td><form action="" method="post" onsubmit="return confirmSuppression();"><input type="hidden" name="idmembre" value="'.$row["idmembre"].'"><button name="choix" value="supprimer">Supprimer</button></form></td>';
                    echo'</tr>';
                      
                }
            }
           echo '</tbody>';
           echo '</table>'; 
           echo'<div>';
           echo'<nav aria-label="Page navigation example">';
           echo'<ul class="pagination">';
           ?>
               <?php for ($i = 1; $i <= $total_pages; $i++) { echo'<li class="page-item">'; ?>
                   <a class="page-link" href="admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
               <?php  echo'</li>';} ?>
           <?php
           echo'</nav>';
           echo'</div>';
        }
        catch(Exception $e)
        {
            echo "il n'y a une erreur dans le code de ma connexion";
        }
          
    ?>
    <?php
        if (isset($_POST['choix']) && $_POST['choix'] == 'supprime') {
            $idmembre = $_POST['idmembre'];
            deleteBDD($idmembre);
            echo 'Membre supprimé avec succès';
            header('Location: admin.php');
            exit();
        }
        function deleteBDD($idmembre) {
            try {
                $connect = mysqli_connect('localhost', 'root', '', 'bonnebouffe');
                echo "connexion réussie <br>";
                mysqli_query($connect, "DELETE FROM MEMBRES WHERE idmembre=$idmembre");
            } catch (Exception $e) {
                echo "il y a une erreur dans le code de ma connexion";
            }
        }
    ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>