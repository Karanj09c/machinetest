<?php
namespace Modules\Admin\app\Helper;

use App\Models\User;
use Modules\Admin\App\Models\Doctor;

class Helper
{
    public static function userVerifiedCount()
    {
        $users = User::where('status',1)->select("id")->count();
        return $users;
    }

    public static function userUnVerifiedCount()
    {
        $users = User::where('status',0)->select("id")->count();
        return $users;
    }

    public static function getAllDoctorCount()
    {
        $doctors = Doctor::count();
        return $doctors;
    }
}
