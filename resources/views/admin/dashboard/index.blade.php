<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <!-- Registered Members component Start -->
                <div>
                    <div class="container px-6 mx-auto grid">
                        <h2 class="my-6 text-1.5xl font-semibold text-gray-700">
                            Registered Members Status
                        </h2>

                        <div class="grid gap-6 mb-6 md:grid-cols-2 xl:grid-cols-3">
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600">
                                        Total Registered Male
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700">
                                        {{ $members['registered_male']['count'] ?? 0 }}
                                        <!-- ({{ $members['registered_male']['percent'] ?? 0 }}) -->
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600">
                                        Total Registered Female
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700">
                                        {{ $members['registered_female']['count'] ?? 0 }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                                <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600">
                                        Total Registered Youth
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700">
                                        {{ $members['registered_youth']['count'] ?? 0 }}
                                    </p>
                                </div>
                            </div>

                            <!-- <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                                <div
                                    class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="8" r="7"></circle>
                                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600">
                                        User vip
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700">
                                        828
                                    </p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- Registered Members component End -->

                <!-- Unregistered Members component Start -->
                <div>
                    <div class="container px-6 mx-auto grid">
                        <h2 class="my-6 text-1.5xl font-semibold text-gray-700">
                            Unregistered Members Status
                        </h2>

                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600">
                                        Total Unregistered Male
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700">
                                        {{ $members['unregistered_male']['count'] ?? 0 }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600">
                                        Total Unregistered Female
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700">
                                        {{ $members['unregistered_female']['count'] ?? 0 }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                                <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600">
                                        Total Unregistered Youth
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700">
                                        {{ $members['unregistered_youth']['count'] ?? 0 }}
                                    </p>
                                </div>
                            </div>

                            <!-- <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                                <div
                                    class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="8" r="7"></circle>
                                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600">
                                        User vip
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700">
                                        828
                                    </p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- Unregistered Members component End -->

                <div>
                    <div class="container px-6 mx-auto grid">
                        <h2 class="my-6 text-1.5xl font-semibold text-gray-700">
                            Members Report
                        </h2>
                        
                        <div class="container">

                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="mb-4">
                                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                                    <select class="status" id="status">
                                        <option value="">Select Status</option>
                                        <option value="1">Registered</option>
                                        <option value="0">Unregistered</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender:</label>
                                    <select class="gender" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="att_per" class="block text-gray-700 text-sm font-bold mb-2">Attendance Percent:</label>
                                    <input type="number" class="shadow appearance-none border rounded w-half py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="att_per" placeholder="Enter Percent e.g. 50">
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button type="button" id="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"> Submit </button>
                                </span>
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button type="button" id="clear" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"> Clear </button>
                                </span>
                            </div>

                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Gender</th>
                                        <th>Count</th>
                                        <th>Percent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>                    
                                 
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
      $(function () {
          
        var table = $('.data-table').DataTable({
            dom: 'Bfrtip',
            buttons: ['csv'],
            "processing": true,
            "serverSide": true,
            "ordering"  : true,
            "responsive" : true,
            "lengthMenu": [10, 25, 50, 75, 100, 500],
            ajax: {
              url: "{{ url('admin/members-report') }}",
              data: function (d) {
                    d.status = $('#status').val(),
                    d.gender = $('#gender').val(),
                    d.perfilter = $('#att_per').val(),
                    d.searchText = $('input[type="search"]').val()
                }
            },
            columns: [
                {data: 'id',      name: 'id'},
                {data: 'name',    name: 'name'},
                {data: 'email',   name: 'email'},
                {data: 'mobile',  name: 'mobile'},
                {data: 'gender',  name: 'gender'},
                {data: 'attendace_count', name: 'attendace_count'},
                {data: 'percent', name: 'percent'}
            ]
        });
      
        // On Status Filter Change
        $('#status').change(function() {
            table.draw();
        });

        // On Gender Filter Change
        $('#gender').change(function() {
            table.draw();
        });
        
        // On Percent Filter
        $("#submit").click(function(e) {
            table.draw();
        });

        // Clear Filter
        $("#clear").click(function(e) {
            $('#status').prop('selectedIndex',0);
            $('#gender').prop('selectedIndex',0);
            $('#att_per').val('');
            table.draw();
        });

        // Download CSV
        $(document).on('click','#retailer_download_btn', function() {
          var down_ret_type     = $('input[name="ret_type_radio"]:checked').val();
          var down_openat_days  = $('#download_openat_days option:selected').val();
          var down_openat_time  = $('#down_openat_time').val();
          var retailer_ids  = '';

          window.open(site_url+'download_retailers_csv?retailer_type_flag='+down_ret_type+'&retailer_open_days='+down_openat_days+'&down_openat_time='+down_openat_time+'&retailer_ids='+retailer_ids, '_blank');
          $("#retailer_download").modal("hide");
        });

    });
    </script>
    
</x-app-layout>
