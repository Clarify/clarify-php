<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require __DIR__ . '/credentials.php';
require __DIR__.'/../vendor/autoload.php';

$bundle = new \Clarify\Bundle($apikey);

$success = $bundle->create(
    "Dorothy and the Wizard of Oz",
    'http://media.clarify.io/audio/books/dorothyandthewizardinoz_01_baum_64kb.mp3'
);

if ($success) {
    echo $bundle->location . "\n";

    $item = $bundle->load($bundle->location);
    print_r($item);
} else {
    echo $bundle->detail['message'] . "\n";
}
