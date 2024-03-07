<x-app-layout>
    <style>
        .card-img-top:hover {
            transform: scale(1.3);
            transition: transform 0.3s ease;
        }
    </style>
    @php
        $user_type = Auth::user()->user_type;
    @endphp
    @if ($user_type == '0' && '1')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <a href="{{ route('user.list')}}" style="color: black !important;">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <br>
                                    <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/user-list.png" style="max-width: 49px; max-height: 49px;">
                                    <br>
                                    <p class="card-text text-center">Manage User Profile</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <a href="{{ route('kiosk.list')}}" style="color: black !important;">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <br>
                                    <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/kiosk.png" style="max-width: 49px; max-height: 49px;">
                                    <br>
                                    <p class="card-text text-center">Manage Kiosk</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <a href="{{ route('menu.list')}}" style="color: black !important;">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <br>
                                    <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/menu.png" style="max-width: 49px; max-height: 49px;">
                                    <br>
                                    <p class="card-text text-center">Manage Menu</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <a href="{{ route('invoice.list')}}" style="color: black !important;">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <br>
                                    <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/invoice.png" style="max-width: 49px; max-height: 49px;">
                                    <br>
                                    <p class="card-text text-center">View Receipts</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="page-title">
                        <br>
                        <h4>Kiosk Statistic</h4>
                        <br>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Trending Menu</h4>
                                <form action="{{ route('dashboard') }}" method="GET" class="mb-3">
                                    <div class="form-group">
                                        <label for="kiosk_id">Select Kiosk:</label>
                                        <select name="kiosk_id" id="kiosk_id" class="form-control">
                                            <option value="">All Kiosks</option>
                                            @foreach ($kiosks as $kiosk)
                                                <option value="{{ $kiosk->id }}"
                                                    {{ $selectedKioskId == $kiosk->id ? 'selected' : '' }}>
                                                    {{ $kiosk->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="time_period">Select Time Period:</label>
                                        <select name="time_period" id="time_period1" class="form-control">
                                            <option value="day" {{ $selectedTimePeriod == 'day' ? 'selected' : '' }}>Last
                                                24
                                                Hours</option>
                                            <option value="week" {{ $selectedTimePeriod == 'week' ? 'selected' : '' }}>
                                                Last
                                                7 Days</option>
                                            <option value="month"
                                                {{ $selectedTimePeriod == 'month' ? 'selected' : '' }}>Last 30 Days
                                            </option>
                                            <!-- <option value="custom"
                                                {{ $selectedTimePeriod == 'custom' ? 'selected' : '' }}>Custom
                                            </option> -->
                                        </select>
                                    </div>
                                    <div class="form-group" id="custom_range_start" style="display: none;">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" name="start_date" id="start_date"
                                            value="{{ $startDate ?? '' }}" class="form-control">
                                    </div>
                                    <div class="form-group" id="custom_range_end" style="display: none;">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" name="end_date" id="end_date" value="{{ $endDate ?? '' }}"
                                            class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </form>
                                <canvas id="itemChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Hourly Sales</h4>
                                <form action="{{ route('dashboard') }}" method="GET" class="mb-3">
                                    <div class="form-group">
                                        <label for="kiosk_id">Select Kiosk:</label>
                                        <select name="kiosk_id" id="kiosk_id" class="form-control">
                                            <option value="">All Kiosks</option>
                                            @foreach($kiosks as $kiosk)
                                                <option value="{{ $kiosk->id }}"
                                                    {{ $selectedKioskId == $kiosk->id ? 'selected' : '' }}>
                                                    {{ $kiosk->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="time_period">Select Time Period:</label>
                                        <select name="time_period" id="time_period2" class="form-control">
                                            <option value="day" {{ $selectedTimePeriod == 'day' ? 'selected' : '' }}>Last 24 Hours</option>
                                            <option value="week" {{ $selectedTimePeriod == 'week' ? 'selected' : '' }}>Last 7 Days</option>
                                            <option value="month" {{ $selectedTimePeriod == 'month' ? 'selected' : '' }}>Last 30 Days</option>
                                            <!-- <option value="custom" {{ $selectedTimePeriod == 'custom' ? 'selected' : '' }}>Custom</option> -->
                                        </select>
                                    </div>
                                    <div class="form-group" id="custom2_range_start" style="display: none;">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" name="start_date" id="start_date" value="{{ $startDate ?? '' }}" class="form-control">
                                    </div>
                                    <div class="form-group" id="custom2_range_end" style="display: none;">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" name="end_date" id="end_date" value="{{ $endDate ?? '' }}" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </form>
                                <canvas id="invoiceChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Sales</h4>
                                <form action="{{ route('dashboard') }}" method="GET" class="mb-3">
                                    <div class="form-group">
                                        <label for="kiosk_id">Select Kiosk:</label>
                                        <select name="kiosk_id" id="kiosk_id" class="form-control">
                                            <option value="">All Kiosks</option>
                                            @foreach ($kiosks as $kiosk)
                                                <option value="{{ $kiosk->id }}"
                                                    {{ $selectedKioskId == $kiosk->id ? 'selected' : '' }}>
                                                    {{ $kiosk->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="time_period">Select Time Period:</label>
                                        <select name="time_period" id="time_period3" class="form-control">
                                            <option value="day" {{ $selectedTimePeriod == 'day' ? 'selected' : '' }}>Last 24 Hours</option>
                                            <option value="week" {{ $selectedTimePeriod == 'week' ? 'selected' : '' }}>Last 7 Days</option>
                                            <option value="month" {{ $selectedTimePeriod == 'month' ? 'selected' : '' }}>Last 30 Days</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="custom3_range_start" style="display: none;">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" name="start_date" id="start_date" value="{{ $startDate ?? '' }}" class="form-control">
                                    </div>
                                    <div class="form-group" id="custom3_range_end" style="display: none;">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" name="end_date" id="end_date" value="{{ $endDate ?? '' }}" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary dashboard-btn-apply">Apply</button>
                                </form>
                                <canvas id="salesChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($user_type == '2')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <a href="{{ route('kiosk.my.kiosk')}}" style="color: black !important;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <br>
                                        <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/kiosk.png" style="max-width: 49px; max-height: 49px;">
                                        <br>
                                        <p class="card-text text-center">My Kiosk</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <a href="{{ route('menu.my.menu')}}" style="color: black !important;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <br>
                                        <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/menu.png" style="max-width: 49px; max-height: 49px;">
                                        <br>
                                        <p class="card-text text-center">My Menu</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <a href="{{ route('order.pos')}}" style="color: black !important;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <br>
                                        <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/pos.png" style="max-width: 49px; max-height: 49px;">
                                        <br>
                                        <p class="card-text text-center">POS</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <a href="{{ route('invoice.list')}}" style="color: black !important;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <br>
                                        <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/invoice.png" style="max-width: 49px; max-height: 49px;">
                                        <br>
                                        <p class="card-text text-center">My Receipt</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="page-title">
                            <br>
                            <h4>Kiosk Statistic</h4>
                            <br>
                        </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Trending Menu</h4>
                                <form action="{{ route('dashboard') }}" method="GET" class="mb-3">
                                    <div class="form-group">
                                        <input type="hidden" name="kiosk_id" value="{{ $kiosk_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="time_period">Select Time Period:</label>
                                        <select name="time_period" id="time_period1" class="form-control">
                                            <option value="day" {{ $selectedTimePeriod == 'day' ? 'selected' : '' }}>Last 24 Hours</option>
                                            <option value="week" {{ $selectedTimePeriod == 'week' ? 'selected' : '' }}>Last 7 Days</option>
                                            <option value="month" {{ $selectedTimePeriod == 'month' ? 'selected' : '' }}>Last 30 Days</option>
                                            <!-- <option value="custom" {{ $selectedTimePeriod == 'custom' ? 'selected' : '' }}>Custom</option> -->
                                        </select>
                                    </div>
                                    <div class="form-group" id="custom_range_start" style="display: none;">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" name="start_date" id="start_date" value="{{ $startDate ?? '' }}" class="form-control">
                                    </div>
                                    <div class="form-group" id="custom_range_end" style="display: none;">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" name="end_date" id="end_date" value="{{ $endDate ?? '' }}" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary ">Apply</button>
                                </form>
                                <canvas id="itemChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Hourly Sales</h4>
                                <form action="{{ route('dashboard') }}" method="GET" class="mb-3">
                                    <div class="form-group">
                                        <input type="hidden" name="kiosk_id" value="{{ $kiosk_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="time_period">Select Time Period:</label>
                                        <select name="time_period" id="time_period2" class="form-control">
                                            <option value="day" {{ $selectedTimePeriod == 'day' ? 'selected' : '' }}>Last 24 Hours</option>
                                            <option value="week" {{ $selectedTimePeriod == 'week' ? 'selected' : '' }}>Last 7 Days</option>
                                            <option value="month" {{ $selectedTimePeriod == 'month' ? 'selected' : '' }}>Last 30 Days</option>
                                            <!-- <option value="custom" {{ $selectedTimePeriod == 'custom' ? 'selected' : '' }}>Custom</option> -->
                                        </select>
                                    </div>
                                    <div class="form-group" id="custom2_range_start" style="display: none;">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" name="start_date" id="start_date" value="{{ $startDate ?? '' }}" class="form-control">
                                    </div>
                                    <div class="form-group" id="custom2_range_end" style="display: none;">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" name="end_date" id="end_date" value="{{ $endDate ?? '' }}" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </form>
                                <canvas id="invoiceChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Sales</h4>
                                <form action="{{ route('dashboard') }}" method="GET" class="mb-3">
                                    <div class="form-group">
                                        <input type="hidden" name="kiosk_id" value="{{ $kiosk_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="time_period">Select Time Period:</label>
                                        <select name="time_period" id="time_period3" class="form-control">
                                            <option value="day" {{ $selectedTimePeriod == 'day' ? 'selected' : '' }}>Last 24 Hours</option>
                                            <option value="week" {{ $selectedTimePeriod == 'week' ? 'selected' : '' }}>Last 7 Days</option>
                                            <option value="month" {{ $selectedTimePeriod == 'month' ? 'selected' : '' }}>Last 30 Days</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="custom3_range_start" style="display: none;">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" name="start_date" id="start_date" value="{{ $startDate ?? '' }}" class="form-control">
                                    </div>
                                    <div class="form-group" id="custom3_range_end" style="display: none;">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" name="end_date" id="end_date" value="{{ $endDate ?? '' }}" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary dashboard-btn-apply">Apply</button>
                                </form>
                                <canvas id="salesChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($user_type == '3')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card" >
                        <div class="card-body">
                            <img src="{{ asset('build') }}/assets/img/orderlikey-banner.png" alt="img" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <a href="{{ route('kiosk.customer.list')}}" style="color: black !important;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <br>
                                <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/kiosk.png" style="max-width: 49px; max-height: 49px;">
                                <br>
                                <p class="card-text text-center">Kiosk</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <a href="{{ route('menu.customer.list')}}" style="color: black !important;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <br>
                                <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/menu.png" style="max-width: 49px; max-height: 49px;">
                                <br>
                                <p class="card-text text-center">Menu</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <a href="{{ route('favourite.list')}}" style="color: black !important;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <br>
                                <img class="card-img-top mx-auto" src="{{ asset('build') }}/assets/img/custom-icon/wishlist.png" style="max-width: 49px; max-height: 49px;">
                                <br>
                                <p class="card-text text-center">Favourite</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endif




    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
    <script>
        // Function to update the charts
        function updateCharts() {
            // Retrieve data from Laravel variables
            const itemNames = {!! json_encode($itemNames) !!};
            const quantities = {!! json_encode($quantities) !!};

            // Bar chart for most and least popular items
            new Chart(document.getElementById("itemChart"), {
                type: 'bar',
                data: {
                    labels: itemNames,
                    datasets: [{
                        label: 'Quantity',
                        data: quantities,
                        backgroundColor: getRandomColors(itemNames.length),
                        borderColor: getRandomColors(itemNames.length),
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Retrieve data from Laravel variables
            const hours = {!! json_encode($hours) !!};
            const invoiceCounts = {!! json_encode($invoiceCounts) !!};

            // Line chart for hourly invoices
            new Chart(document.getElementById("invoiceChart"), {
                type: 'line',
                data: {
                    labels: hours,
                    datasets: [{
                        label: 'Invoice Count',
                        data: invoiceCounts,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });





            // Retrieve data from Laravel variables
            const salesLabels = {!! json_encode($salesLabels) !!};
            const salesData = {!! json_encode($salesData) !!};

            // Line chart for hourly invoices
            new Chart(document.getElementById("salesChart"), {
                type: 'bar',
                data: {
                    labels: salesLabels,
                    datasets: [{
                        label: 'Total Sales',
                        data: salesData,
                        backgroundColor: getRandomColors(salesLabels.length),
                        borderColor: getRandomColors(salesLabels.length),
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // Set the index axis to 'y' for horizontal orientation
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            

            
        }

        // Generate random colors for chart bars
        function getRandomColors(count) {
            const colors = [];
            for (let i = 0; i < count; i++) {
                colors.push(`rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.7)`);
            }
            return colors;
        }

        // Function to show/hide custom range inputs based on selection
        function toggleCustomRangeInputs(timePeriodSelect, customRangeStart, customRangeEnd) {
            if (timePeriodSelect.value === "custom") {
                customRangeStart.style.display = "block";
                customRangeEnd.style.display = "block";
            } else {
                customRangeStart.style.display = "none";
                customRangeEnd.style.display = "none";
            }
        }

        // Call the updateCharts function initially
        updateCharts();

        

        // Toggle custom range inputs on page load if necessary
        const timePeriodSelect1 = document.getElementById("time_period1");
        const customRangeStart1 = document.getElementById("custom_range_start");
        const customRangeEnd1 = document.getElementById("custom_range_end");
        toggleCustomRangeInputs(timePeriodSelect1, customRangeStart1, customRangeEnd1);

        const timePeriodSelect2 = document.getElementById("time_period2");
        const customRangeStart2 = document.getElementById("custom2_range_start");
        const customRangeEnd2 = document.getElementById("custom2_range_end");
        toggleCustomRangeInputs(timePeriodSelect2, customRangeStart2, customRangeEnd2);

        // Add event listeners to time period selects
        timePeriodSelect1.addEventListener("change", function() {
            toggleCustomRangeInputs(timePeriodSelect1, customRangeStart1, customRangeEnd1);
        });

        timePeriodSelect2.addEventListener("change", function() {
            toggleCustomRangeInputs(timePeriodSelect2, customRangeStart2, customRangeEnd2);
        });

        window.addEventListener('load', function() {
            var dashboardBtnApply = document.getElementByClass('dashboard-btn-apply');

            // Simulate a click event on the toggle button
            dashboardBtnApply.click();
        });
    </script>
</x-app-layout>
