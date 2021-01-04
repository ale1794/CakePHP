<!-- File dedicato all'admin -->

<h1>Admin <?= $user ?></h1> <button type="button"><?= $this->Html->link('Log Out', ['action' => 'logout']) ?></button>

<!-- Azioni sui corsi -->
<h3>CORSI</h3>
<ul>
    <li><?= $this->Html->link('Inserisci', ['controller'=>'Courses', 'action' => 'addCourse']) ?></li>
    <li><?= $this->Html->link('Modifica', ['controller'=>'Courses', 'action' => 'editCourse']) ?></li>
    <li><?= $this->Html->link('Visualizza', ['controller'=>'Courses', 'action' => 'showCourses']) ?></li>
</ul>

<!-- Azioni sulle adesioni -->
<h3>ADESIONI</h3>
<ul>
    <li><?= $this->Html->link('Convalida', ['controller'=> 'Adhesions', 'action' => 'processRequest']) ?> </li>
    <li><?= $this->Html->link('Visualizza', ['controller'=> 'Adhesions', 'action' => 'showRequests']) ?></li>
</ul>


