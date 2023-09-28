<?php

/**
 * 
 * @deprecated bingung gw njir
 */
class SpotifyAuth
{
  private $session;

  public function __construct($client, $clientSecret, $redirectUrl, $accessToken = null, $refreshToken = null)
  {
    $this->session = new SpotifyWebAPI\Session($client, $clientSecret, $redirectUrl);

    if ($accessToken) {
      $this->session->setAccessToken($accessToken);
      $this->session->setRefreshToken($refreshToken);
    }
  }

  public function generateState()
  {
    return $this->session->generateState();
  }

  public function getAuthorizeUrl($scope, $state)
  {
    $options = [
      'scope' => $scope,
      'state' => $state,
    ];
    return $this->session->getAuthorizeUrl($options);
  }

  public function requestAccessToken($code)
  {
    $this->session->requestAccessToken($code);
  }

  public function getAccessToken()
  {
    return $this->session->getAccessToken();
  }

  public function getRefreshToken()
  {
    return $this->session->getRefreshToken();
  }

  public function callback()
  {
    // Request an access token using the code from Spotify
    $this->session->requestAccessToken($_GET['code']);

    $_SESSION['accessToken'] = $this->session->getAccessToken();
    $_SESSION['refreshToken'] = $this->session->getRefreshToken();

    // Store the access and refresh tokens somewhere, e.g., in a session

    // Send the user along and fetch some data!
    header('Location: index.php');
    die();
  }

  public function getSpotifyAPI()
  {
    $options = [
      'auto_refresh' => true,
    ];

    return new SpotifyWebAPI\SpotifyWebAPI($options, $this->session);
  }
}
