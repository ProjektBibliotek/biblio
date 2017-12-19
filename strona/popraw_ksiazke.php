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
	<li><a href="usun_ksiazke.php">USUŃ KSIĄŻKI</a></li>
	<li><a href="popraw_ksiazke.php">POPRAW DANE KSIĄŻKI</a></li>
	<li><a href="wypozyczone.php">WYPOŻYCZONE</a></li>
	<li><a href="index.php">POWRÓT</a></li>

</ul>
</div>
  
  <div>
<center>
<?php
echo '<table border="1" cellspacing="0" cellpadding="0" margin-top="20px">';
	echo '<th>ID</th><th>Tytuł</th><th>Imię autora</th><th>Nazwisko autora</th><th>Wydawnictwo</th><th>Rok wydania</th><th>Gatunek</th><th>Wybierz</th>';
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
	<td>".$wiersz['gatunek'].'</td>
	<td><button  onclick="dane(\'' . $wiersz['id_ksiazki'] . '\',\'' . $wiersz['tytul'] . '\',\'' . $wiersz['imie'] . '\',\'' . $wiersz['nazwisko'] . '\',\'' . $wiersz['wydawnictwo'] . '\',\'' . $wiersz['rok'] . '\',\'' . $wiersz['id_gatunku'] . '\');"> Popraw</button></td></tr>';
	}
	echo '</table>';
?></center></div>
<div>
<?php
echo'
<form action="" method="POST">
<table width="300" align="center">
<tr><td align="right">ID:</td>
<td align="right"><input type="text" id="a" name="id"></td>
</tr><tr>
<td align="right">Tytul:</td>
<td align="right"><input type="text" id="b" name="nowy_tytul"></td>
</tr><tr>
<td align="right">Imie autora:</td>
<td align="right"><input type="text" id="c" name="nowy_autor"></td>
</tr><tr>
<td align="right">Nazwisko autora:</td>
<td align="right"><input type="text" id="d" name="nowy_naz"></td>
</tr><tr>
<td align="right">Wydawnictwo:</td>
<td align="right"><input type="text" id="e" name="nowy_wyd"></td>
</tr><tr>
<td align="right">Rok:</td>
<td align="right"><input type="text" id="f" name="nowy_rok"></td>
</tr><tr>
<td align="right">Gatunek:</td>
<td align="left"><select id="g" name="nowy_gatunek">';
$plusik="SELECT * FROM gatunek";
$wykonaj_plusik=mysqli_query($link,$plusik);
while($wiersz=mysqli_fetch_assoc($wykonaj_plusik)) { 
echo '<option value="' . $wiersz["id_gatunku"] . '">' . $wiersz["nazwa"] . '</option>';
}
echo '</td>';


echo '</tr>
<tr>
<font size="16">
<td align="right" colspan="2"><input type="submit" name="popraw" style="font-size: 18px" value="Popraw"></td>
</font>
</tr>
</table>
</form>
<br>';

if (isset($_POST['popraw'])){
$zapytanie = "UPDATE ksiazki set tytul='".$_POST['nowy_tytul']."', imie='".$_POST['nowy_autor']."', nazwisko='".$_POST['nowy_naz']."', wydawnictwo='".$_POST['nowy_wyd']."', rok='".$_POST['nowy_rok']."', gatunek='".$_POST['nowy_gatunek']."' where id_ksiazki='".$_POST['id']."'";
$wykonaj = mysqli_query($link, $zapytanie);
header('Location: popraw_ksiazke.php');
}
?>

</div>

</div>
<header>
</body>
<script>
function dane(a, b, c, d, e, f, g) {
document.getElementById("a").value = a;
document.getElementById("b").value = b;
document.getElementById("c").value = c;
document.getElementById("d").value = d;
document.getElementById("e").value = e;
document.getElementById("f").value = f;
document.getElementById("g").value = g;
}
</script>
</html>