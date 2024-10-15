<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\Delivery\StatusEnum;
use App\Models\Delivery;
use App\Repositories\RoleRepository;

/**
 * @property RoleRepository $repository
 * @mixin RoleRepository
 */
class DeliveryService
{
    private $delivery;

    public function __construct(Delivery $delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * Меняем статус у доставки
     *
     * @param string $status
     * @return bool
     */
    public function changeStatus(string $status): bool
    {
        if (!$this->canChangeStatus($this->delivery->status, $status)) {
            return false;
        }

        $this->delivery->status = $status;
        $this->delivery->save();

        return true;
    }

    /**
     * @param string $currentStatus
     * @param string $newStatus
     * @return bool
     */
    private function canChangeStatus(string $currentStatus, string $newStatus): bool
    {
        return $currentStatus !== $newStatus
            && in_array($newStatus, StatusEnum::allowChangeStatuses()[$currentStatus]);
    }
}
