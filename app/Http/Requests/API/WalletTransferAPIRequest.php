<?php

namespace App\Http\Requests\API;

use App\Enums\PaymentMethodsTypeEnum;
use Illuminate\Validation\Rules\Enum;

class WalletTransferAPIRequest extends APIRequest {

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
            'sender_id'  => 'required|exists:users,id|exists:wallets',
            'recipient_id'  => 'required|exists:users,id|exists:wallets',
            'amount' => 'required',
        ];
    }

}
