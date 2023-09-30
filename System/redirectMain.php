<?php

function redirect($url): array
{
  switch ($url) {
    case 'auth':
      unset($_SESSION['auth']);
      return [
        'title' => 'Status - EvSpotify',
        'page' => 'view/challenge/succ.php'
      ];
      break;
    case 'login':
      return [
        'title' => 'Login - EvSpotify',
        'page' => 'view/challenge/auth.php'
      ];
      break;
    case 'logout':
      return [
        'title' => 'Login - EvSpotify',
        'page' => 'view/challenge/logout.php'
      ];
      break;
    default:
      return [
        'title' => 'EvSpotify',
        'page' => 'view/home.php'
      ];
      break;
  }
}
