<?php
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');
$project = htmlspecialchars($_GET["project"]);
$page = htmlspecialchars($_GET["page"]);
$url = 'http://catarse.me/pt/projects/' . $project .  '/backers?page=' . $page;
$cache_file = "data/" . $project . "_" . $page . ".json";
if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 5 ))) {
   // Cache file is less than five minutes old. 
   // Don't bother refreshing, just use the file as-is.
   $file = file_get_contents($cache_file);
} else {
   // Our cache is out-of-date, so load the data from our remote server,
   // and also save it over our cache for next time.
   $file = file_get_contents($url);
   file_put_contents($cache_file, $file, LOCK_EX);
}
echo $file;
?>

