<?php

Class FormatDate {
  static function formatUTCToDB(string $stringUTC) {
    $date_format_replace = str_replace('/', '-', $stringUTC);
    $date_split = explode('-', $date_format_replace);
    $date_reverse = array_reverse($date_split);
    $date_join = implode('-', $date_reverse);
    return $date_join;
  } 
}