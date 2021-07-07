<div>
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
    <div class="card">
        <div class="card-body">

            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        <label for="name"
                            class="block text-gray-700 text-sm font-bold mb-2">Select Member:</label>
                        <select class="form-control name" id="name" wire:model="name">
                            <option value="">Select Member</option>
                            @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>                
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Mark as Present
                        </button>
                    </span>
                    <!-- <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalPopover()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancel
                        </button>
                    </span> -->
                </div>
            </form>

        </div>
    </div>
</div>

@push('scripts')

<script>
    $(document).ready(function () {
        $('#name').select2();
        $('.name').val(@this.name).trigger('change');
        /*$('#name').on('change', function (e) {
            var item = $('#name').select2("val");
            @this.set('user_id', item);
        });*/

        /*$('#name').on('change', function (e) {
            livewire.emit('name', e.target.value)
        });*/
    });
</script>

@endpush