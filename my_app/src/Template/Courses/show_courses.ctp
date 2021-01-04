<h1>Corsi</h1>
<table>
    <tr><th>Nome</th><th>Numero ore</th><th>Numero iscritti</th></tr>
    <?php foreach($corsi as $corso) : ?>
        <tr><td><?= $corso->nome ?></td><td><?= $corso->numero_ore ?></td><td><?= $corso->numero_iscritti ?></td></tr>
        <?php endforeach; ?>
</table>
<?= $this->Html->link('Indietro', ['controller' => 'Users','action' => 'index']) ?>