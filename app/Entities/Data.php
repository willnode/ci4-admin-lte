<?php

namespace App\Entities;

use App\Models\UserModel;
use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

/**
 * @property int $id
 * @property string $title
 * @property ContentInside[] $content
 * @property DataInside $data
 * @property User $user
 * @property int $user_id
 * @property Time $created_at
 * @property Time $updated_at
 */
class Data extends Entity
{
    protected $casts = [
        'id' => 'integer',
        'data' => 'json',
    ];

    public function getUser()
    {
        return $this->user_id ? (new UserModel())->find($this->user_id) : null;
    }

    public function setUser(User $x)
    {
        $this->user_id = $x->id;
    }

    public function setContent($x)
    {
        $this->attributes['content'] = json_encode($x, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    public function getContent()
    {
       return json_decode($this->attributes['content']);
    }
}

/**
 * @property ColumnInside[] $header
 * @property array $data
 * @property string $step
 */
class DataInside
{
}

/**
 * @property string $title
 * @property int $min
 * @property int $max
 */
class ColumnInside
{
}

/**
 * @property string $head
 * @property string $body
 * @property int[] $columns
 * @property int $min
 * @property int $max
 */
class ContentInside
{
}
