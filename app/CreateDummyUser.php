<?php

namespace App;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Password;
use Stancl\Tenancy\Contracts\TenantWithDatabase;

class CreateDummyUser
{
    public function __construct(private TenantWithDatabase $tenant)
    {
    }

    public function handle(): void {
        $this->tenant->run(function() {
            $user = User::factory()->create();
            Password::sendResetLink(['email' => $user->email], function (User $user, $token){
                $user->notify(new ResetPassword($token));
            });
        });
    }
}