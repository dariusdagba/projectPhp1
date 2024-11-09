<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div>
        <form action="" method="POST">
            <h1 class="">Membre</h1>
        <label for="login">Last Name</label>
        <input type="text" name="loginmemb" placeholder="login"><br><br>
        <label for="password">Password</label>
        <input type="password" name="passwordmemb" placeholder="Password"><br><br>
        <button type="submit">Entrer</button> <a href="register.php">Non membre</a>
        </form>
            <br>
        <form action="" method="POST">
            <h1 class="">Administrateur</h1>
        <label for="login">Last Name</label>
        <input type="text" name="loginAdmin" placeholder="login"><br><br>
        <label for="password">Password</label>
        <input type="password" name="passwordAdmin" placeholder="Password"><br><br>
        <button type="submit">Entrer</button> 
        </form>
    </div>
    

    <?php
        session_start();
        if(isset($_POST['loginmemb']) && isset($_POST['passwordmemb']))
        {
            $_SESSION['loginmemb']=$_POST['loginmemb'];
            $_SESSION['passwordmemb']=$_POST['passwordmemb'];
            echo "Le login de l'utilisateur est : ".$_POST['loginmemb'];
            echo"<br>";
            echo "Le prelogin de l'utilisateur est : ".$_POST['passwordmemb'];
            echo"<br>";
            loginBDD($_POST['loginmemb'],$_POST['passwordmemb']);

            
    
        }
        else
        {
            echo "Aucune donnée recue <br>";
        }
        
        function loginBDD($login,$passwd){
            try
            {
                $connect=mysqli_connect('localhost','root','','bonnebouffe');
                echo "connexion réussie <br>";
                $req=mysqli_query($connect,"SELECT * FROM MEMBRES WHERE login='$login' AND password='$passwd'");
                if(mysqli_num_rows($req)>0)
                {
                    echo "vous êtes connecté";
                    header('Location:membre.php');
                    exit();
                }
                else
                {
                    echo "login ou mot de passe erroné";
                    header('Location:register.php');
                    exit();
                }

            }
            catch(Exception $e)
            {
                echo "login  ou mot de passe incorrect !";
            }
        }
       
    ?>
    <?php
        if(isset($_POST['loginAdmin']) && isset($_POST['passwordAdmin']))
        {
            $_SESSION['loginAdmin']=$_POST['loginAdmin'];
            $_SESSION['passwordAdmin']=$_POST['passwordAdmin'];
            echo "Le login de l'utilisateur est : ".$_POST['loginAdmin'];
            echo"<br>";
            echo "Le prelogin de l'utilisateur est : ".$_POST['passwordAdmin'];
            echo"<br>";
            loginBD($_POST['loginAdmin'],$_POST['passwordAdmin']);

            
    
        }
        else
        {
            echo "Aucune donnée recue ";
        }
        
        function loginBD($login,$passwd){
            try
            {
                $connect=mysqli_connect('localhost','root','','bonnebouffe');
                echo "connexion réussie <br>";
                $req=mysqli_query($connect,"SELECT * FROM ADMIN WHERE login='$login' AND password='$passwd'");
                if(mysqli_num_rows($req)>0)
                {
                    echo "vous êtes connecté";
                    header('Location:index.php');
                    exit();
                }
                else
                {
                    echo "login ou mot de passe erroné";
                    header('Location:register.php');
                    exit();
                }

            }
            catch(Exception $e)
            {
                echo "login  ou mot de passe incorrect !";
            }
        }
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>