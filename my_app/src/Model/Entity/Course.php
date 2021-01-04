<?php
// src/Model/Entity/User.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Course extends Entity
{
    protected $_accessible = [
        '*' => true,
    ];
}