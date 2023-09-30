<?php
require_once __DIR__ . '/../../System/SpotifyApi.php';

$auth = new SpotifyApi();

if (isset($_SESSION['login'])) {
  header('Location: /');
  exit;
}

if (isset($_POST['go'])) {
  $auth->auth();
  exit();
}

if (isset($_GET['code'])) {
  $auth->callback();
  exit;
}

?>
<div class="bg-gradient-to-b from-[#1a1a1a] to-black">
  <div class="flex flex-col items-center justify-center mx-auto py-24">
    <div class="w-full bg-white rounded-lg shadow md:mt-0 max-w-[734px] md:px-0 md:py-10 dark:bg-black">
      <h1 class="text-xl my-12 font-bold leading-tight tracking-tight text-center text-gray-900 md:text-5xl dark:text-white">
        Log in to EvSpotify
      </h1>
      <div class="grid w-[324px] mx-auto">
        <button type="button" class="text-white focus:ring-2 focus:text-gray-400 duration-150 focus:outline-none bg-transparent border border-gray-700 hover:ring-1 hover:ring-white focus:ring-white rounded-lg text-sm px-8 font-bold py-4 select-none justify-center relative inline-flex items-center mb-3">
          <svg class="w-5 h-5 absolute left-8" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
            <path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path>
          </svg>
          Continue with Apple
        </button>
        <button type="button" class="truncate text-white focus:ring-2 focus:text-gray-400 duration-150 focus:outline-none bg-transparent border border-gray-700 hover:ring-1 hover:ring-white focus:ring-white rounded-lg text-sm px-8 font-bold py-4 select-none justify-center relative inline-flex items-center mb-3">
          <svg class="w-4 h-4 absolute left-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
          </svg>
          Continue with Facebook
        </button>
      </div>
      <hr class="mx-auto my-8 border-[#1c1c1c] border md:my-10 w-3/4">
      <form class="space-y-4 md:space-y-6 w-[324px] mx-auto" action="#" method="post">
        <!-- <div>
          <label for="email" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Email or username</label>
          <input type="email" name="email" id="email" class="border border border-gray-700 text-base hover:ring-1 hover:ring-white text-gray-900 focus:outline-none focus:ring-white focus:ring-2 rounded block w-full p-3 dark:bg-[#121212] placeholder:font-semibold dark:placeholder-[#8e8e8e] dark:text-white" placeholder="Email or username">
        </div>
        <div>
          <label for="pass" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Password</label>
          <input type="password" name="pass" id="pass" class="border border border-gray-700 text-base hover:ring-1 hover:ring-white text-gray-900 focus:outline-none focus:ring-white focus:ring-2 rounded block w-full p-3 dark:bg-[#121212] placeholder:font-semibold dark:placeholder-[#8e8e8e] dark:text-white" placeholder="Password">
        </div> -->
        <div class="py-6">
          <button type="submit" name="go" class="w-full text-black focus:scale-100 focus:ring-2 focus:outline-none focus:ring-white font-bold hover:scale-105 rounded-full bg-[#1db954] focus:bg-[#1db954]/80 text-sm px-5 py-3 text-center">Log in</button>
        </div>
        <div class="text-center">
          <a href="#" class="font-medium hover:text-[#1db954] text-base underline text-white">Forgot your password?</a>
        </div>
      </form>
      <hr class="mx-auto my-8 border-[#1c1c1c] border md:my-10 w-3/4">
    </div>
  </div>
</div>