<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('email')?>
<br>
<?= $this->Form->input('password') ?>
<br>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>