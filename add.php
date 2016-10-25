<?php

require_once './config.php';
if (isset($_POST['text'])) {
    $name = trim($_POST['text']);
    if (!empty($name)) {
        if ($_GET['item']) {
            $parent_id = preg_replace('/\D+/i', '', $_GET['item']);
        } else {
            $parent_id = 0;
        }

        $db->exec("INSERT INTO items (idParent, text, done)
                 VALUES ('$parent_id', '$name', '0')");
    }
}