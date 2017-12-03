<?php
ob_start();
session_start();
if ($_SESSION['kto'] !== 'pracownik'){
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
  

<header>
Zarządzanie czytelnikiem
</body>
</html>