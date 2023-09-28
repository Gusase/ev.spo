<?php
require_once __DIR__ . '/const.php';

$session = new SpotifyWebAPI\Session(
  CLIENT,
  CLIENT_SECRET,
  REDIRECT_URL
);

$state = $_SESSION['state'];

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);

$_SESSION['accessToken'] = $session->getAccessToken();
$_SESSION['refreshToken'] = $session->getRefreshToken();

// Store the access and refresh tokens somewhere. In a session for example

header('Location: https://ev.sptfy.test/');