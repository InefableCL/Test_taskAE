<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include ('classes/Task_3/autoload.php');

if (empty($argv[1])) {
    die("Usage: $argv[0] <URL>\n");
}
$url = $argv[1];

$text = @file_get_contents($url);
$tokenizer = new Task_3\Task_test\HtmlTokenizer($text);
$counter = new Task_3\Task_test\TagCounter($tokenizer);
$tagCounts = $counter->getTagCounts();

echo "File: $url\n";

foreach ($tagCounts as $name=>$count) {
    echo "$name\t\t$count\n";
}
