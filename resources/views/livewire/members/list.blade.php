<div>
    <div class="card">
        <div class="card-body">
            @if (session()->has('success'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="bg-red-500 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
            @endif
            
            <x-jet-button class="ml-2" wire:click="create()" wire:loading.attr="disabled">
                Create
            </x-jet-button>
            
            @if($isModalOpen)
            @include('livewire.members.create')
            @endif

            <table class="table-responsive w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Mobile</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">DOB</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->id }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email}}</td>
                        <td class="border px-4 py-2">{{ $user->mobile}}</td>
                        <td class="border px-4 py-2">{{ $user->gender}}</td>
                        <td class="border px-4 py-2">{{ $user->dob}}</td>
                        <td class="border px-4 py-2">
                            <x-jet-button class="ml-2 bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4" wire:click="edit({{ $user->id }})" wire:loading.attr="disabled">
                                Edit
                            </x-jet-button>
                            <!-- <x-jet-button class="ml-2 bg-red-500 hover:bg-blue-700 font-bold py-2 px-4" onclick="return confirm('Are you sure?') ? @this.delete({{ $user->id }})" wire:loading.attr="disabled">
                                Delete
                            </x-jet-button> -->

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>