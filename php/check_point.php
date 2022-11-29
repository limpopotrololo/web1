<?php

$start_time = hrtime(true);

if (isset($_GET['x']) && isset($_GET['y']) && isset($_GET['r'])) {
    $x = str_replace(',', '.', clean($_GET['x']));
    $y = str_replace(',', '.', clean($_GET['y']));
    $r = str_replace(',', '.', clean($_GET['r']));
    if (is_numeric($x) && is_numeric($y) && is_numeric($r)) {
        $x = floatval($x);
        $y = floatval($y);
        $r = floatval($r);

        function checkRectangleHit($x, $y, $r): bool
        {
            return $x <= $r && $y <= $r;
        }
        function checkTriangleHit($x, $y, $r): bool
        {
            return $x >= -$r && $y <= $r && $x**2 + $y**2 <= $r**2/4;
        }
        function checkSectorHit($x, $y, $r): bool
        {
            return $x < ($r/2) && $y >= -($r/2) && $x**2 + $y**2 <= $r**2/4;
        }


        if (!($r <= 0)) {
            if ($y >= 0) {
                $was_hit = checkSectorHit($x, $y, $r);
            } elseif ($x >= 0) {
                $was_hit = checkRectangleHit($x, $y, $r);
            } else {
                $was_hit = checkTriangleHit($x, $y, $r);
            }

            $attempt = array(
                'x' => $x,
                'y' => $y,
                'r' => $r,
                'hit' => $was_hit,
                'attempt_time' => time(),
                'process_time' => (hrtime(true) - $start_time) / 1000000
            );

            session_start();

            if (isset($_SESSION['attempts'])) {
                $_SESSION['attempts'][] = $attempt;
            } else {
                $_SESSION['attempts'] = array($attempt);
            }
            header('Location: ../index.html');


        } else {
            echo 'The parameter R must be greater than zero';
        }

    } else {
        echo 'The parameters must be numbers';
        http_response_code(400);
    }

} else {
    echo 'The parameters must be filled in';
    http_response_code(400);
}

function clean($value = ""): string
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    return htmlspecialchars($value);
}
