<?php

require __DIR__ . "/CoordinatesValidator.php";
require __DIR__ . "/AreaChecker.php";

@session_start();

if (!isset($_SESSION["results"])) {
    $_SESSION["results"] = array();
}

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    http_response_code(405);
    return;
}

date_default_timezone_set($_GET["timezone"]);

$x = (float) $_GET["x"];
$y = (float) $_GET["y"];
$r = (float) $_GET["r"];

$validator = new CoordinatesValidator($x, $y, $r);
if ($validator->checkData()) {
    $isInArea = AreaChecker::isInArea($x, $y, $r);
    $coordsStatus = $isInArea
        ? "<span class='success'>Попал</span>"
        : "<span class='fail'>Промазал</span>";

    $currentTime = date('Y-m-d H:i:s');
    $benchmarkTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

    $newResult = array(
        "x" => $x,
        "y" => $y,
        "r" => $r,
        "coordsStatus" => $coordsStatus,
        "currentTime" => $currentTime,
        "benchmarkTime" => $benchmarkTime
    );

    array_push($_SESSION["results"], $newResult);

    echo "<table id='outputTable'>
        <tr>
            <th>x</th>
            <th>y</th>
            <th>r</th>
            <th>Точка входит в ОДЗ</th>
            <th>Текущее время</th>
            <th>Время работы скрипта</th>
        </tr>";

    foreach ($_SESSION["results"] as $tableRow) {
        echo "<tr>";
        echo "<td>" . $tableRow["x"] . "</td>";
        echo "<td>" . $tableRow["y"] . "</td>";
        echo "<td>" . $tableRow["r"] . "</td>";
        echo "<td>" . $tableRow["coordsStatus"] . "</td>";
        echo "<td>" . $tableRow["currentTime"] . "</td>";
        echo "<td>" . $tableRow["benchmarkTime"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    http_response_code(422);
    return;
}
