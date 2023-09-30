<div class="min-h-screen w-full">
  <div class="container py-20">
    <h3 class="text-3xl font-semibold dark:text-white"><?= Helper::greetings('Asia/Jakarta') ?></h3>
    <div class="grid grid-cols-3 gap-6 mt-10">
      <?php foreach ($api->getMyRecentTracks(['limit' => 6])->items as $items) : ?>
        <?php foreach ($items as $track) : ?>
          <div class="overflow-hidden relative max-w-full bg-white shadow-lg ring-1 ring-black/5 rounded-xl flex items-center gap-6 dark:bg-slate-800 dark:highlight-white/5">
            <img class="w-28 h-28 shadow-lg" src="https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=80">
            <div class="min-w-0 py-5 pr-5">
              <div class="text-slate-900 font-bold text-lg truncate dark:text-slate-200"><?= $track->album->name ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>