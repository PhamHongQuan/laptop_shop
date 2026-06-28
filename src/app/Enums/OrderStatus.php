<?php

namespace App\Enums;

enum OrderStatus: int
{
    case Pending = 0;
    case Confirmed = 1;
    case Shipping = 2;
    case Completed = 3;
    case Cancelled = 4;
}
