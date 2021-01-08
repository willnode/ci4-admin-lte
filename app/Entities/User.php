<?php

namespace App\Entities;

use CodeIgniter\Entity;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 */
class User extends Entity
{
    protected $casts = [
        'id' => 'integer',
    ];

    public function sendVerifyEmail() {
        // TODO
    }
}
