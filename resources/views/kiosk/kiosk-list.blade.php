<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Kiosk List</h4>
                    <h6>Manage Kiosk</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('kiosk.add') }}" class="btn btn-added"><img src="{{ asset('build') }}/assets/img/icons/plus.svg" alt="img" class="me-2">Kiosk</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Filter -->
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a class="btn btn-searchset">
                                    <img src="{{ asset('build') }}/assets/img/icons/search-white.svg" alt="img">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>Kiosk Name</th>
                                    <th>Address</th>
                                    <th>Opening Day</th>
                                    <th>Opening Time</th>
                                    <th>Closing Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kiosks as $kiosk)
                                <tr>
                                    <td>@isset($kiosk->name){{$kiosk->name}}@endisset</td>
                                    <td>@isset($kiosk->address){{$kiosk->address}}@endisset</td>
                                    <td>@isset($kiosk->opening_day){{$kiosk->opening_day}}@endisset</td>
                                    <td>@isset($kiosk->opening_time){{$kiosk->opening_time}}@endisset</td>
                                    <td>@isset($kiosk->closing_time){{$kiosk->closing_time}}@endisset</td>
                                    <td>@isset($kiosk->status){{$kiosk->status}}@endisset</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="me-3" href="{{ route('kiosk.info', [$kiosk->id])}}">
                                                <img src="{{ asset('build') }}/assets/img/icons/eye.svg" alt="img">
                                            </a>
                                            <a class="me-3" href="{{ route('kiosk.edit', [$kiosk->id])}}">
                                                <img src="{{ asset('build') }}/assets/img/icons/edit.svg" alt="img">
                                            </a>
                                            <a class="me-3 confirm-text" href="{{ route('kiosk.destroy', [$kiosk->id])}}">
                                                <img src="{{ asset('build') }}/assets/img/icons/delete.svg" alt="img">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>