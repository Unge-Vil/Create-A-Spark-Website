<?php
// Simple RSS-to-JSON proxy for shared hosting (allow-list required)
header('Content-Type: application/json; charset=utf-8');
$allow = [
  'https://www.createaspark.org/feed',
  'https://blog.createaspark.org/feed',
  'https://www.ungevil.no/feed'
];
$src = isset($_GET['src']) ? $_GET['src'] : '';
if (!$src || !in_array($src, $allow, true)) {
  http_response_code(400);
  echo json_encode(['error'=>'Source not allowed']); exit;
}
$ctx = stream_context_create([
  'http'=>['timeout'=>4, 'header'=>"User-Agent: CAS-RSS-Proxy/1.0\r\n"]
]);
$xml = @file_get_contents($src, false, $ctx);
if ($xml === false) { http_response_code(502); echo json_encode(['error'=>'Fetch failed']); exit; }
libxml_use_internal_errors(true);
$feed = @simplexml_load_string($xml);
if ($feed === false) { http_response_code(500); echo json_encode(['error'=>'Parse failed']); exit; }
$out = [];
if (isset($feed->channel->item)) {
  foreach ($feed->channel->item as $i) {
    $out[] = [
      'title' => (string)$i->title,
      'link' => (string)$i->link,
      'pubDate' => (string)$i->pubDate
    ];
  }
}
echo json_encode($out);
