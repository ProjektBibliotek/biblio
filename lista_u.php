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
	<li><a href="listaksiazek.php">LISTA UŻYTKOWNIKÓW</a></li>
	<li><a href="dodaj_ksiazke.php">DODAJ UŻYTKOWNIKA</a></li>
	<li><a href="usun_ksiazke.php">USUŃ UŻYTKOWNIKA</a></li>
	<li><a href="popraw_ksiazke.php">POPRAW DANE UŻYTKOWNIKA</a></li>
	<li><a href="index.php">POWRÓT</a></li>

</ul>
</div>
  
  <div>
<center>
<?php
//prawie gotowy skrypt
echo '<table border="1" cellspacing="0" cellpadding="0" margin-top="20px">';
	echo "<td>ID</td><td>Tytuł</td><td>Imię autora</td><td>Nazwisko autora</td><td>Wydawnictwo</td><td>Rok wydania</td><td>Gatunek</td>";
	$zapytanie = "select * from uzytkownicy";
	$wykonaj = mysqli_query($link, $zapytanie);
	while($wiersz=mysqli_fetch_assoc($wykonaj)) {
	echo " <tr>
	<td>".$wiersz['id_uzytkownika']."</td>
	<td>".$wiersz['imie']."</td>
	<td>".$wiersz['nazwisko']."</td>
	<td>".$wiersz['adres']."</td>";
	}
	echo '</table>';
?></center></div>
<div>
<?php
echo'
<form action="lista_u.php" method = "POST">
<table width="250" align="center">
<tr>
<td align="right">ID:</td>
<td align="right"><input type="text" name="id"></td>
</tr><tr>
<td align="right">Tytul:</td>
<td align="right"><input type="text" name="nowy_tytul"></td>
</tr><tr>
<td align="right">Imie autora:</td>
<td align="right"><input type="text" name="nowy_autor"></td>
</tr><tr>
<td align="right">Nazwisko autora:</td>
<td align="right"><input type="text" name="nowy_naz"></td>
</tr><tr>
<td align="right">Wydawnictwo:</td>
<td align="right"><input type="text" name="nowy_wyd"></td>
</tr><tr>
<td align="right">Rok:</td>
<td align="right"><input type="text" name="nowy_rok"></td>
</tr><tr>
<td align="right">Gatunek:</td>
<td align="right"><input type="text" name="nowy_gatunek"></td>
</tr>
<tr>
<font size="16">
<td align="right" colspan="2"><input type="submit" name="popraw" style="font-size: 18px" value="Popraw"></td>
</font>
</tr>
</table>
</form>
<br>

';

if (isset($_POST['popraw'])){
$zapytanie = "";
$wykonaj = mysqli_query($link, $zapytanie);
}
?>

</div>

</div>
<header>
</body>
</html>