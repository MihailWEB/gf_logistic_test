<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Delivery\ChangeStatusRequest;
use App\Models\Delivery;
use App\Services\DeliveryService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\Response;

class DeliveryController extends Controller
{
    // @TODO response возвращать что-то нормальное
    public function statusChange(ChangeStatusRequest $request, Delivery $delivery)
    {
        $validatedData = $request->validated();
        $deliveryService = new DeliveryService($delivery);

        if (!$deliveryService->changeStatus($validatedData['status'])) {
            // @TODO любой return вызывает ошибку Allowed memory size
            echo 'error';
            exit();

            return response()->json('error', Response::HTTP_OK);
        }

        // @TODO любой return вызывает ошибку Allowed memory size
        echo 'success';
        exit();

        return response()->json('success', Response::HTTP_OK);
    }
}
