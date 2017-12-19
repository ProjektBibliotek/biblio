<?php

  $host="127.0.0.1";
  $db_user="biblio";
  $db_password="Biblio123#";
  $database="biblio";
  $link=mysqli_connect($host,$db_user,$db_password,$database);
  mysqli_set_charset( $link, 'utf8');

?>