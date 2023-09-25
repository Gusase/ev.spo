<?php

use SpotifyWebAPI\SpotifyWebAPI;

session_start();
require 'vendor/autoload.php';

// Fetch the saved access token from somewhere. A database for example.

$api = new SpotifyWebAPI();
$api->setAccessToken($_SESSION['accessToken']);

// It's now possible to request data from the Spotify catalog
$user =   $api->getUser('31ct4p6ym3wucoec6h7begyq3wke');

var_dump(
  $user
);

?>

<img src="<?= $user->images[1]->url ?>" alt="<?= $user->display_name ?>" title="<?= $user->display_name ?>">