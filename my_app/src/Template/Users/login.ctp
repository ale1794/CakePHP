<h1>Login</h1>

<!-- Form con i campi utili per il login -->
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>

<!-- Link con riferimento al file add_user per registrarsi -->
<p><?= $this->Html->link('Richiedi adesione', ['action' => 'addUser']) ?></p>