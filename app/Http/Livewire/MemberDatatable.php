<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Attendance;
use App\Repositories\MemberRepository;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use DB;

class MemberDatatable extends LivewireDatatable
{

    public $exportable = true;

    // public $model = User::class;
    
    //public $data = [];
    //public $model = $this->memberRepo->membersReport($data);

    //public $model = DB::table('users');

    public function builder()
    {
        return User::where('id', 1);
        /*return \DB::raw('SELECT (Attendace_Count/26*100) as per,main_query.* from ( SELECT COUNT(att.id) as Attendace_Count, u.* FROM `users` AS u LEFT JOIN `attendances` AS att ON u.id = att.user_id GROUP BY u.id) as main_query WHERE (Attendace_Count/26*100)>3');*/

        /*$categories = \DB::table('users AS u')
                        ->select(\DB::raw('u.*, (SELECT COUNT(t.id) FROM dental_support_tickets t WHERE t.category_id=c.id AND t.status=0) AS num_tickets, (SELECT COUNT(a.id) FROM dental_support_category_admin a WHERE a.category_id=c.id) AS num_admins'))
                        ->where('c.status', 0)
                        ->orderBy('c.title')
                        ->get();*/
    }

    /*public function getAttendancesProperty()
    {
        return Attendance::all();
    }*/
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->sortBy('id'),
  
            Column::name('name')
                ->label('Name'),
  
            Column::name('email'),

            Column::name('mobile'),

            Column::name('gender')
                ->filterable(['Male','Female']),

            /*NumberColumn::name('attendance.user_id:count')
                ->label('Attendance Count'),*/
  
            DateColumn::name('created_at')
                ->label('Creation Date'),

            /*Column::callback(['id', 'name'], function ($id, $name) {
                return view('table-actions', ['id' => $id, 'name' => $name]);
            })*/
        ];
    }
}
