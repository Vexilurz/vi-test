<?php

// *** Solution #1 ***

function getUniqueChars(string $input): array {
    $input = mb_strtolower(trim($input));
    $result = array();
    foreach (explode(' ', $input) as $word) {
        $firstChar = mb_substr($word, 0, 1);
        if ($word && !in_array($firstChar, $result)) {
            $result[] = $firstChar;
        }
    }
    sort($result);
    return $result;
}

$testStr = 'Если ты  будешь злиться на меня каждый раз, когда я делаю глупость, мне придется прекратить делать глупости';
$testResult = getUniqueChars($testStr);
echo 'Result of test1: ' . implode(', ', $testResult);
echo '<br><br>';


// *** Solution #2 ***

const DEG_IN_CLOCK = 360.0; // 720.0 for 24-h format
const DEG_IN_ONE_HOUR = DEG_IN_CLOCK / 12.0;
const MINUTES_IN_HOUR = 60.0;

function getTimeFromDegrees(float $hourHandDegrees): array {
    $result = array();
    $hourHandDegrees = fmod($hourHandDegrees, DEG_IN_CLOCK);

    $hours = $hourHandDegrees / DEG_IN_ONE_HOUR;
    $result['hours'] = intval(floor($hours));
    $minutes = ($hours - floor($hours)) * MINUTES_IN_HOUR;
    $result['minutes'] = intval(floor($minutes));
    $seconds = ($minutes - floor($minutes)) * MINUTES_IN_HOUR;
    $result['seconds'] = intval(floor($seconds));

    return $result;
}

$degrees = 33.42345;
$testResult2 = getTimeFromDegrees($degrees);
echo "Result of test2 for {$degrees}°: " . implode(':', $testResult2);
echo '<br>';
var_dump($testResult2);
echo '<br>';
echo 'Check test2 result (float numbers error exist): ';
echo sprintf('%.4f°', ($testResult2['seconds'] / pow(MINUTES_IN_HOUR, 2) +
        $testResult2['minutes'] / MINUTES_IN_HOUR + $testResult2['hours']) * DEG_IN_ONE_HOUR);
