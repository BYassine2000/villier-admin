<?php
require_once 'core/session.php'; // Inclure le chemin vers la classe Session

// Instancier la classe Session
$session = new Session();

// Détruire la session
$session->destroy();
?>
