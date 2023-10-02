<div class="w-full">
  <div class="container py-20 max-md:px-2">
    <h3 class="text-3xl font-semibold dark:text-white"><?= Helper::greetings('Asia/Jakarta') ?></h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-5 gap-y-3 sm:gap-y-4 mt-6 md:mt-8">
      <?php foreach ($api->getMyRecentTracks(['limit' => 6])->items as $items) : ?>
        <a href="" class="select-none max-w-full shadow-lg ring-1 ring-black/10 rounded-md flex items-center gap-x-3 duration-300 bg-[#292a2c] hover:bg-[#232226] h-[80px]">
          <img class="w-[80px] h-auto shadow-[10px_10px_25px_-9px_rgba(0,0,0,0.7)] object-cover" src="<?= $items->track->album->images[1]->url ?>">
          <div class="min-w-0 py-5 pr-2">
            <div class="text-slate-900 font-bold text-base truncate dark:text-slate-200"><?= $items->track->name ?></div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="container py-20 max-md:px-2">
    <h3 class="text-3xl font-semibold dark:text-white">Your playlists</h3>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-7 2xl:grid-cols-8 gap-x-3 sm:gap-x-[20px] gap-y-[16px] mt-6 md:mt-8">
      <?php foreach ($api->getMyPlaylists()->items as $playlist) : ?>
        <div class="w-full max-w-[170px] rounded-lg shadow-lg duration-300 bg-[#191919] hover:bg-[#232226]">
          <div class="flex flex-col items-start p-4 pb-6">
            <img class="max-w-full h-auto mb-3 rounded-sm shadow-[7px_10px_25px_-9px_rgba(0,0,0,0.8)]" src="<?= $playlist->images[0]->url ?>" alt="" />
            <h5 class="mb-1 font-semibold text-gray-900 dark:text-white truncate inline-block w-[139px] lg:w-full" title="<?= $playlist->name ?>"><?= $playlist->name ?></h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">By <?= $playlist->owner->display_name ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="container py-20 max-md:px-2">
    <h3 class="text-3xl font-semibold dark:text-white">Public playlists</h3>

    <div class="flex flex-wrap gap-x-5 gap-y-3 sm:gap-y-4 mt-6 md:mt-8">
      <?php
      $publicPlaylist = array_filter($api->getMyPlaylists()->items, function ($ply) {
        return $ply->public === true;
      });
      ?>
      <?php foreach ($publicPlaylist as $playlist) : ?>
        <div class="w-full max-w-[170px] rounded-lg shadow-lg duration-300 bg-[#191919] hover:bg-[#232226]">
          <div class="flex flex-col items-start p-4 pb-6">
            <img class="max-w-full h-auto mb-3 rounded-sm shadow-[7px_10px_25px_-9px_rgba(0,0,0,0.8)]" src="<?= $playlist->images[0]->url ?>" alt="" />
            <h5 class="mb-1 font-semibold text-gray-900 dark:text-white truncate inline-block w-[139px] lg:w-full" title="<?= $playlist->name ?>"><?= $playlist->name ?></h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">By <?= $playlist->owner->display_name ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="container py-20 max-md:px-2">
    <h3 class="text-3xl font-semibold dark:text-white">Top artists this month</h3>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-7 2xl:grid-cols-8 gap-x-3 sm:gap-x-[20px] gap-y-[16px] mt-6 md:mt-8">
      <?php foreach ($api->getMyTop('artists', ['time_range' => 'short_term', 'limit' => 8])->items as $artis) : ?>
        <div class="w-full max-w-[170px] rounded-lg shadow-lg duration-300 bg-[#191919] hover:bg-[#232226]">
          <div class="flex flex-col items-start p-4 pb-6">
            <img class="w-[640px] object-cover mb-4 rounded-full shadow-[7px_10px_25px_-9px_rgba(0,0,0,0.8)] aspect-square" src="<?= $artis->images[1]->url ?>" alt="" />
            <h5 class="mb-1 font-semibold text-base text-gray-900 dark:text-white truncate inline-block w-[139px] lg:w-full" title="<?= $artis->name ?>"><?= $artis->name ?></h5>
            <span class="text-sm text-gray-500 dark:text-gray-400 capitalize"><?= $artis->type ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="container py-20 max-md:px-2">
    <h3 class="text-3xl font-semibold dark:text-white">Top trakcs this month</h3>

    <div class="relative overflow-x-auto mt-6 md:mt-8">
      <table class="w-full text-sm text-left text-gray-500 table-auto dark:text-gray-400">
        <tbody>
          <?php foreach ($api->getMyTop('tracks', ['time_range' => 'short_term', 'limit' => 4])->items as $index => $track) : ?>
            <tr class="hover:bg-[#232226] group">
              <td scope="row" class="pr-px pl-2 py-4 w-1 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                <?= $index + 1 ?>
              </td>
              <td class="flex items-center px-6 py-4 whitespace-nowrap">
                <img class="w-11 h-11" src="<?= $track->album->images[1]->url ?>" alt="">
                <div class="pl-3">
                  <div class="text-base font-semibold dark:text-white"><?= $track->name ?></div>
                  <div class="font-normal mt-1 text-gray-400 group-hover:text-white"><?= $track->artists[0]->name ?></div>
                </div>
              </td>
              <td class="px-6 py-4 group-hover:text-white">
                <?= $track->album->name ?>
              </td>
              <td class="px-6 py-4">
                <?= Helper::duration($track->duration_ms) ?>
              </td>
              <td class="px-6 py-4">

              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

  <div class="container py-20 max-md:px-2">
    <h3 class="text-3xl font-semibold dark:text-white">Recently played artists</h3>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-7 2xl:grid-cols-8 gap-x-3 sm:gap-x-[20px] gap-y-[16px] mt-6 md:mt-8">
      <?php
      $recentTracks = $api->getMyRecentTracks()->items;
      $seenArtists = []; // Array untuk melacak artis yang telah dilihat

      foreach ($recentTracks as $artis) :
        $artistName = $artis->track->artists[0]->name;

        $imgArtis = $api->getArtist($artis->track->artists[0]->id);
        if (!in_array($artistName, $seenArtists)) :
          // Jika belum ada, tampilkan nama artis, tambahkan ke array $seenArtists, dan tingkatkan $uniqueArtists
          $seenArtists[] = $artistName;
      ?>
          <div class="w-full max-w-[170px] rounded-lg shadow-lg duration-300 bg-[#191919] hover:bg-[#232226]">
            <div class="flex flex-col items-start p-4 pb-6">
              <img class="w-[640px] object-cover mb-4 rounded-full shadow-[7px_10px_25px_-9px_rgba(0,0,0,0.8)] aspect-square" src="<?= $imgArtis->images[1]->url ?>" alt="" />
              <h5 class="mb-1 font-semibold text-base text-gray-900 dark:text-white truncate inline-block w-[139px] lg:w-full" title="<?= $artistName ?>"><?= $artistName ?></h5>
              <span class="text-sm text-gray-500 dark:text-gray-400 capitalize"><?= $artis->track->artists[0]->type ?></span>
            </div>
          </div>
        <?php endif;
        if (count($seenArtists) >= 8) {
          break;
        }
        ?>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="container py-20 max-md:px-2">
    <h3 class="text-3xl font-semibold dark:text-white">Following <span class="dark:text-gray-400 text-gray-500">(Artists)</span></h3>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-7 2xl:grid-cols-8 gap-x-3 sm:gap-x-[20px] gap-y-[16px] mt-6 md:mt-8">
      <?php foreach ($api->getUserFollowedArtists()->artists->items as $followdArtis) : ?>
        <div class="w-full max-w-[170px] rounded-lg shadow-lg duration-300 bg-[#191919] hover:bg-[#232226]">
          <div class="flex flex-col items-start p-4 pb-6">
            <img class="w-[640px] object-cover mb-4 rounded-full shadow-[7px_10px_25px_-9px_rgba(0,0,0,0.8)] aspect-square" src="<?= $followdArtis->images[1]->url ?>" alt="" />
            <h5 class="mb-1 font-semibold text-base text-gray-900 dark:text-white truncate inline-block w-[139px] lg:w-full" title="<?= $followdArtis->name ?>"><?= $followdArtis->name ?></h5>
            <span class="text-sm text-gray-500 dark:text-gray-400 capitalize"><?= $followdArtis->type ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>