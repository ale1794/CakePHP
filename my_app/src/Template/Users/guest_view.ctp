
<!-- File dedicato all'user guest -->
<h1>Guest: <?= $user ?></h1> <button type="button"><?= $this->Html->link('Log Out', ['action' => 'logout']) ?></button>

<!-- Azioni sulle adesioni -->
<h3>ADESIONI</h3>
<ul>
    <li><?= $this->Html->link('Visualizza', ['controller'=> 'Adhesions', 'action' => 'showRequests']) ?></li>
</ul>