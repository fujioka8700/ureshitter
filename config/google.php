<?php

return [
  /**
   * 本番環境では、Google Analytics4 を有効にする
   */
  'ga_enable' => env('GA_ENABLE', false),

  /**
   * Google Analytics4 のトラッキングID
   */
  'ga_measurement_id' => env('GA_MEASUREMENT_ID'),
];
