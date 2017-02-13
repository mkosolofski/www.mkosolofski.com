<?php
define('ACCESS_KEY', 'kljasdd878923jljdfklds7912hpojp4239uh');
define('MAKER_API_KEY', 'lw1SzlAvgndUi2aWuyDg3gLaaOMNgrCxDe5IDAp5O1B');
define('MAX_DELAY', '120');

$accessKey = $_GET['access_key'] ?? '';
if (empty($accessKey) || $accessKey != ACCESS_KEY) return;

$event = $_GET['event'] ?? '';
if (empty($event)) return;

$seconds = (int)($_GET['seconds'] ?? 0);
if ($seconds > MAX_DELAY) $seconds = MAX_DELAY;

sleep($seconds);

exec('curl -X POST https://maker.ifttt.com/trigger/' . $event . '/with/key/' . MAKER_API_KEY);
