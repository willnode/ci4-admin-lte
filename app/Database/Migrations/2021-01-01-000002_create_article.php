<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticle extends Migration
{
    public function up()
    {
        $this->db->simpleQuery("
        CREATE TABLE `article` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) NULL DEFAULT NULL,
            `content` MEDIUMTEXT NULL DEFAULT NULL,
            `category` VARCHAR(50) NULL DEFAULT NULL,
            `user_id` INT(11) NULL DEFAULT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`id`),
            INDEX `category` (`category`)
        )");

        // Fill the table

        $this->db->table('article')->insertBatch([
            [
                'id' => 1,
                'title' => 'About Us',
                'content' => '<p>This is a template</p>',
                'category' => 'page',
                'user_id' => 1,
            ],  [
                'id' => 2,
                'title' => 'FAQ',
                'content' => '<p>This is a template</p>',
                'category' => 'page',
                'user_id' => 1,
            ],  [
                'id' => 3,
                'title' => 'Contact',
                'content' => '<p>This is a template</p>',
                'category' => 'page',
                'user_id' => 1,
            ],  [
                'id' => 4,
                'title' => 'Privacy',
                'content' => '<p>This is a template</p>',
                'category' => 'page',
                'user_id' => 1,
            ],  [
                'id' => 5,
                'title' => 'Service',
                'content' => '<p>This is a template</p>',
                'category' => 'page',
                'user_id' => 1,
            ],  [
                'id' => 6,
                'title' => 'Info 1',
                'content' => '<p>This is a template</p>',
                'category' => 'info',
                'user_id' => 2,
            ],  [
                'id' => 7,
                'title' => 'Info 2',
                'content' => '<p>This is a template</p>',
                'category' => 'info',
                'user_id' => 2,
            ],  [
                'id' => 8,
                'title' => 'News 1',
                'content' => '<p>This is a template</p>',
                'category' => 'news',
                'user_id' => 2,
            ],  [
                'id' => 9,
                'title' => 'News 2',
                'content' => '<p>This is a template</p>',
                'category' => 'news',
                'user_id' => 2,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('article');
    }
}
