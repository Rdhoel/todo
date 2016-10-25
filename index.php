<?php error_reporting( E_ERROR ); ?>
<?php require_once './show.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ToDo</title>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="./styles.css" rel="stylesheet">
        <script type="text/javascript" src="./item.js"></script>
    </head>
    <body>
        <div class="list" id='list'>
            <h1 class="header">ToDo</h1>
            <form id="item-add" action="" method="post" name="item-add">
                <input type="text" id="text" name="text" placeholder="Type a new item" class="input" autocomplete="off" autofocus="on" required>
                <input type="submit" value="Add" onclick="SendForm('text','text','./add.php');return false" class="submit" id="add">
            </form>
            <?php if (!empty($items)): ?>
                <ul class="items" id='items'>
                    <?php echo $items ?>
                </ul>
            <?php else : ?>
                <p>You don't have items </p>
            <?php endif; ?>

        </div>
    </body>
</html>