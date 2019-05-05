<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        //Ok we got a POST, probably from a FORM, read from $_POST.
        var_dump($_PSOT); //Use this to see what info we got!
    }
    else
    {
       //You could assume you got a GET
       var_dump($_GET); //Use this to see what info we got!
    }
 ?>
<!DOCTYPE html>

<html class="no-js" lang="en">
    <head>
        <meta charset="UTF-8" /> 
        <title>ECE Amazone</title>
        <link rel="stylesheet" type="text/css" href="categcss.css" />
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>	
        function getproductData(productId)
        {
            $.post(                             
                "getItem.php",                     
                {
                    id: productId
                }                               
            ).done(                             
                function(data)
                {
		   var length = 9;
  		   var generatedId = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, length);
                   window.sessionStorage.setItem(generatedId, data);
		   var meta1 = window.sessionStorage.getItem(generatedId);
		   alert(meta1);
                }
            );
        }
    
            $(document).ready(function(){
                 function maBoucle(){
                 setTimeout(function()
                 {
                    //alert('Bonjour ECE Paris!'); // affichera "Bonjour ECE Paris!" toutes les secondes
                    maBoucle(); // relance la fonction
                 }, 1000);
                }
                var $carrousel = $('#carrousel'), // on cible le bloc du carrousel
                $img = $('#carrousel img'), // on cible les images contenues dans le carrousel
                indexImg = $img.length - 1, // on définit l'index du dernier élément
                i = 0, // on initialise un compteur
                $currentImg = $img.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)
                $img.css('display', 'none'); // on cache les images
                $currentImg.css('display', 'block'); // on affiche seulement l'image courante
                $carrousel.append('<div class="controls"> <span class="prev"></span> <span class="next"></span> </div>');
                $('.next').click(function(){ // image suivante
                 i++; // on incrémente le compteur
                 if( i <= indexImg ){
                 $img.css('display', 'none'); // on cache les images
                 $currentImg = $img.eq(i); // on définit la nouvelle image
                 $currentImg.css('display', 'block'); // puis on l'affiche
                }
                else{
                    i=0;
                    $img.css('display', 'none'); // on cache les images
                    $currentImg = $img.eq(i); // on définit la nouvelle image
                    $currentImg.css('display', 'block'); // puis on l'affiche
                }
                });
                $('.prev').click(function(){ // image précédente
                 i--;
                 if( i >= 0 ){
                // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"
                 $img.css('display', 'none');
                 $currentImg = $img.eq(i);
                 $currentImg.css('display', 'block');
                }
                else{
                    i=4;
                    $img.css('display', 'none'); // on cache les images
                    $currentImg = $img.eq(i); // on définit la nouvelle image
                    $currentImg.css('display', 'block'); // puis on l'affiche
                }
                });
                maBoucle(); // on n’oublie pas de lancer la fonction une première fois
                
                /*funtion appearButton(){
                $button = ('.button');
                $button.css('left', 'auto');
                }*/
            });
	</script>
	<script language="javascript">
	function getBasket() {
    	 for (var i=0; i<localStorage.length; i++) {
          var key = localStorage.key(i);
          var item = localStorage.getItem(key);
          var split_item = item.split(',');
          var Id = split_item[1]
          var Prix = split_item[2]
          var Nom = split_item[3]
          $('#panierEce').append("<div class='classname'>Price</div>");
          $('#panierEce').append("< placeholder= Prix />");
          $('#panierEce').append("<div class='classname'>Nom</div>");
          $('#panierEce').append("< placeholder= Nom />");
          }}
	</script>
    </head>
    <body id="page">
        <div class="container">
            <div class="recherche">
                <div class="logo">
                    <a href="accueil1.html">
                        <img src="images/eceamazone.png">
                    </a>
                </div>
                <div class="barre">
                    <form action="#" class="search" id="searchthis" method="get">
                        <input id="search" name="q" type="text" placeholder="Search here ....." />
                        <input id="search-btn" type="submit" value="Rechercher" />
                    </form>
                </div>
            </div>
            <nav>
                <ul id="menu-deroulant">
                    <li><a href="accueil1.html#category">Catégories</a>
                        <ul>
                            <li><a href="Livres.php">Livres</a></li>
                            <li><a href="Vetements.php">Vêtements</a></li>
                            <li><a href="Musica.php">Musique</a></li>
                            <li><a href="SportsetLoisir.php">Sports & Loisir </a></li>
                        </ul>
                    </li>
                    <li><a href="Ventesflash.html">Ventes flash</a></li>
                    <li><a href="Vendre.html">Vendre</a></li>
                    <li><a href="Panier.html">Panier</a></li>
                    <li><a href="loginAdmin.html">Admin</a></li>
                    <li><a href="Moncompte.html">Mon compte</a></li>
                </ul>
            </nav>
        </div>
        <div id="carrousel"> 
                <li><img  src="images/promo1.jpg" width="100%" height="300.jpg"/></li>
                <li><img onmouseover="appearButton(this)" onmouseout="desappearButton(this)"  src="images/promo2.jpg" width="100%" height="300.jpg"/></li>
                <li><img onmouseover="appearButton(this)" onmouseout="desappearButton(this)"  src="images/chat.jpg" width="100%" height="400.jpg"/></li>
                <li><img onmouseover="appearButton(this)" onmouseout="desappearButton(this)"  src="images/france4.jpg" width="100%" height="400.jpg"/></li>
                <li><img onmouseover="appearButton(this)" onmouseout="desappearButton(this)"  src="images/france6.jpg" width="100%" height="400.jpg"/></li>
                <div class="button">
                    <div id="triangleL" class="prev">
                    </div>
                    <div id="triangleR" class="next">
                    </div>
                </div>
        </div>
        <div id="category">

            <div class="Libros">
                <h1> Vêtements </h1>
            </div>

            <div class="container-elmt">
                <div class="element">
                    <div class="sous-element">
                        <img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 3,3"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg">
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 3,3";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p><br />
			<input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(301)">
                    </div>
                </div>
            <div class="container-elmt">
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(1)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 1,1"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 1,1";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(2)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 2,2"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 2,2";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(3)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 3,3"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 3,3";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(4)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 4,4"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 4,4";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(5)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 5,5"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 5,5";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(6)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 6,6"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 6,6";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(7)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 7,7"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 7,7";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(8)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 8,8"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 8,8";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(9)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 9,9"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 9,9";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(10)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 10,10"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 10,10";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(11)">
                    </div>
                </div>
                <div class="element">
                    <div class="sous-element">
                        <a href="javascript:visibilite('aff1');"><img src="<?php $q = isset($_GET["q"])? $_GET["q"] : ""; $database = "amazon"; $db_handle = mysqli_connect('localhost', 'root', ''); $db_found = mysqli_select_db($db_handle, $database); if ($db_found) { $sql = "SELECT item.Photo FROM item, vetement WHERE item.Id=vetement.Id LIMIT 11,11"; if ($q != "") { $sql .= " AND Nom LIKE '%$q%'"; } $result = mysqli_query($db_handle, $sql); $data = mysqli_fetch_assoc($result); echo $data['Photo']; } mysqli_close($db_handle); ?>" width="za158.jpg" height="188.jpg"></a>
                    </div>
                    <div class="data">
                        <p>
                            <?php
                                $q = isset($_GET["q"])? $_GET["q"] : "";
                                $database = "amazon";
                                $db_handle = mysqli_connect('localhost', 'root', '');
                                $db_found = mysqli_select_db($db_handle, $database);
                                if ($db_found) {
                                    $sql = "SELECT item.Nom FROM item, vetement WHERE item.Id=vetement.Id LIMIT 11,11";
                                    if ($q != "") {
                                        $sql .= " AND Nom LIKE '%$q%'";
                                    }
                                    $result = mysqli_query($db_handle, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['Nom'];
                                    } 
                                mysqli_close($db_handle);
                                ?>
                        </p>
            <input type="button" name="button1" value= "Ajouter"style=" margin-left:20px;", onclick="getproductData(12)">
                    </div>
                </div>
            </div>
        </div>
        <div id="bot"> 
            <ul id="bottom">
                <li><p>
                        Nos différentes catégories
                    </p>
                    <ul>
                        <li><a href="Livres.php">Livres</a></li>
                        <li><a href="Vetements.php">Vêtements</a></li>
                        <li><a href="Musica.php">Musique</a></li>
                        <li><a href="SportsetLoisir.php">Sports & Loisir </a></li>
                    </ul>
                </li>
                <li><p>
                        Devenir vendeur
                    </p>
                    <ul>
                        <li><a href=".html">Vendre sur Ece Amazone</a></li>
                        <li><a href="#">Devenir partenaire</a></li>
                    </ul>
                </li>
                <li>
                    <p>
                        Une question ?
                    </p>
                    <ul>
                        <li><a href=".html">FAQ</a></li>
                        <li><a href="mailto:ece.amazone@gmail.com">ece.amazone@gmail.com</a></li>
                        <li>01 02 03 04 05</li>
                    </ul>
                </li>>
            </ul>
        </div>
         <div id="footer">Copyright &copy; 2019, Ece Amazone<br>
         <a href="mailto:ece.amazone@gmail.com">ece.amazone@gmail.com</a>
         </div>
</body>
</html>
