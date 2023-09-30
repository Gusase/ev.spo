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
}
