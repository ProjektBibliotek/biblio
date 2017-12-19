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
	<li><a href="listaksiazek.php">LISTA KSIĄŻEK</a></li>
	<li><a href="dodaj_ksiazke.php">DODAJ/USUŃ/POPRAW DANE KSIĄŻKI</a></li>
	<li><a href="listaksiazek.html">WYPOŻYCZONE</a></li>
	<li><a href="index.php">POWRÓT</a></li>

</ul>
</div>
  
  <div>
<center>
<?php
echo '<table border="1" cellspacing="0" cellpadding="0" margin-top="20px">';
	echo "<th>ID</th><th>Tytuł</th><th>Imię autora</th><th>Nazwisko autora</th><th>Wydawnictwo</th><th>Rok wydania</th><th>Gatunek</th>";
	$zapytanie = "select * from ksiazka_gatunek";
	$wykonaj = mysqli_query($link, $zapytanie);
	while($wiersz=mysqli_fetch_assoc($wykonaj)) {
	echo " <tr>
	<th>".$wiersz['id_ksiazki']."</th>
	<td>".$wiersz['tytul']."</td>
	<td>".$wiersz['imie']."</td>
	<td>".$wiersz['nazwisko']."</td>
	<td>".$wiersz['wydawnictwo']."</td>
	<td>".$wiersz['rok']."</td>
	<td>".$wiersz['gatunek']."</td>";
	}
	echo '</table>';
?></center></div>
</div>
<header>
</body>
</html>