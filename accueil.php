<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page</title>
    <style> 
   .background-image { 
    position: relative; 
    width: 100%; 
    height: 100vh; 
    background-image: url('./images/resto10.jpg');/*1,7,9,10,13,15 */
    background-size: cover; 
    background-position: center; }
    .navbar-custom { 
        position: absolute; 
        background: rgba(0, 0, 0, 0.5); 
        overflow: hidden;
        }   
    .navbar-custom .title{
        color:white;  
        font-size:50px;
        font-family: "Montserrat";

    }
    .navbar-custom .navbar-nav .nav-link { 
        font-size:20px;
        color: white;
     }
     .arg{
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
        display: flex; 
        justify-content: space-around; 
        width: 100%; 
        color: white; 
         padding: 0; 
         margin: 0;

     }
     .arg li{
        padding: 10px; 
        border-radius: 5px;
        font-size: 70px;
        font-family: "Algerian",sans-serif;
        text-decoration:underline;
        text-decoration-thickness: 2px;
     }
     .navbar-custom li:hover{
        color: white; 
        text-decoration: underline;
     }
     .container p{
        position: absolute; 
        top: 70%; 
        left: 15.5cm;
        color:white;

     }
     .container h1{
        position: absolute; 
        top: 65%; 
        left: 15cm;
        color:white;
        font-size: 25px;
     }
     .cont1 .h11{
        position: absolute; 
        left: 40%;
        font-family: "Montserrat";

     }
     
     .cont1 .h12{
        position: absolute; 
        top: 22cm;
        left: 37%;
        font-family: "Montserrat";

     }
     .cont1 img{
        position: absolute; 
        top: 25cm;
        left: 28%;
        font-family: "Montserrat";

     }

     
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   
    <div class="background-image"> 
        <nav class="navbar navbar-expand-lg navbar-custom fixed-top"> 
            <a class="navbar-brand title"  href="#">Site Bonne Bouffe</a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> 
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav"> 
                <ul class="navbar-nav ">
                     <li class="nav-item"> <a class="nav-link" href="accueil.php">HomePage</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="login.php">Login</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="index.php">Recipes</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="contact.php">Contacts</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="references.php">References</a> </li> 
                    </ul>
                </ul> 
            </div> 
        </nav> 
      <div class="container">
        <ul class="list-unstyled arg">
            <li class="list-inline-item">EAT</li>
            <li class="list-inline-item">DRINK</li>
            <li class="list-inline-item">VISIT</li>
        </ul>
        <h1 class="d-flex justify-content-center">  INTERNATIONAL CUISINE</h1>
        <p >12, Rue de la Bonne Bouffe, Montreal</p>
      </div>

    </div>

        <div class="cont1">
            <br><br>
            <h1 class="h11">Welcome</h1>
            <h1 class="h12">Good Food Site</h1>
            <img src="./images/fc1.jpg">
        </div>
   
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>