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
	echo "<td>ID</td><td>Tytuł</td><td>Imię autora</td><td>Nazwisko autora</td><td>Wydawnictwo</td><td>Rok wydania</td><td>Gatunek</td>";
	$zapytanie = "select * from ksiazka_gatunek";
	$wykonaj = mysqli_query($link, $zapytanie);
	while($wiersz=mysqli_fetch_assoc($wykonaj)) {
	echo " <tr>
	<td>".$wiersz['id_ksiazki']."</td>
	<td>".$wiersz['tytul']."</td>
	<td>".$wiersz['imie']."</td>
	<td>".$wiersz['nazwisko']."</td>
	<td>".$wiersz['wydawnictwo']."</td>
	<td>".$wiersz['rok']."</td>
	<td>".$wiersz['gatunek']."</td>";
	}
	echo '</table>';
?></center></div>
<div>
<?php
echo'
<form action="dodaj_ksiazke.php" method = "POST">
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
<td align="right" colspan="2"><input type="submit" name="dodaj" style="font-size: 18px" value="Dodaj"></td>
</font>
</tr>
</table>
</form>
<br>

';

if (isset($_POST['dodaj'])){
$zapytanie = "insert into ksiazki values('".$_POST['id']."','".$_POST['nowy_tytul']."','".$_POST['nowy_autor']."','".$_POST['nowy_naz']."','".$_POST['nowy_wyd']."','".$_POST['nowy_rok']."','".$_POST['nowy_gatunek']."')";
$wykonaj = mysqli_query($link, $zapytanie);
}
?>

</div>
</div>
<header>
</body>
</html>