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
	<li><a href="lista_u.php">LISTA UŻYTKOWNIKÓW</a></li>
	<li><a href="dodaj_u.php">DODAJ UŻYTKOWNIKA</a></li>
	<li><a href="usun_u.php">USUŃ UŻYTKOWNIKA</a></li>
	<li><a href="popraw_u.php">POPRAW DANE UŻYTKOWNIKA</a></li>
	<li><a href="index.php">POWRÓT</a></li>

</ul>
</div>
  
  <div>
<center>
<?php
echo '<table border="1" cellspacing="0" cellpadding="0" margin-top="20px">';
	echo '<th>ID</th><th>Imie</th><th>Nazwisko</th><th>Adres</th><th>Login</th><th>Hasło(md5)</th>';
	$zapytanie = "select * from czytelnicy";
	$wykonaj = mysqli_query($link, $zapytanie);
	while($wiersz=mysqli_fetch_assoc($wykonaj)) {
	echo " <tr>
	<th>".$wiersz['id_czytelnika']."</th>
	<td>".$wiersz['imie']."</td>
	<td>".$wiersz['nazwisko']."</td>
	<td>".$wiersz['adres']."</td>
	<td>".$wiersz['login']."</td>
	<td>".$wiersz['haslo'].'</td>';
	}
	echo '</table>';
?></center></div>


</div>
<header>
</body>
</html>