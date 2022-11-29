<?php
session_start();

if (isset($_SESSION['attempts'])) {

    foreach ($_SESSION['attempts'] as $index => $attempt) {
        echo ('<tr>');

        printf('<td class="important">%s</td>', $index + 1);

        printf('<td>%s</td>', $attempt['x']);
        printf('<td>%s</td>', $attempt['y']);
        printf('<td>%s</td>', $attempt['r']);

        if ($attempt['hit']) {
            echo ('<td class="important">HIT</td>');
        } else {
            echo ('<td class="important">MISS</td>');
        }

        printf('<td>%s</td>', date('Y-m-d H:i:s', $attempt['attempt_time']) . ' UTC');

        printf('<td>%s ms</td>', $attempt['process_time']);

        echo ('</tr>');
    }
}
