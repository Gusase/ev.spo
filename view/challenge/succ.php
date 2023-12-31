<?php
$api = new SpotifyApi();
?>

<div class="container mx-auto p-9 flex min-h-screen items-center justify-center">
  <div class="max-w-[734px] w-full">
    <div class="flex flex-col gap-y-5">
      <div class="mb-4">
        <div class="flex flex-col items-center dark:text-white text-center">
          <div class="mb-8">
            <h2 class="font-bold tracking-tight text-3xl">Logged in as</h2>
          </div>
          <div class="mb-8">
            <img src="<?= $_SESSION['me']->images[1]->url ?>" class="w-14 h-14 rounded-full" alt="">
          </div>
          <div class="mb-8">
            <?= $_SESSION['me']->display_name ?>
          </div>
          <div class="my-2">
              <button onclick='window.location.href="https://ev.sptfy.test/"' class="w-full text-black focus:scale-100 focus:ring-2 focus:outline-none focus:ring-white font-bold hover:scale-105 rounded-full bg-[#1db954] focus:bg-[#1db954]/80 text-sm tracking-wider px-5 py-3 text-center">Account Overview</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>