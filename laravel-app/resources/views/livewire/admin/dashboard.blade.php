<div>
    @include('sweetalert::alert')
    <!-- Card stats -->
    {{-- @include('') --}}
    @if ($notif_user->count()> 0)
        @foreach ($notif_user as $user)
            @foreach ($user->unreadNotifications as $notification)
                {{-- @if ($notification->data['type'] == 'User Regis') --}}
                    <div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
                        <div class=" inline-flex items-center justify-between w-full">
                            <div class="inline-flex items-center">
                                <img src="https://cdn-icons-png.flaticon.com/512/893/893257.png" alt="Messages Icon"
                                    class="w-6 h-6 mr-3">
                                <h3 class="font-bold text-base text-gray-800">{{ $notification->data['type'] }}</h3>
                            </div>
                            <p class="text-xs text-gray-500">
                               {{$notification->created_at}}
                               <x-jet-danger-button wire:click='read({{$user->id}})'>X</x-jet-danger-button>
                            </p>
                        </div>
                        <p class="mt-1 text-sm">
                            {{ $notification->data['body'] }}
                        </p>
                    </div>
                {{-- @endif --}}
            @endforeach
        @endforeach
    @endif
    @if ($notif_bayar->count()> 0)
        @foreach ($notif_bayar as $bayar)
            @foreach ($bayar->unreadNotifications as $notification)
                {{-- @if ($notification->data['type'] == 'User Regis') --}}
                    <div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
                        <div class=" inline-flex items-center justify-between w-full">
                            <div class="inline-flex items-center">
                                <img src="https://cdn-icons-png.flaticon.com/512/893/893257.png" alt="Messages Icon"
                                    class="w-6 h-6 mr-3">
                                <h3 class="font-bold text-base text-gray-800">{{ $notification->data['type'] }}</h3>
                            </div>
                            <p class="text-xs text-gray-500">
                               {{$notification->created_at}}
                               <x-jet-danger-button wire:click='readBayar({{$bayar->id}})'>X</x-jet-danger-button>
                            </p>
                        </div>
                        <p class="mt-1 text-sm">
                            {{ $notification->data['body'] }}
                        </p>
                    </div>
                {{-- @endif --}}
            @endforeach
        @endforeach
    @endif
    <div class="flex flex-wrap py-10">
        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-reddarken uppercase font-bold text-xs">
                                Penjualan
                            </h5>
                            <span class="font-semibold text-xl text-reddarken">
                               Rp. {{number_format($penjualan,0,2)}}
                            </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="text-sm text-white mt-4">
                        <span class="text-emerald-500 mr-2">
                            <i class="fas fa-arrow-up"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap">
                            Since last month
                        </span>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-reddarken uppercase font-bold text-xs">
                                Jumlah Pengguna
                            </h5>
                            <span class="font-semibold text-xl text-reddarken">
                                {{$user_use}}
                            </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-green-500">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="text-sm text-white mt-4">
                        <span class="text-red-500 mr-2">
                            <i class="fas fa-arrow-down "></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap"> Since last week </span>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-reddarken uppercase font-bold text-xs">
                                Jumlah Barang
                            </h5>
                            <span class="font-semibold text-xl text-reddarken">
                                {{$jm_barang}}
                            </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-reddarken">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="text-sm text-white mt-4">
                        <span class="text-orange-500 mr-2">
                            <i class="fas fa-arrow-down"></i> 1.10%
                        </span>
                        <span class="whitespace-nowrap"> Since yesterday </span>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-reddarken uppercase font-bold text-xs">
                                Performance
                            </h5>
                            <span class="font-semibold text-xl text-reddarken">
                                49,65%
                            </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div
                                class="text-reddarken p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                                <i class="fas fa-percent"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="text-sm text-white mt-4">
                        <span class="text-emerald-500 mr-2">
                            <i class="fas fa-arrow-up"></i> 12%
                        </span>
                        <span class="whitespace-nowrap">
                            Since last month
                        </span>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-8">
    <div class="flex flex-wrap">
        <div class="w-full xl:w-4/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h6 class="uppercase text-reddarken mb-1 text-xs font-semibold">
                                Diagram
                            </h6>
                            <h2 class="text-reddarken text-xl font-semibold">
                                Total Penjualan
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="p-4 flex-auto">
                    <!-- Chart -->
                    <div class="relative h-350-px">
                        <canvas id="bar-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script type="text/javascript">
        /* Make dynamic date appear */
        (function() {
            if (document.getElementById("get-current-year")) {
                document.getElementById("get-current-year").innerHTML =
                    new Date().getFullYear();
            }
        })();
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }
        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-start"
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }

        var url = "{{ url('stock/chart') }}";
        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();
        $(document).ready(function() {
            $.get(url, function(response) {
                response.forEach(function(data) {
                    Years.push(data.tgl_perolehan);
                    Labels.push(data.id);
                    Prices.push(data.harga);
                    console.log(data.updated_at)
                });
                var ctx = document.getElementById("bar-chart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Years,
                        datasets: [{
                            label: 'Infosys Price',
                            data: Prices,
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        tooltip: {
                            callbacks: {
                                labelColor: function(context) {
                                    return {
                                        borderColor: 'rgb(0, 0, 255)',
                                        backgroundColor: 'rgb(255, 0, 0)',
                                        borderWidth: 2,
                                        borderDash: [2, 2],
                                        borderRadius: 2,
                                    };
                                },
                                labelTextColor: function(context) {
                                    return '#543453';
                                }
                            }
                        }

                    }
                });
            });
        });
    </script>
    <script></script>
</div>
