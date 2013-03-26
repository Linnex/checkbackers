<?php
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');
$url = 'http://catarse.me/pt/projects/' . htmlspecialchars($_GET["project"]) .  '/backers?page=' . htmlspecialchars($_GET["page"]);
$json = file_get_contents($url);
echo $json;
?>
