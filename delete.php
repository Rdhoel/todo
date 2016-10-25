<?php

require_once './config.php';

$find_id = $_GET['item'];

function RemoveTree($find_id, $db)
{
    $query = "SELECT * FROM items WHERE idParent=" . $find_id;

    $result = $db->query($query);

    while (($row = $result->fetch()) != false) {
        $q = "DELETE FROM items WHERE id=" . $row["id"];
        $r = $db->query($q) or die("Can't delete");
        RemoveTree($row["id"], $db);
    }

    $query = "DELETE FROM items WHERE id=$find_id";

    $result = $db->query($query);
}

RemoveTree($find_id, $db);