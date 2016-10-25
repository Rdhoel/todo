<?php

require_once './config.php';

if (isset($_POST['text'])) {

    $name = trim($_POST['text']);

    $id = trim($_GET['item']);

    if (!empty($name)) {
        $query = "UPDATE items SET text='$name' WHERE id='$id'";
        $result = $db->query($query);
        if (!$result) {
            die($db->error);
        }
    }
}