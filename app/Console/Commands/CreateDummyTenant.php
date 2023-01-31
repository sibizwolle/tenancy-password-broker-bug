<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;

class CreateDummyTenant extends Command
{
    protected $signature = 'tenants:create:dummy';

    public function handle(): int {
        $tenant = Tenant::create();
        return Command::SUCCESS;
    }
}