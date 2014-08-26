<?php
/**
 * Bootstrap the examples.
 *
 * Creates a collection with all games found in the file games.csv.
 */
require_once __DIR__ . "/../vendor/autoload.php";

require_once __DIR__ . "/Assets/Match.php";

use Collection\Collection;

$csv  = new SplFileObject(__DIR__ . "/Assets/games.csv", 'r');
$csv->setCsvControl(";");

$games = new Collection();
while($csv->valid() && ($row = $csv->fgetcsv()) && $row[0] !== null) {
    list($season, $day, $home, $guest, $scoreHome, $scoreGuest, $toto) = $row;
    $match = new Match(
        $day,
        $guest,
        $home,
        $scoreGuest,
        $scoreHome,
        $season,
        $toto
    );
    $games->append($match);
}
