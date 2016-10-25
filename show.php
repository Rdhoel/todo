<?php

require_once './config.php';
/* $query = "SELECT id, idParent, text, done FROM items";
  $result = $connection->query($query);
  if (!$result) {
  die($connection->error);
  }
  while ($row = $result->fetch_assoc()) {
  $data[$row['id']] = $row;
  } */


$st = $db->query('SELECT * FROM items');

$result = $st->fetchAll();
foreach ($result as $row) {
    $data[$row['id']] = $row;
}

function mapTree($dataset)
{
    $tree = array();

    if (empty($dataset)) {

    }

    foreach ($dataset as $id => &$node) {
        if (!$node['idParent']) {
            $tree[$id] = &$node;
        } else {
            $dataset[$node['idParent']]['childs'][$id] = &$node; //
        }
    }
    return $tree;
}

function commentsToTemplate($item)
{
    ob_start();
    include './template.php';
    return ob_get_clean();
}

function commentsString($data)
{
    $string = '';
    if (empty($data)) {
        return null;
    }

    foreach ($data as $w) {
        $string .= commentsToTemplate($w);
    }
    return $string;
}

$data = mapTree($data);

if (!$data) {
    return null;
}
$items = commentsString($data);
$data = null;
