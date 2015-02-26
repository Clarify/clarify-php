<?php

// Don't forget to rename creds-dist.php to creds.php and insert your API key
require __DIR__.'/creds.php';
require __DIR__.'/../vendor/autoload.php';

$bundle = new \Clarify\Bundle($apikey);

$firstpage = $bundle->index();

while ($bundle->hasMorePages()) {
    foreach ($bundle as $bundle_id) {
        $_bundle = $bundle->load($bundle_id);

        echo $_bundle['_links']['self']['href'] . "\n";
        echo $_bundle['name'] . "\n";
    }

    $page = $bundle->getNextPage();
}
