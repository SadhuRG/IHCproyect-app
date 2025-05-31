<?php

namespace App\Services;

use App\Contracts\RedirectionServiceInterface;
use App\Models\User;

class RoleBasedRedirectionService implements RedirectionServiceInterface
{
    private array $redirectionMap;

    public function __construct()
    {
        $this->redirectionMap = [
            'superadministrador' => '/welcome',
            'administrador' => '/dashboard',
            // 'colaborador' => '/',
            // 'usuario' => '/'
        ];
    }

    public function getRedirectPathForUser(User $user): string
    {
        foreach ($this->redirectionMap as $role => $path) {
            if ($user->hasRole($role)) {
                return $path;
            }
        }

        return '/error';
    }
}
