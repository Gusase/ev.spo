<?php

function redirect($url): array
{
  switch ($url) {
    case 'login':
      return [
        'title' => 'Login - Spotify',
        'page' => 'view/challenge/auth.php'
      ];
    case 'logout':
      return [
        'title' => 'Login - Spotify',
        'page' => 'view/challenge/logout.php'
      ];
    default:
      return [
        'title' => 'Spotify',
        'page' => 'view/home.php'
      ];
      break;
  }
}
