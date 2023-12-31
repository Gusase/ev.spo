<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/System/const.php';
require_once __DIR__ . '/System/Helper.php';
require_once __DIR__ . '/System/SpotifyApi.php';
require_once __DIR__ . '/System/redirectMain.php';

$v = isset($_GET['v']) ? $_GET['v'] : $_GET;
if (isset($_SESSION['auth'])) {
  $page = redirect('auth');
  // var_dump($page);
  // die;
  // unset($_SESSION['auth']);
} else {
  $page = redirect($v);
  if (isset($_SESSION['login'])) {
    $spotify = new SpotifyApi();
    $api = $spotify->api();
  }
}
if (!isset($_SESSION['login'])) {
  $page = redirect('login');
}
// var_dump($page);
// die;

// bisa bjir
?>


<!-- html -->
<?php
include 'components/head.php';
include 'components/nav.php'
?>

<?php if (empty($page)) : ?>
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
      <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">We invest in the world’s potential</h1>
      <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
      <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
        <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
          Get started
          <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </a>
        <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
          Learn more
        </a>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if (isset($page)) : ?>

<?php include_once $page['page'];
endif ?>


<?php include 'components/foot.php' ?>