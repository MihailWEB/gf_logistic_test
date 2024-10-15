<?php

declare(strict_types=1);

namespace App\Observers;

use App\Enums\Delivery\StatusEnum;
use App\Events\DeliveryDelivered;
use App\Models\Delivery;

class DeliveryObserver
{
    public function saved(Delivery $delivery): void
    {
        if ($delivery->wasChanged('status') && $delivery->status === StatusEnum::DELIVERED) {
            event(new DeliveryDelivered($delivery));
        }
    }
}
