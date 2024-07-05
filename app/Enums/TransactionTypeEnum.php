<?php

namespace App\Enums;

enum TransactionTypeEnum:int {

    case deposit = 1;
    case transfer = 2;
    case withdrawal = 3;


}
