<?php

namespace App\Models;

use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;

class Tenant extends \Stancl\Tenancy\Database\Models\Tenant implements TenantWithDatabase
{
    use HasDatabase;
}