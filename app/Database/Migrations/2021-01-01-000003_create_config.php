<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateConfig extends Migration
{
    public function up()
    {
        $this->db->simpleQuery("
        CREATE TABLE `config` (
            `key` VARCHAR(255) NOT NULL,
            `value` VARCHAR(255) NULL DEFAULT NULL,
            PRIMARY KEY (`key`)
        )");
    }

    public function down()
    {
        $this->forge->dropTable('config');
    }
}
