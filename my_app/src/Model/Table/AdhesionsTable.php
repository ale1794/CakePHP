<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class AdhesionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Users')
            ->setForeignKey('email')
            ->setBindingKey('users_email')
            ->setDependent(true);
    }
}