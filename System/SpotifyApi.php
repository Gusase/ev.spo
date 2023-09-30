<?php

use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

require_once __DIR__ . '/../vendor/autoload.php';
/**
 * 
 * bingung gw njir
 */
class SpotifyApi
{
  private $session;

  public function __construct()
  {
    $this->session = new Session(CLIENT, CLIENT_SECRET, REDIRECT_URL);
    if (isset($_SESSION['login'])) {
      $_SESSION['me'] = $this->api()->me();
    }
    // if ($accessToken) {
    //   $this->session->setAccessToken($accessToken);
    //   $this->session->setRefreshToken($refreshToken);
    // }
  }

  public function auth(): void
  {
    $_SESSION['state'] = $this->session->generateState();
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

    header('Location: ' . $this->session->getAuthorizeUrl($options));
    exit;
  }

  public function callback(): void
  {
    // Request a access token using the code from Spotify
    $this->session->requestAccessToken($_GET['code']);

    $_SESSION['accessToken'] = $this->session->getAccessToken();
    $_SESSION['refreshToken'] = $this->session->getRefreshToken();

    // Store the access and refresh tokens somewhere. In a session for example

    $_SESSION['login'] = true;
  $_SESSION['auth'] = 'success';
    header('Location: https://ev.sptfy.test/');
    exit;
  }

  public function api(): SpotifyWebAPI
  {
    if (isset($_SESSION['accessToken'])) {
      $this->session->setAccessToken($_SESSION['accessToken']);
      $this->session->setRefreshToken($_SESSION['refreshToken']);
    } else {
      // Or request a new access token
      $this->session->refreshAccessToken($_SESSION['refreshToken']);
      $_SESSION['accessToken'] = $this->session->getAccessToken();
      $_SESSION['refreshToken'] = $this->session->getRefreshToken();
    }

    $options = [
      'auto_refresh' => true,
    ];

    $api = new SpotifyWebAPI($options, $this->session);
    $api->setSession($this->session);

    return $api;
  }
}
