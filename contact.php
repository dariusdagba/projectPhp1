<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-Page</title>
    <style>
    .navbar-custom { 
        position: absolute; 
        background:rgba(0, 0, 0, 0.5);
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
     .navbar-custom li:hover{
        color: white; 
        text-decoration: underline;}
     .cont h1{
        position: absolute; 
        top: 25%; 
        left: 13cm;
        font-size:40px;
        color: black;
     }
     .cont p{
        position: absolute; 
        top: 32%; 
        left: 12.5cm;
        font-size: 30px;
        color: black;

     }
     .cont .social-icons { 
        display: flex;
        position: absolute;  
        top: 10cm;
     }    
     .cont .pp{
        position: absolute; 
        top: 37%; 
        left:15cm;
        font-size: 30px;
        color:blue;
     }
     
     .custom-input { 
        border: 10px black; 
        padding: 10px; 
        border-radius: 5px; 
        font-size: 16px; 
        border-color: black;
     } 
     .form-label{
        color: black;
     }
   
    footer { 
        
        background-color: #333; 
        color: white; 
        text-align:  center; 
        padding: 20px 0; 
        position: absolute; 
        top: 45cm;
        width: 100%; 
    }
    .img{
        margin-top: 12cm;
        
    }
    .cont .button{
        position: absolute; 
        top: 45%; 
        left:17cm;
        font-size: 30px;
        background-color:blue;
        color: white;
    }
    .cont .icon{
        position: absolute; 
        top: 53%; 
        left:18cm;
        }
    .c1{
       margin-top: 5cm;
     }
     
    .c1 .c2{
            border-color:  black;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div > 
        <nav class="navbar navbar-expand-lg navbar-custom fixed-top"> 
            <a class="navbar-brand title"  href="#">Site Bonne Bouffe</a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> 
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav"> 
                <ul class="navbar-nav">
                     <li class="nav-item"> <a class="nav-link" href="accueil.php">HomePage</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="login.php">Login</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="index.php">Recipes</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="contact.php">Contacts</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="references.php">References</a> </li> 
                </ul> 
            </div> 
        </nav> 
    </div>
    <div class="cont">
        <h1>  INTERNATIONAL CUISINE</h1>
        <p>12, Rue de la Bonne Bouffe, Montreal</p>
        <p class="pp">dariogbadoo@gmail.com</p>
        <button class="button" >Contact us</button>
        <ul class="icon list-unstyled  d-flex list-inline-item ">
            <li><a href="https://www.facebook.com" target="_blank" class="fab fa-facebook-f fa-2x list-inline-item"></a></li> 
            <li><a href="https://www.twitter.com" target="_blank" class="fab fa-twitter fa-2x list-inline-item"></a></li> 
            <li><a href="https://www.instagram.com" target="_blank" class="fab fa-instagram fa-2x list-inline-item"></a></li> 
       </ul>
    </div>

        <div class=" d-flex justify-content-center img">
          
          <img src="./images/imagecon.png">

        </div>
        
        <div class="c1 d-flex justify-content-center" >
            <form style="border: 5px solid black; padding: 20px;">
                <h1>Reserve your spot for the Temple of Flavors!!!</h1><br><br>

            <div class="mb-3 c2 ">
                <label for="exampleInputname" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputname"  class="custom-input">
                <label for="exampleInputsurname" class="form-label">Surname</label>
                <input type="text" class="form-control" id="exampleInputsurname" class="custom-input">
              <label for="exampleInputEmail1" class="form-label" >Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" class="custom-input">
            </div>
            <div class="mb-3 c2">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1"  >
            </div>
            <div class="mb-3 form-check c2">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
   <footer>
    <div>
        <div class=" d-flex justify-content-around">
            <div class="p">
                <p>Contact</p>
                <p>123 Demo Street</p>
                <p> New York, NY 12345</p>
                <p>Dariogba@gmail.com</p>
                <p>(555) 555-5555</p>
            </div>
            <div class="p"> 
                <p> Hours</p>
                <p>Mon–Wed 6–11</p>
                <p>Thu–Sat 4–12</p>
                <p>Sun 3–10</p>
            </div>
            <div class="p"> 
                <p>Make a Reservation</p>
                <p>Juniper</p>
                <p>Made with Squarespace</p>
                <ul class="icon list-unstyled  d-flex list-inline-item justify-content-between">
                    <li><a href="https://www.facebook.com" target="_blank" class="fab fa-facebook-f fa-2x list-inline-item"></a></li> 
                    <li><a href="https://www.twitter.com" target="_blank" class="fab fa-twitter fa-2x list-inline-item"></a></li> 
                    <li><a href="https://www.instagram.com" target="_blank" class="fab fa-instagram fa-2x list-inline-item"></a></li> 
               </ul>
               
            </div>
              
        </div>
       
   </footer>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>