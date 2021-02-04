<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLogin extends Migration
{

    public function up()
    {
        $this->db->simpleQuery("
        CREATE TABLE `user` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(255) NULL DEFAULT NULL,
            `email` VARCHAR(255) NULL DEFAULT NULL,
            `avatar` VARCHAR(255) NULL DEFAULT NULL,
            `password` VARCHAR(255) NULL DEFAULT NULL,
            `role` VARCHAR(50) NULL DEFAULT NULL,
            `otp` VARCHAR(50) NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `email` (`email`),
            INDEX `role` (`role`)
        )");

        // Fill the table

        $this->db->table('user')->insertBatch([
            [
                'id' => 1,
                'name' => 'My Admin',
                'email' => 'admin',
                'password' => password_hash('admin', PASSWORD_BCRYPT),
                'role' => 'admin',
            ], [
                'id' => 2,
                'name' => 'My User',
                'email' => 'user',
                'password' => password_hash('user', PASSWORD_BCRYPT),
                'role' => 'user',
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
