<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminService
{
    
    /**
     * Get Admin Details
     *
     * @return User
     * 
     * @throws ModelNotFoundException
     */
    public static function getAdminDetails()
    {
        return User::where('email', config('system.administrator.email'))->firstOrFail();
    }


    /**
     * Notify the admin
     *
     * @param mixed $instance
     * @return void
     */
    public static function notify($instance)
    {
        return self::getAdminDetails()->notify($instance);
    }
}