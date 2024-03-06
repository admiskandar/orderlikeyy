<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Invoice Report</h4>
                    <h6>Manage your Invoice Report</h6>
                </div>
                
            </div>
            
            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="{{ asset('build') }}/assets/img/icons/search-white.svg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <div class="input-groupicon">
                                            <input type="text" placeholder="From Date" class="datetimepicker">
                                            <div class="addonset">
                                                <img src="{{ asset('build') }}/assets/img/icons/calendars.svg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <div class="input-groupicon">
                                            <input type="text" placeholder="To Date" class="datetimepicker">
                                            <div class="addonset">
                                                <img src="{{ asset('build') }}/assets/img/icons/calendars.svg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img src="{{ asset('build') }}/assets/img/icons/search-whites.svg" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Invoice Number</th>
                                    <th>Invoice Date</th>
                                    <th>Total Amount</th>
                                    <th>Total Paid</th>
                                    <th>Balance</th>
                                    <th>Ref Number</th>
                                    <th>Payment Type</th>
                                    <th>Kiosk</th>
                                    <th>Staff</th>
                                </tr>
                            </thead>
                            @foreach($invoices as $invoice)
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>{{$invoice->id}}</td>
                                    <td>{{$invoice->invoice_date}}</td>
                                    <td>{{$invoice->total_amount}}</td>
                                    <td>{{$invoice->total_paid}}</td>
                                    <td>{{$invoice->total_balance}}</td>
                                    <td>{{$invoice->reference_number}}</td>
                                    <td><span class="badges bg-lightgreen">{{$invoice->payment_method}}</span></td>
                                    <td>{{$invoice->kiosk->name}}</td>
                                    <td>{{$invoice->kiosk->name}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
</x-app-layout>