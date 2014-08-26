<?php
/**
 * How to use the reduce method.
 *
 * I have a large collection of match data and i would like
 * to have new collection with all teams and they don't need
 * to be sorted.
 *
 * See example_sort.php if you would like to know how to sort
 * the teams.
 */

include __DIR__ . "/bootstrap.php";

use \Collection\Reducer\DistinctByGetter;

$reducer = new DistinctByGetter("getHome");
$teams = $games->reduce($reducer);

foreach ($teams as $team) {
    echo $team . PHP_EOL;
}
