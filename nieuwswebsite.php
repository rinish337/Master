<!DOCTYPE html>
<head>
<title>RD </title>
<link rel="stylesheet" href= "styles1.css"> 
</head>
<body>
    <div>
      RD
</div> 

<script>
alert("Op deze nieuwswebsite kunt een reactie op het nieuws achterlaten. Let wel op dat u niet gaat haatzaaien.");

document.write("Welkom op de nieuwswebsite van de RD");
confirm("Weet u zeker dat u door wilt gaan.");

</script>

</body>
</html>

<br>

<?php
// casus 2
try {
    $db = new PDO("mysql:host=localhost;dbname=nieuws", 
                  "root", "");
    $query = $db->prepare("SELECT * FROM categorieen");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        echo "<a href='hetnieuws.php?id=" . $data ['id'] . "'>";
        echo $data['nieuwscategorie'];
        echo "</a>";
        echo "<br>";
        }
}  catch (PDOException $e){
    die("Error!:" . $e->getMessage());
}
?>





<!DOCTYPE html>
<head>
<title>RD </title>
<link rel="stylesheet" href= "styles1.css"> 
</head>
<body>
<div>
      RD
</div> 
</body>
</html>
<?php
// casus 2
session_start();
try {
    $db = new PDO("mysql:host=localhost;dbname=nieuws", 
                  "root", "");
    $query = $db->prepare("SELECT * FROM  categorieen WHERE id = ". $_GET['id']);
    $query->execute();
    $result = $query-> fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        echo"Titel:" . $data['Titel'] . "<br>";
        echo"Artikel:" . $data['Artikel'] . "<br>";
    }
} catch (PDOException $e){
    die("Error!: " . $e->getMessage());
}

    echo "<br>";

    try {
        $db = new PDO("mysql:host=localhost;dbname=nieuws", 
                      "root", "");
    if(isset($_POST['verzenden'])) {
        $categorieen = filter_input (INPUT_POST, "categorieen", FILTER_SANITIZE_STRING);
        $Titel = filter_input (INPUT_POST, "Titel", FILTER_SANITIZE_STRING);
        $Artikel = filter_input (INPUT_POST, "Artikel", FILTER_SANITIZE_STRING);
      $query = $db->prepare("UPDATE  SET id = bewerken
                            WHERE ". $_GET['id']);
                            if($query->execute()) {
                              echo "De nieuwe gegevens zijn toegevoegd.";
                      
                      } else {
                              echo "Er is een fout opgetreden!";
                          } 
                        }
                    } catch (PDOException $e){
                        die("Error!: " . $e->getMessage());
                    }
                    try {
                        $db = new PDO("mysql:host=localhost;dbname=nieuws", 
                                      "root", "");
                        $query = $db->prepare("INSERT INTO categorieen (naam, reactie) VALUES ('Paul van der Broek','" . ("Goede nieuwswebsite") . "') ");
    if(isset($_POST['verzenden'])) {
        echo $_POST['naam'];
        echo "<br>";
        echo $_POST['reactie'];
    }
    if ($query->execute()) {
        echo "De nieuwe gegevens zijn toegevoegd.";

} else {
        echo "Er is een fout opgetreden!";
    } 
} catch (PDOException $e){
    die("Error!: " . $e->getMessage());
}

echo "<br>";

if(isset($_SESSION['view']))
{
    $_SESSION['view']=$_SESSION['view']+1;
}
else
{
    $_SESSION['view']=1;
}
echo "Pagina bekeken ".$_SESSION['view'];

?>
<!DOCTYPE html>
<head>

</head>
<body>

<input type="categorieen" name="naam"></br>
<input type="Titel" name="naam"></br>
<input type="Artikel" name="naam"></br>
<input type="submit"id="resultaat" value="verzenden"/> 

<input type="naam" name="naam"></br>
<input type="reactie" name="naam"></br>
<input type="submit"id="resultaat" value="verzenden"/> 

<div class="link-area">
  <a href="https://www.youtube.com/?hl=nl&gl=NL" target="_blank">Deel met YouTube</a>
</div>

</body>
</html>
<a href="nieuwswebsite.php">Ga terug naar de hoofdpagina</a>
