<?php

namespace App\Service;

use App\Models\User;

class AdminService
{
    public function getAdmins():array
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get()->toArray();
    }
}
?>
