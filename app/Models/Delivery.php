<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель доставки
 *
 * @TODO сделать soft deletable, добавить кем был изменен статус, когда создан и когда обновлен
 * @TODO также добавить json поле для доп информации
 * @TODO подумать об историчности
 *
 * @property int $id
 * @property string $status
 */
class Delivery extends Model
{
    use HasFactory;
}
