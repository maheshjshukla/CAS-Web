<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Repositories\MemberRepository;

class Member extends Component
{
    public $users, $user_id, $name, $email, $mobile, $is_registered=1, $gender, $date_of_birth;
    public $isModalOpen = 0;
    public $deleteId = '';
    protected $listeners = ["date_of_birth" => 'getSelectedDate'];

    public function render(MemberRepository $memberRepo)
    {
        $this->users = $memberRepo->getAll();
        return view('livewire.members.list');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->name          = '';
        $this->email         = '';
        $this->mobile        = '';
        $this->gender        = '';
        $this->date_of_birth = '';
    }
    
    public function store(MemberRepository $memberRepo)
    {
        $this->validate([
            'name'          => 'required|string|min:3|max:100',
            'email'         => 'required|email:rfc,dns|max:255',
            'mobile'        => 'required|numeric|regex:/^(\d)[0-9]{7,16}$/', //{7,16} for international numbers
            'gender'        => 'required|in:male,female',
            'date_of_birth' => 'required',
            'is_registered' => 'required|numeric'
        ]);

        try {
            $memberData = [
                'name'          => $this->name,
                'email'         => $this->email,
                'mobile'        => $this->mobile,
                'gender'        => $this->gender,
                'dob'           => $this->date_of_birth,
                'is_registered' => $this->is_registered
            ];

            if(!empty($this->user_id)) { // Update
                $memberData['id'] = $this->user_id;
                $member = $memberRepo->edit($memberData);
            }
            else { // Add
                $member = $memberRepo->add($memberData);
            }

            session()->flash('success', $this->user_id?'User updated.':'User created.'); // Set Success Flash Message

        } catch(\Exception $e) {
            session()->flash('error','Something went wrong!!'); // Set Error Flash Message
        }

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit(MemberRepository $memberRepo, $id)
    {
        try {
            $user = $memberRepo->get($id);
            if(!empty($user)) {
                $this->user_id       = $id;
                $this->name          = $user->name;
                $this->email         = $user->email;
                $this->mobile        = $user->mobile;
                $this->gender        = $user->gender;
                $this->date_of_birth = $user->dob;
                $this->is_registered = $user->is_registered;
            
                $this->openModalPopover();
            }
            else {
                session()->flash('error','User Not Found.'); // Set Error Flash Message
            }

        } catch(\Exception $e) {
            session()->flash('error','Something went wrong!!'); // Set Error Flash Message
        }
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    
    public function delete(MemberRepository $memberRepo)
    {
        try {
            $memberRepo->delete($this->deleteId);
            session()->flash('success', 'User deleted.'); // Set Success Flash Message
        
        } catch(\Exception $e) {
            session()->flash('error', 'Something went wrong!!'); // Set Error Flash Message
        }
    }

    public function getSelectedDate( $date ) {
        $this->date_of_birth = $date;
    }
}
