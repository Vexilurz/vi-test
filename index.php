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

const DEG_IN_ONE_SECOND = 360 / (12 * 60 * 60);

function getTimeFromDegrees(float $hourHandDegrees, bool $is24hFormat = false): array {
    $result = array();
    $hourHandDegrees = fmod($hourHandDegrees, $is24hFormat ? 720 : 360);
    $timeInSeconds = $hourHandDegrees / DEG_IN_ONE_SECOND;
    $result['hours'] = intval($timeInSeconds / 3600);
    $result['minutes'] = $timeInSeconds / 60 % 60;
    $result['seconds'] = $timeInSeconds % 60;

    return $result;
}

$degrees = 33.42345 + 360;
$testResult2 = getTimeFromDegrees($degrees, true);
echo "Result of test2 for {$degrees}°: " . implode(':', $testResult2);
echo '<br>';
var_dump($testResult2);
echo '<br>';
echo 'Check test2 result: ';
echo sprintf('%.4f°', ($testResult2['hours'] * 3600 + $testResult2['minutes'] * 60 +
        $testResult2['seconds']) * DEG_IN_ONE_SECOND);
