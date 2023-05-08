<?php

// Nouvelle session
session_start();

// Récupérer les données
$email = $_POST['email'];
$password = $_POST['password'];
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$adress = $_POST['adress'];
$city = $_POST['city'];
$birthDate = $_POST['birthDate'];
$phoneNumber = $_POST['phoneNumber'];

// Stocker les données dans la session
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['lastName'] = $lastName;
$_SESSION['firstName'] = $firstName;
$_SESSION['adress'] = $adress;
$_SESSION['city'] = $city;
$_SESSION['birthDate'] = $birthDate;
$_SESSION['phoneNumber'] = $phoneNumber;
	
// Redirection vers une page de confirmation
header("Location: ../public/html/inscription2.html");
?>
