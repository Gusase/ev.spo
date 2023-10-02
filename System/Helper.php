<?php

/**
 * A Helper class / random method
 */
class Helper
{
  public static function greetings(string $timezone): string
  {
    date_default_timezone_set($timezone);
    $Hour = date('G');
    if ($Hour >= 0 && $Hour <= 12) {
      return "Good Morning";
    } else if ($Hour >= 12 && $Hour <= 18) {
      return "Good Afternoon";
    } else if ($Hour >= 18 || $Hour <= 24) {
      return "Good Evening";
    }
  }

  public static function duration(int $milliseconds): string
  {
    // Mengubah milidetik menjadi detik
    $seconds = intval($milliseconds / 1000); // biang kerok nya disini bjir #float jd int

    // Menghitung jumlah menit dan detik
    $minutes = floor($seconds / 60);
    $seconds %= 60;

    // Format menit dan detik ke dalam "m:ss"
    $timeFormat = sprintf("%d:%02d", $minutes, $seconds);

    return $timeFormat;
  }
}
