<?php

namespace App\Repositories;

use App\Models\User;
use DB;

/**
 * User Repository based on Eloquent
 */
class MemberRepository extends EloquentRepository
{

    protected $model;

    function __construct(User $user)
    {
        $this->model = $user;
    }

    function membersReport($no_of_days=0, $perfilter=0, $gender='', $status='', $searchText='')
    {
        $status_query = " ";
        if(!empty($status))
            $status_query = " and u.is_registered = '$status' ";

        $gender_query = " ";
        if(!empty($gender))
            $gender_query = " and u.gender = '$gender' ";

        $result = DB::select(DB::raw("SELECT ((attendace_count*100)/ '$no_of_days') AS percent, main_query.* from ( SELECT COUNT(att.id) AS attendace_count, u.* FROM users AS u LEFT JOIN attendances AS att ON u.id = att.user_id where u.deleted_at is NULL AND (u.name LIKE '%$searchText%' OR u.email LIKE '%$searchText%' OR u.gender LIKE '%$searchText%' OR u.mobile LIKE '%$searchText%' OR u.dob LIKE '%$searchText%') $status_query $gender_query GROUP BY u.id) AS main_query WHERE (attendace_count/ '$no_of_days' *100)>= '$perfilter' "));

        return $result;
    }

}
