<?php
/**
 * How to use the reduce method.
 *
 * I have a large collection of match data and i would like
 * to know how many times Köln was victorious at home and Leverkusen
 * was invited to watch.
 */

include __DIR__ . "/bootstrap.php";

use \Collection\Filter\Getter;

$homeFilter = new Getter("Köln", "getHome");
$guestFilter = new Getter("Leverkusen", "getGuest");
$victoryFilter = new Getter("1", "getToto");

$victories = $games->filter($homeFilter)
    ->filter($guestFilter)
    ->filter($victoryFilter);

echo sprintf(
    "Effzeh was vicotrious %s times." . PHP_EOL,
    count($victories)
);
