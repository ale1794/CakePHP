<h1>Richieste in attesa di adesione...</h1>
<hr>
<?php foreach ($richieste as $richiesta) : ?>
    <?= $this->Form->create() ?>
    <h3><?= $richiesta->users_email ?></h3>
    <?= $this->Form->control('email', ['type' => 'hidden', 'value'=> $richiesta->users_email]) ?>
    <?= $this->Form->button('Accetta', ['name' => 'stato', 'value' => 'Accettata']) ?>
    <?= $this->Form->button('Rifiuta', ['name' => 'stato', 'value' => 'Rifiutata']) ?>
    <?= $this->Form->end() ?>
<?php endforeach; ?>

<?= $this->Html->link('Indietro', ['controller' => 'Users','action' => 'index']) ?>
