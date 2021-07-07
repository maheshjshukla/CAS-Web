<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Attendance;
use App\Repositories\MemberRepository;
use App\Repositories\AttendanceRepository;
use Carbon\Carbon;

class Attendances extends Component
{
    public $members, $user_id, $name;
    protected $memberRepo, $attendanceRepo;

    public function render(MemberRepository $memberRepo)
    {
        $this->memberRepo     = $memberRepo;
        date_default_timezone_set('Asia/Kolkata');
        // if(date('D') == 'Sun') {
            $this->members = $this->memberRepo->getAll();
            return view('livewire.attendances.attendance');
        // }
        // else {
        //     return view('livewire.attendances.info');
        // }
    }

    public function store(AttendanceRepository $attendanceRepo)
    {
        //$this->memberRepo     = $memberRepo;
        //$this->attendanceRepo = $attendanceRepo;

        $this->validate([
            'name' => 'required'
        ]);

        $this->user_id = $this->name;

        try {
            $user_att = $attendanceRepo->where('user_id',$this->user_id)->whereDate('created_at',Carbon::today())->get()->toArray();
            
            if(empty($user_att)) { // If no attendance marks for today
                $attendanceData = [
                    'user_id' => $this->user_id
                ];

                $attendance = $attendanceRepo->add($attendanceData);
                session()->flash('success', 'User Marked as Present.'); // Set Success Flash Message
            }
            else {
                session()->flash('error', 'User Already Marked as Present.'); // Set Error Flash Message
            }
        } catch(\Exception $e) {
            session()->flash('error','Something went wrong!!'); // Set Error Flash Message
        }
    }
}
