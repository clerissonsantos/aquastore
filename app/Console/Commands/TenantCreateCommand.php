<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;

class TenantCreateCommand extends Command
{
    protected $signature = 'tenant:create {name}';

    protected $description = 'Criar um novo Tenant';

    public function handle(): void
    {
        $tenant1 = Tenant::create(['id' => $this->argument('name')]);
        $tenant1->domains()->create(['domain' => $this->argument('name') . env('APP_DOMAIN', 'localhost')]);
        $this->call('php artisan tenants:migrate');
    }
}
