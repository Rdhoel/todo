<?php
$db = new PDO('sqlite:./list.db');
$query = $db->query("CREATE TABLE items
                              (id INTEGER PRIMARY KEY,
                               idParent INTEGER,
                               text TEXT,
                               done INTEGER);
                              ");
$st = $db->query('SELECT text FROM items');
