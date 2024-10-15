<?php

require_once 'personne.php';

$personne1 = new Personne("Gontier" , 35  ,"Martha");
$personne2 = new Personne("Martin" , 25, "Alice");


echo $personne1 ->getAge(). "\n" ;

$personne1 -> setAge(40);

echo $personne1 ->getAge();