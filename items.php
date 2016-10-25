<?php

require_once 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

function get()
{
    if (array_key_exists('id', $_GET)) {
        $id = strtok($_GET['id'], '.php/');
        return "SELECT * FROM items WHERE id=$id";
    } else {
        return "SELECT * FROM items";
    }
}

function create()
{
    if (array_key_exists('idParent', $_POST) && !empty($_POST['done'])) {
        $idParent = $_POST['idParent'];
    } else {
        $idParent = 0;
    }

    if (array_key_exists('done', $_POST) && !empty($_POST['done'])) {
        $done = $_POST['done'];
    } else {
        $done = 0;
    }

    if (!empty($_POST['text'])) {
        return "INSERT INTO items (idParent, text, done)"
                . "VALUES ($idParent, '$_POST[text]', $done)";
    } else {
        return null;
    }
}

function update($id, $db)
{
    if (!$id) {
        return null;
    }

    $query = "SELECT * FROM items WHERE id=$id";

    $st = $db->query($query);
    $result = $st->fetch();

    if (array_key_exists('done', $_GET) && !empty($_GET['done'])) {
        $done = $_GET['done'];
    } else {
        $done = $result['done'];
    }

    if (array_key_exists('text', $_GET) && !empty($_GET['text'])) {
        $text = $_GET['text'];
    } else {
        $text = $result['text'];
    }

    if (array_key_exists('idParent', $_GET) && !empty($_GET['idParent'])) {
        $idParent = $_GET['idParent'];
    } else {
        $idParent = $result['idParent'];
    }

    return "UPDATE items SET text='$text' WHERE id='$id'";
}

function delete($id, $db)
{
    $query = "SELECT * FROM items WHERE idParent=" . $id;

    $result = $db->query($query);

    while (($row = $result->fetch()) != false) {
        $q = "DELETE FROM items WHERE id=" . $row["id"];
        $r = $db->query($q) or die("Can't delete");
        delete($row["id"], $db);
    }

    $query = "DELETE FROM items WHERE id=$id";

    $result = $db->query($query);

    return false;
}

// create SQL based on HTTP method
switch ($method) {
    case 'GET':
        $query = get();
        break;
    case 'POST':
        $query = create();
        break;
    case 'PUT':
        $id = strtok($_GET['id'], '.php/');
        $query = update($id, $db);
        break;
    case 'DELETE':
        $id = strtok($_GET['id'], '.php/');
        $query = delete($id, $db);
        break;
}
// excecute SQL statement
if ($query) {
    $st = $db->query($query);
} elseif ($query === false) {
    echo json_encode(array('success'));
    exit;
} else {
    echo json_encode(array('false'));
    exit;
}
// print results, insert id or affected row count
if ($method == 'GET') {
    $result = $st->fetchAll();
    echo json_encode(array('success', $result));
} else {
    echo json_encode(array('success'));
}