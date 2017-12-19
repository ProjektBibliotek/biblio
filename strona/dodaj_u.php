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
<div>
<?php
echo'
<form action="" method="POST">
<table width="300" align="center">
<tr><td align="right">ID:</td>
<td align="right"><input type="text"  name="id"></td>
</tr><tr>
<td align="right">Imie:</td>
<td align="right"><input type="text"  name="nowe_imie"></td>
</tr><tr>
<td align="right">Nazwisko:</td>
<td align="right"><input type="text"  name="nowe_naz"></td>
</tr><tr>
<td align="right">Adres:</td>
<td align="right"><input type="text"  name="nowy_ad"></td>
</tr><tr>
<td align="right">Login:</td>
<td align="right"><input type="text"  name="nowy_log"></td>
</tr><tr>
<td align="right">Hasło:</td>
<td align="right"><input type="text"  name="nowy_hasz"></td>
</tr>
<tr>
<font size="16">
<td align="right" colspan="2"><input type="submit" name="popraw" style="font-size: 18px" value="Dodaj"></td>
</font>
</tr>
</table>
</form>
<br>';

if (isset($_POST['popraw'])){
$zapytanie = "INSERT INTO czytelnicy values ('".$_POST['id']."','".$_POST['nowe_imie']."', '".$_POST['nowe_naz']."', '".$_POST['nowy_ad']."', '".$_POST['nowy_log']."', '".md5($_POST['nowy_hasz'])."')";
echo $zapytanie;
$wykonaj = mysqli_query($link, $zapytanie);
//header('Location: dodaj_u.php');
}
?>

</div>

</div>
<header>
</body>
</html>