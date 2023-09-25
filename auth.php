<?php

use SpotifyWebAPI\Session;
session_start();
require 'vendor/autoload.php';

$session = new Session(
  '9d0a604233784f4d90f9501ceac20511',
  '40335a95d1374c6699f9e0463da046eb'
);

$session->requestCredentialsToken();
$_SESSION['accessToken'] = $session->getAccessToken();

// Store the access token somewhere. In a database for example.

// Send the user along and fetch some data!
header('Location: app.php');
die();
