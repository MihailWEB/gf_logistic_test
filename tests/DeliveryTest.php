<?php

declare(strict_types=1);

namespace App\Tests;

use App\Models\Delivery;
use Illuminate\Support\Facades\Event;

class DeliveryTest extends TestCase
{
    public ?Delivery $delivery = null;

    public function setUp(): void
    {
        parent::setUp();

        Event::fake();

        $this->delivery = Delivery::factory()->create(['status' => 'planned']);
    }

    public function testCorrectFlow()
    {
        // Отгрузка
        $response = $this->post('deliveries/' . $this->delivery->id . '/status-change', ['status' => 'shipped']);
        $response->assertOk();
        $this->assertDatabaseHas('deliveries', ['id' => $this->delivery->id, 'status' => 'shipped']);

        // Доставлен
        $response = $this->post('deliveries/' . $this->delivery->id . '/status-change', ['status' => 'delivered']);
        $response->assertOk();
        $this->assertDatabaseHas('deliveries', ['id' => $this->delivery->id, 'status' => 'delivered']);
    }

    /**
     * @TODO добавить все кейсы с изменением на ошибочный статус, в т.ч. создание сразу с нужным статусом
     * также передать несуществующий статус и статус другого типа
     */
}
