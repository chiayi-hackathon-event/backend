<?php

function log_db_insert($key, array $data, callable $insert_callback) {
    echo 'Insert data: '. $key . PHP_EOL;
    print_r($data);
    echo PHP_EOL;

    $result = $insert_callback($data);

    if ($result) {
        echo 'Success insert' . PHP_EOL;
    } else {
        echo 'Fail insert' . PHP_EOL;
    }
}
