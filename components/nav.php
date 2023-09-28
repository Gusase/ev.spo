<nav class="bg-white border-gray-200 z-20 dark:border-gray-600 sticky top-0 inset-x-0 dark:bg-transparent">
  <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
    <a href="http://ev.sptfy.test/flex items-center">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">EvSpotify</span>
    </a>
    <?php if (isset($_SESSION['login']) && isset($_SESSION['me'])) : ?>
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
        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
      </div>
    <?php endif; ?>
  </div>
</nav>