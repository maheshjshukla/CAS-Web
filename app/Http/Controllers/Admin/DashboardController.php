<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\User;
use App\Models\Attendance;
use App\Repositories\MemberRepository;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    protected $memberRepo;
    public function __construct(MemberRepository $memberRepo)
    {
        // Set timezone of India
        date_default_timezone_set('Asia/Kolkata');
        $this->memberRepo = $memberRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get count of attendance
        $registered_male_cnt = $this->memberRepo->where('gender', 'male')->where('is_registered', 1)->count();
        $registered_female_cnt = $this->memberRepo->where('gender', 'female')->where('is_registered', 1)->count();
        $registered_youth = $this->memberRepo->where('is_registered', 1)->get();
        $registered_youth_cnt = $registered_youth->where('age','<',40)->count();

        $unregistered_male_cnt = $this->memberRepo->where('gender', 'male')->where('is_registered', 0)->count();
        $unregistered_female_cnt = $this->memberRepo->where('gender', 'female')->where('is_registered', 0)->count();
        $unregistered_youth = $this->memberRepo->where('is_registered', 0)->get();
        $unregistered_youth_cnt = $unregistered_youth->where('age','<',40)->count();
        //$unregistered_youth_cnt = $this->memberRepo->where('is_registered', 0)->count();        

        // Get percent of attendance
        /*$registered_male_per = round(($registered_male_cnt*100)/$this->get_sunday_since_year_start(), 2).'%';
        $registered_female_per = round(($registered_female_cnt*100)/$this->get_sunday_since_year_start(), 2).'%';
        $registered_youth_per = round(($registered_youth_cnt*100)/$this->get_sunday_since_year_start(), 2).'%';

        $unregistered_male_per = round(($unregistered_male_cnt*100)/$this->get_sunday_since_year_start(), 2).'%';
        $unregistered_female_per = round(($unregistered_female_cnt*100)/$this->get_sunday_since_year_start(), 2).'%';
        $unregistered_youth_per = round(($unregistered_youth_cnt*100)/$this->get_sunday_since_year_start(), 2).'%';

        $members = [
            'registered_male'=>array('count'=>$registered_male_cnt,'percent'=>$registered_male_per),
            'registered_female'=>array('count'=>$registered_female_cnt,'percent'=>$registered_female_per),
            'registered_youth'=>array('count'=>$registered_youth_cnt,'percent'=>$registered_youth_per),
            'unregistered_male'=>array('count'=>$unregistered_male_cnt,'percent'=>$unregistered_male_per),
            'unregistered_female'=>array('count'=>$unregistered_female_cnt,'percent'=>$unregistered_female_per),
            'unregistered_youth'=>array('count'=>$unregistered_youth_cnt,'percent'=>$unregistered_youth_per)
        ];*/

        $members = [
            'registered_male'=>array('count'=>$registered_male_cnt),
            'registered_female'=>array('count'=>$registered_female_cnt),
            'registered_youth'=>array('count'=>$registered_youth_cnt),
            'unregistered_male'=>array('count'=>$unregistered_male_cnt),
            'unregistered_female'=>array('count'=>$unregistered_female_cnt),
            'unregistered_youth'=>array('count'=>$unregistered_youth_cnt)
        ];

        return view('admin.dashboard.index', compact('members'));
    }

    function get_sunday_since_year_start($today=null)
    {
        if($today==null) $today = time();

        if(date('D',$today)=='Sun')
            return Date('W',$today);
        else
            return Date('W',$today)-1;
    }

    public function getMembersList(Request $request)
    {
        try {
            $data       = $request->all();
            
            $no_of_days = $this->get_sunday_since_year_start();
            $perfilter  = $data['perfilter'];
            $gender     = $data['gender'];
            $status     = $data['status'];
            $searchText = $data['searchText'];

            $members_all = $this->memberRepo->getAll()->count();
            $members     = $this->memberRepo->membersReport($no_of_days, $perfilter, $gender, $status, $searchText);

            $output = array(
                "draw"            => $data['draw'],
                "iTotalRecords"    => $members_all,
                "recordsFiltered" => count($members),
                "data"            => $members
            );

            //output to json format
            echo json_encode($output);
            
        } catch (Exception $e) {
            return response()->json([
                'status'      => false,
                'status_code' => 200,
                'message'     => $e->getMessage()
            ]);
        }
    }
}
