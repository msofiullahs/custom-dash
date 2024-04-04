<?php

namespace App\Http\Controllers;
use App\Models\ActivityLog;

abstract class Controller
{

    protected function storeActivity($userId = null, $act)
    {
        $log = new ActivityLog();
        $log->user_id = $userId;
        $log->activity = json_encode($act);
        $log->save();
    }

}
