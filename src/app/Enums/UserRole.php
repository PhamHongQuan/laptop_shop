<?php

namespace App\Enums;

enum UserRole: int
{
    case Customer = 0;
    case Admin = 1;
}
