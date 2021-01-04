<h1>Add User</h1>

<!-- Form con i campi per inserire un nuovo user -->
<?= $this->Form->create() ?>
<?= $this->Form->control('email', [ 'type' => 'text'])?>
<?= $this->Form->control('nome') ?>
<?= $this->Form->control('cognome') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->control('data_di_nascita', ['type' => 'date']) ?>
<?= $this->Form->radio('ruolo', ['socio'=>'Socio', 'guest'=>'Guest']) ?>
<?= $this->Form->button(__('Save User')) ?>
<?= $this->Form->end() ?>