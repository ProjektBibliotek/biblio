<?php
ob_start();
session_start();
//plik do connectu z bazom
if(!file_exists("polacz_mnie.php")){
exit;
} else {
include("polacz_mnie.php");
}

if(isset($_POST['stan'])) {
//jesli zmienna istnieje
if(isset($_POST['login'])) {
$haslo = md5($_POST[haslo]);
$zapytanie_p="SELECT * FROM pracownicy WHERE login='$_POST[login]' AND haslo='$haslo'";
$zapytanie_c="SELECT * FROM czytelnicy WHERE login='$_POST[login]' AND haslo='$haslo'";
$wykonaj_p=mysqli_query($link,$zapytanie_p);
$wykonaj_c=mysqli_query($link,$zapytanie_c);

if(@mysqli_num_rows($wykonaj_p)){
while($wiersz=mysqli_fetch_assoc($wykonaj_p)) {
$_SESSION['zalogowany'] = "ok";
$_SESSION['login'] = $wiersz[login];
$_SESSION['kto'] = 'pracownik';
$_SESSION['id'] = $wiersz[id_pracownika];
$_SESSION['imie'] = $wiersz[imie];
}
}

if(@mysqli_num_rows($wykonaj_c)){
while($wiersz=mysqli_fetch_assoc($wykonaj_c)) {
$_SESSION['zalogowany'] = "ok";
$_SESSION['login'] = $wiersz[login];
$_SESSION['kto'] = 'czytelnik';
$_SESSION['id'] = $wiersz[id_czytelnik];
$_SESSION['imie'] = $wiersz[imie];
}
}


}
}
?>

<HTML><html>
<head>
<meta charset="utf-8">
<title>BIBLIOTEKA - STRONA GŁÓWNA</title>
<style>
tr {
	text-align: center;
}
</style>
<link rel="stylesheet" href="biblio.css">
</head>
<body bgcolor="b3b3b3">

<div id="footer"></div> 
<div class="container">
  

<header>
<h1> BIBLIOTEKA </h1>
</header>

<h2>Witamy w aplikacji, proszę zaloguj się</h2>
<?php

if (isset ($_SESSION['zalogowany'])) {
if ($_SESSION['zalogowany'] == "ok") {
switch($_SESSION['kto'])
	{
	case "pracownik":
	header('Location: menu_pracownik.php');
	break;
	case "czytelnik":
	header('Location: menu_czytelnik.php');
	break;
	}

}
} else {
echo'
<form action="" method="POST">
<table width="250" align="center">
<tr>
<td align="right">Login:</td>
<td align="right"><input type="text" name="login"></td>
</tr><tr>
<td align="right">Hasło:</td>
<td align="right"><input type="password" name="haslo"></td>
</tr>
<tr>
<font size="16">
<td align="right" colspan="2"><input type="submit" name="stan" style="font-size: 18px" value="Zaloguj"></td>
</font>
</tr>
</table>
</form>
<br>

';
}

?>


<footer><a href="index.php">Copyright &copy; Ł.Wojtas, P.Pieniążek, K.Pasiut, M.Zygmunt, G.Wygoda</a></footer>

</div>
</body>
</html>
