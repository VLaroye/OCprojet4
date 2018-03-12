<?php

// On sécurise les valeurs du formulaire
securisation_formulaire();


if (!isset($_SESSION['connected']) || $_SESSION['connected'] == false) {
	if (!empty($_POST['nickname']) && !empty($_POST['password']) && !empty($_POST['password_check']) && !empty($_POST['email']) && $membres_manager->nicknameIsFree($_POST['nickname']) && $_POST['password'] == $_POST['password_check'] && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {

			// On crypte le mot de passe
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			// Création d'un nouvel objet Membre, et ajout à la bdd
			$membre = new Membre(array(
				"nickname" => $_POST['nickname'],
				"pass" => $password,
				"email" => $_POST['email']
			));

			$membres_manager->addNewMembre($membre);

			// On garde les infos en mémoire dans la session
			$_SESSION['nickname'] = $_POST['nickname'];
			$_SESSION['password'] = $password;
			$_SESSION['connected'] = true;

			// On redirige vers la page d'accueil
			header("Location: index.php");

	} else {
		include_once("view/frontend/inscription.php");
	}
} else {
	header("Location: index.php");
}



