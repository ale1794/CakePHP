<h1>Aggiungi corso</h1>

<?= $this->Form->create() ?>
<?= $this->Form->control('nome', [ 'type' => 'text']) ?>
<?= $this->Form->control('numero_ore', [ 'type' => 'text']) ?>
<?= $this->Form->control('numero_iscritti', [ 'type' => 'text']) ?>
<?= $this->Form->button(__('Aggiungi')) ?>
<?= $this->Form->end() ?>
<?= $this->Html->link('Indietro', ['controller' => 'Users','action' => 'index']) ?>