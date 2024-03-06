<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>KESUKOMP</h4>
                    <h6>Add new KESUKOMP</h6>
                </div>
            </div>
            <form method="POST" action="{{ route('kesukomp.store') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="Enter staff full name" id="name" class="block mt-1 w-full" name="name" :value="old('name')" required autofocus autocomplete="name">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="Enter staff email address" id="email" class="block mt-1 w-full" name="email" :value="old('email')" required autocomplete="username">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="pass-input" placeholder="Enter staff password" id="password" class="block mt-1 w-full" name="password" required autocomplete="new-password">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Password Confirmation</label>
                                    <div class="pass-group">
                                        <input type="password" class="pass-input" placeholder="Enter staff password" id="password_confirmation" class="block mt-1 w-full" name="password_confirmation" required autocomplete="new-password">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" placeholder="Enter staff phone number" id="phone_num" class="block mt-1 w-full" name="phone_num">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="hidden" id="user_type" name="user_type" value="KESUKOMP">
                                <button class="btn btn-submit me-2" type="submit">Submit</button>
                                <a href="{{ route('user.list') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>