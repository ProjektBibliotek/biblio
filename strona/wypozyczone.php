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
	<li><a href="dodaj_ksiazke.php">DODAJ KSIĄŻKĘ</a></li>
	<li><a href="usun_ksiazke.php">USUŃ KSIĄŻKĘ</a></li>
	<li><a href="popraw_ksiazke.php">POPRAW DANE KSIĄŻKI</a></li>
	<li><a href="wypozyczone.php">WYPOŻYCZONE</a></li>
	<li><a href="index.php">POWRÓT</a></li>

</ul>
</div>
  
  <div>
<center>
<?php
echo '<table border="1" cellspacing="0" cellpadding="0" margin-top="20px">';
	echo "<td>ID</td><td>Tytuł</td><td>Użytkownik</td><td>Data wypożyczenia</td><td>Data zwrotu</td><td>Stan wypożyczenia</td>";
	$zapytanie = "select * from wypozyczone";
	$wykonaj = mysqli_query($link, $zapytanie);
	while($wiersz=mysqli_fetch_assoc($wykonaj)) {
	if ($wiersz['stan_wypozyczenia'] !== 0) $stan="Zakończono"; else $stan="Trwa";
	echo " <tr>
	<td>".$wiersz['id_wypozyczenia']."</td>
	<td>".$wiersz['tytul']."</td>
	<td>".$wiersz['login']."</td>
	<td>".$wiersz['data_wypozyczenia']."</td>
	<td>".$wiersz['data_zwrotu']."</td>
	<td>".$stan."</td>";
	}
	echo '</table>';
?></center></div>

</div>
<header>
</body>
</html>