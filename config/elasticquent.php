<?php

return [
    'host' => env('ELASTIC_HOST', 'localhost:9200'),
    'house_keeping_days' => env('ELASTIC_LOG_HOUSEKEEPING_DAYS', 30),
];
