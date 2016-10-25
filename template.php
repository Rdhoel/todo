<li>
    <span class="item <?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['text']; ?></span>
    <?php if (!$item['done']): ?>
        <input type="button" id="show" class="reply done-button" value="Done" onclick="GetForm('./mark.php?as=done&item=<?php echo $item['id']; ?>');return false">

    <?php else: ?>
        <input type="button" id="show" class="reply undone-button" value="Done" onclick="GetForm('./mark.php?as=not-done&item=<?php echo $item['id']; ?>');return false">
    <?php endif; ?>
    <input type="button" id="show" class="reply delete-button" value="Delete" onclick="GetForm('./delete.php?item=<?php echo $item['id'] ?>');return false">


    <form id="item<?php echo $item['id'] ?>" class="answer" style="display:none" method="post" action="">
        <input type="text" id ="text<?php echo $item['id'] ?>" name="text" placeholder="Type a new text of item" class="input" autocomplete="off" autofocus="on" required>
        <input type="submit" value="Update" class="submit" id="update" onclick="SendForm('text<?php echo $item['id'] ?>', 'text', './update.php?item=<?php echo $item['id'] ?>');
                return false">
    </form>
    <input type="button" id="show" class="reply done-button" value="Update" onclick="disp(document.getElementById('item<?php echo $item['id'] ?>'))" />

    <form id="item-answer<?php echo $item['id'] ?>" class="answer" style="display:none" method="post" action="">
        <input type="text" id ="text-answer<?php echo $item['id'] ?>" name="text" placeholder="Type a new itme" class="input" autocomplete="off" autofocus="on" required>
        <input type="submit" value="Create" class="submit" id="answer" onclick="SendForm('text-answer<?php echo $item['id'] ?>', 'text', './add.php?item=<?php echo $item['id'] ?>');
                return false">
    </form>
    <input type="button" id="show" class="reply done-button" value="Create" onclick="disp(document.getElementById('item-answer<?php echo $item['id'] ?>'))" />
</li>
<?php if (array_key_exists('childs', $item)): ?>
    <ul class='items child'>
        <?php echo commentsString($item['childs']); ?>
    </ul>
<?php endif; ?>
