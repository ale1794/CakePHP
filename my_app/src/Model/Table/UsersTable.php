<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasOne('Adhesions')
            ->setForeignKey('users_email')
            ->setBindingKey('email')
            ->setDependent(true);

    }
}