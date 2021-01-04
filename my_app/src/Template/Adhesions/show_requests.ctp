<h1>Richieste di adesione</h1>
<table>
    <tr><th>E-mail socio</th><th>Stato richiesta</th></tr>
    <?php foreach($richieste as $richiesta) : ?>
        <tr><td><?= $richiesta->users_email ?></td><td><?= $richiesta->stato ?></td></tr>
        <?php endforeach; ?>
</table>
<?= $this->Html->link('Indietro', ['controller' => 'Users','action' => 'index']) ?>