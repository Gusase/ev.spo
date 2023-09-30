<!DOCTYPE html>
<html lang="<?= locale_get_default() ?>" class="dark">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title><?= (isset($page)) ? $page['title'] : $page['title'] ?? 'Default' ?></title>
  <style>
    @keyframes fade {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    ::-webkit-scrollbar {
      width: 0 !important;
    }

    .fd {
      animation: fade .4s ease-in;
    }
  </style>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          container: {
            center: true,
          }
        }
      }
    }
  </script>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-gray-950 fd">