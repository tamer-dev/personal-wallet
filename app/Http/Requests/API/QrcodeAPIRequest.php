<?php

namespace App\Http\Requests\API;

use App\Enums\PaymentMethodsTypeEnum;
use Illuminate\Validation\Rules\Enum;

class QrcodeAPIRequest extends APIRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'user_id'  => 'required|exists:users,id|exists:wallets',
            'amount' => 'required',
        ];
    }

}
