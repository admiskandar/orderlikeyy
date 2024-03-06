<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>My Profile</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$user->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{$user->email}}" disabled>
                            </div>
                            <!-- <div class="form-group">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class=" pass-input" value="123456">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone_num" value="{{$user->phone_num}}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" name="user_type" value="{{$user->user_type}}" disabled>
                            </div>
                            <!-- <div class="form-group">
                                <label>Confirm  Password</label>
                                <div class="pass-group">
                                    <input type="password" class=" pass-inputs" value="123456">
                                    <span class="fas toggle-passworda fa-eye-slash"></span>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-lg-12">
                            <a href="{{ route('my.profile.edit', [$user->id])}}" type="button" class="btn btn-submit me-2">Edit</a>
                            <a href="{{ route('my.profile.password.edit', [$user->id])}}" type="button" class="btn btn-submit me-2">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>