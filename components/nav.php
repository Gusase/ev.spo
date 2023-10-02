<?php if (isset($_SESSION['me']) && !isset($api->getMyCurrentTrack()->response)) : ?>
  <div id="sticky-banner" tabindex="-1" class="relative isolate flex items-center gap-x-6 overflow-hidden bg-gray-50 px-6 py-2.5 sm:px-3.5 sm:before:flex-1">
    <div class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
      <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
    </div>
    <div class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
      <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
    </div>
    <div class="flex flex-wrap items-center gap-y-2">
      <p class="text-sm leading-6 text-gray-900 flex items-center">
        <svg class="w-4 h-4 text-gray-800 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13v-3a9 9 0 1 0-18 0v3m2-3h3v7H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2Zm11 0h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3v-7Z" />
        </svg>
        <?php
        if ($api->getMyCurrentTrack()->currently_playing_type != 'ad') :
          $artists = [];
          foreach ($api->getMyCurrentTrack()->item->artists as $artist) {
            $artists[] = $artist->name;
          }

          $artistNames = implode(', ', $artists);
        ?>
          Now listen to&nbsp;<a href="<?= $api->getMyCurrentTrack()->item->external_urls->spotify ?>" title="By <?= $artistNames ?>" class="font-semibold hover:underline"><?= $api->getMyCurrentTrack()->item->name ?></a>
        <?php else : ?>
          Advertisement
        <?php endif; ?>
      </p>
      <?php if (!$api->getMyCurrentTrack()->is_playing) : ?>
        <span href="#" class="flex-none rounded-full ml-3 bg-gray-900 px-3.5 py-1 text-sm font-semibold text-white shadow-sm cursor-default">Paused</span>
      <?php endif; ?>
    </div>
    <div class="flex flex-1 justify-end">
      <button type="button" data-dismiss-target="#sticky-banner" class="-m-3 p-3 focus-visible:outline-offset-[-4px]">
        <span class="sr-only">Dismiss</span>
        <svg class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
        </svg>
      </button>
    </div>
  </div>
<?php endif; ?>
<nav class="bg-white border-gray-200 z-20 dark:border-gray-600 sticky top-0 inset-x-0 dark:bg-[#181818]/95 backdrop-blur-sm">
  <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
    <a href="http://ev.sptfy.test/flex items-center">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">EvSpotify</span>
    </a>
    <?php if (isset($_SESSION['login']) && isset($_SESSION['me']) && !isset($_SESSION['auth'])) : ?>
      <div class="flex items-center md:order-2">
        <button type="button" data-tooltip-target="##" class="flex mr-3 text-sm bg-black rounded-full md:mr-0 focus:ring-2 hover:opacity-90 focus:ring-[#333]" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="<?= $_SESSION['me']->images[0]->url ?>" alt="user photo">
        </button>
        <div id="##" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white transition-opacity duration-300 bg-[#333] rounded-lg shadow-sm opacity-0 tooltip">
          <?= $_SESSION['me']->display_name ?>
        </div>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-[#202020] dark:divide-gray-800" id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white"><?= $_SESSION['me']->display_name ?></span>
            <span class="block text-sm mt-px text-gray-500 truncate dark:text-gray-400"><?= $_SESSION['me']->email ?></span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 dark:hover:text-white hover:bg-[#181818]">Dashboard</a>
            </li>
          </ul>
        </div>
        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-900 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
      </div>
    <?php endif; ?>
  </div>
</nav>