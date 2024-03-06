<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>User List</h4>
                    <h6>Manage User</h6>
                </div>
                <div class="page-btn d-flex">
                    <a href="{{ route('kesukomp.add') }}" class="btn btn-added mr-2"><img src="{{ asset('build') }}/assets/img/icons/plus.svg" alt="img">KESUKOMP</a>
                    <a href="{{ route('kiosk-staff.add') }}" class="btn btn-added"><img src="{{ asset('build') }}/assets/img/icons/plus.svg" alt="img">Kiosk Staff</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="{{ asset('build') }}/assets/img/icons/search-white.svg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>email</th>
                                    <th>Role</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ isset($user->name) ? $user->name : '' }}</td>
                                    <td>{{ isset($user->phone_num) ? $user->phone_num : '' }}</td>
                                    <td>{{ isset($user->email) ? $user->email : '' }}</td>
                                    <td>{{ isset($user->user_type) ? $user->user_type : '' }}</td>
                                    <td>{{ isset($user->created_at) ? $user->created_at : '' }}</td>
                                    <td class="d-flex flex-row">
                                        <a class="me-3" href="{{ route('user.edit', [$user->id])}}">
                                            <img src="{{ asset('build') }}/assets/img/icons/edit.svg" alt="img">
                                        </a>
                                        <a class="me-3 confirm-text" href="{{ route('user.destroy', [$user->id])}}"">
                                            <img src="{{ asset('build') }}/assets/img/icons/delete.svg" alt="img">
                                        </a>
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