<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Attendance;
use DB;

/**
 * User Repository based on Eloquent
 */
class AttendanceRepository extends EloquentRepository
{

    protected $model;

    function __construct(Attendance $attendance)
    {
        $this->model = $attendance;
    }

    public function UsersAttendaceExist($user_id)
    {
        return $this->model->where('user_id', $user_id)->get();
    }
}