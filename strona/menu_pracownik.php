<?php
ob_start();
session_start();
if ($_SESSION['kto'] !== 'pracownik') 
{
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
<div align="right" style="font-size: 16px">Jesteś zalogowany jako:  <b><?php echo $_SESSION['imie']; ?></b></div>
<div align="right"><a href="wyloguj.php" margin="right 0px">Wyloguj</a></div>

<div id="footer"></div> 
<div class="container">
  
  <h2>ZARZADZAJ BIBLIOTEKĄ</h2>
<div class="pudelko">
<ul id="menu">
	<li><a href=""><b>KSIĄŻKI</b></a>
		<ul class="to">
			<li><a href="listaksiazek.php">LISTA KSIĄŻEK</a></li>
			<li><a href="dodaj_ksiazke.php">DODAJ/USUŃ/POPRAW DANE KSIĄŻKI</a></li>
			<li><a href="wypozyczone.php">WYPOŻYCZONE</a></li>
		</ul>
	</li>
	<li><a href=""><b>CZYTELNICY</b></a>
		<ul class="to">
			<li><a href="lista_u.php">POKAŻ KONTA CZYTELNIKÓW</a></li>
			<li><a href="dodaj_u.php">UTWÓRZ NOWE KONTO CZYTELNIKA</a></li>
			<li><a href="popraw_u.php">USUŃ/POPRAW KONTA CZYTELNIKÓW</a></li>
		</ul>
	</li>

</ul>
</div>
  
  
</div>
<header>
</body>
</html>