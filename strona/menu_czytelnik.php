<?php
ob_start();
session_start();
if ($_SESSION['kto'] !== 'czytelnik'){
	header('location: index.php');
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
   <h2>ZARZADZAJ SWOIM KONTEM</h2>
<div class="pudelko">
<ul id="menu">
	<li><a href="zarezerwujksiazke.php">ZAREZERWUJ KSIĄŻKĘ</a></li>
	<li><a href="wypozyczenia_u.php">MOJE WYPOŻYCZENIA</a></li>
</ul>
</div> 



</body>
</html>