<?= $this->extend('layouts/main') ?>
<?= $this->include('templates/navbar') ?>
<h2> Register </h2>
<form method="post" action="<?= base_url('/store')?>">
    <?= csrf_field() ?>
    <input type="text" name="name" placeholder="username" required /><br>
    <input type="text" name="email" placeholder="Email" required /><br>
    <input type="password" name="password" placeholder="Password" required /><br>
    <button type="submit" >Register</button>
</form>
