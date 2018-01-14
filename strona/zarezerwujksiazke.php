<HTML><html>
<head>
<meta charset="utf-8">
<title>REZERWACJA</title>
<link rel="stylesheet" href="biblio.css">
</head>
<body bgcolor="b3b3b3">

<div id="footer"></div> 
<div class="container">
  <div>
<center>
<?php
echo '<table border="1" cellspacing="0" cellpadding="0" margin-top="20px">';
	echo '<th>ID</th><th>Tytuł</th><th>Imię autora</th><th>Nazwisko autora</th><th>Wydawnictwo</th><th>Rok wydania</th><th>Gatunek</th><th>Wybierz</th>';
	$zapytanie = "select * from ksiazka_gatunek where id_ksiazki not in (select id_ksiazki from wypozyczenia where stan_wypozyczenia = 0) order by id_ksiazki";
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
	<th><a href="?id_rezer='.$wiersz['id_ksiazki'].'"><button>Zarezerwuj</button></a></th>';
	}
	echo '</table>';
?></center></div>
<div>
<?php

if (isset($_GET['id_rezer'])){
$zapytanie = "INSERT INTO rezerwacje VALUES ('".$_GET['id_rezer']."','".$_SESSION['id']."')";
$wykonaj = mysqli_query($link, $zapytanie);
header('Location: wypozyczenia_u.php');
}


?>
</div>  


</body>
</html>