<?php
/**
 * How to use the reduce method.
 *
 * I have a collection of team names and i would like to have them
 * in alphabetical order.
 */

include __DIR__ . "/bootstrap.php";

use \Collection\Reducer\DistinctByGetter;
use \Collection\Comparator\String;
use \Collection\Sorter\Uasort;

$reducer = new DistinctByGetter("getHome");
$teams = $games->reduce($reducer);

$comparator = new String();
$sorter = new Uasort($comparator);
$teams = $teams->sort($sorter);

foreach ($teams as $team) {
    echo $team . PHP_EOL;
}