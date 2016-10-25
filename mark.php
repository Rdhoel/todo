<?php

require './config.php';

if (isset($_GET['as'], $_GET['item'])) {
    $as = $_GET['as'];
    $item = $_GET['item'];

    switch ($as) {
        case 'done':
            $query = "UPDATE items SET done = 1 WHERE id=$item";
            $result = $db->query($query);

            break;
        case 'not-done':
            $query = "UPDATE items SET done = 0 WHERE id=$item";
            $result = $db->query($query);

            break;
    }
}
header('Location: index.php');
