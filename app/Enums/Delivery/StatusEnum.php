<?php

declare(strict_types=1);

namespace App\Enums\Delivery;

enum StatusEnum: string
{
    // @TODO можно изменить тип на int, чтобы ускорить БД в будущем
    case PLANNED = 'planned';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';

    /**
     * Возвращает всевозможные варианты изменения статусов
     *
     * @return array<string, array>
     */
    public static function allowChangeStatuses(): array
    {
        return [
            self::PLANNED->value => [
                self::SHIPPED->value,
            ],
            self::SHIPPED->value => [
                self::DELIVERED->value,
            ],
            self::DELIVERED->value => [],
        ];
    }
}
