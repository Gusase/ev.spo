<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/const.php';

$session = new SpotifyWebAPI\Session(
  CLIENT,
  CLIENT_SECRET,
  REDIRECT_URL
);

$_SESSION['state'] = $session->generateState();
$options = [
  'scope' => [
    'user-read-email',
    'playlist-read-private',
    'playlist-read-collaborative',
    'user-read-email',
    'streaming',
    'user-read-private',
    'user-library-read',
    'user-top-read',
    // 'user-library-modify'
    'user-read-playback-state',
    'user-modify-playback-state',
    'user-read-currently-playing',
    'user-read-recently-played',
    'user-read-playback-state',
    'user-follow-read',
  ],
  'state' => $_SESSION['state'],
];
