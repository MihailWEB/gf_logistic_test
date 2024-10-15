<?php

declare(strict_types=1);

namespace App\Http\Requests\Delivery;

use App\Enums\Delivery\StatusEnum;
use Illuminate\Validation\Rule;
use RonasIT\Support\BaseRequest;

class ChangeStatusRequest extends BaseRequest
{
    // @TODO
    public function authorize(): bool
    {
        return true;
    }

    // @TODO создать коллекцию ошибок
    public function rules(): array
    {
        return [
            'status' => ['required', 'string', Rule::enum(StatusEnum::class)],
        ];
    }
}
