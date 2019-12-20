<?php


// a global object to hold thread data
$app  = ToObject(array());

// fallback data
$app->title = "Put page title here";
$app->favicon = "";
$app->desc = "Put meta description here";
$app->keys = "Put meta Keywords here";
$app->beforeHead = "<!-- put something before </head> -->";
$app->body = "Put Body here";

require(R.'/src/router.php');

$container_data = array(
    'Title' => $app->title,
    'Favicon' => $app->favicon,
    'Desc' => $app->desc,
    'Keys' => $app->keys,
    'BeforeHead' => $app->beforeHead,
    'Body' => $app->body
);

$final_content = LoadView('layout/container', $container_data);

echo $final_content;