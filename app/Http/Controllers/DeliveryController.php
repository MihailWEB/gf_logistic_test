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
    public function statusChange(ChangeStatusRequest $request, Delivery $delivery)
    {
        $validatedData = $request->validated();
        $deliveryService = new DeliveryService($delivery);

        if (!$deliveryService->changeStatus($validatedData['status'])) {
            return response()->json(['result' => 'error'], Response::HTTP_OK);
        }

        return response()->json(['result' => 'success'], Response::HTTP_OK);
    }
}
