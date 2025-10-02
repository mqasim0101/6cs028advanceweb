<!DOCTYPE html>
<html>
<head>
    <title>Add Message</title>
</head>
<body>

<h1>Add Message</h1>

<?php if (isset($validation)): ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="/message/store" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label><br>
    <input type="text" name="title" id="title" value="<?= set_value('title') ?>"><br><br>

    <label for="body">Body</label><br>
    <textarea name="body" id="body" rows="5"><?= set_value('body') ?></textarea><br><br>

    <button type="submit">Add Message</button>
</form>

</body>
</html>