<?php
ob_start();
session_start();
if(!file_exists("polacz_mnie.php")){
exit;
} else {
include("polacz_mnie.php");
}
?>

<HTML><html>
<head>
<meta charset="utf-8">
<title>Aplikacja COMFORT</title>
<link rel="stylesheet" href="biblio.css">
</head>
<body bgcolor="b3b3b3">
<div align="right" style="font-size: 16px">Jesteś zalogowany jako:<b><?php echo $_SESSION['imie']; ?></b></div>
<div align="right"><a href="wyloguj.php" margin="right 0px">Wyloguj</a></div>

<div id="footer"></div> 
<div class="container">
  
  <h2>ZARZADZAJ BIBLIOTEKĄ</h2>
<div class="pudelko">
<ul id="menu">
	<li><a href="lista_u.php">POWRÓT</a></li>

</ul>
</div>
  
  <div>
<center>
<?php
echo '<table border="1" cellspacing="0" cellpadding="0" margin-top="20px">';
	echo '<th>ID</th><th>Imie</th><th>Nazwisko</th><th>Adres</th><th>Login</th><th>Hasło(md5)</th><th>Wybierz</th>';
	$zapytanie = "select * from czytelnicy";
	$wykonaj = mysqli_query($link, $zapytanie);
	while($wiersz=mysqli_fetch_assoc($wykonaj)) {
	echo " <tr>
	<th>".$wiersz['id_czytelnika']."</th>
	<td>".$wiersz['imie']."</td>
	<td>".$wiersz['nazwisko']."</td>
	<td>".$wiersz['adres']."</td>
	<td>".$wiersz['login']."</td>
	<td>".$wiersz['haslo'].'</td>
	<th><a href="?id_usun='.$wiersz['id_czytelnika'].'"><button>Usuń</button></a></th>';
	}
	echo '</table>';
?></center></div>
<div>
<?php
if (isset($_GET['id_usun'])){
$zapytanie = "Delete from czytelnicy where id_czytelnika='".$_GET['id_usun']."';";
$wykonaj = mysqli_query($link, $zapytanie);
header ('Location:usun_u.php');
}
?>

</div>

</div>
<header>
</body>
</html>