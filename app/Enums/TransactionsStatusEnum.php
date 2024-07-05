<?php

namespace App\Enums;

enum TransactionsStatusEnum:int {

    case new = 1;
    case pending = 2;
    case completed = 3;


}
