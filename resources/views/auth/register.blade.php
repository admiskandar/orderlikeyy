<x-guest-layout> 
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">
            <x-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('register') }}">
            @csrf   
                <div class="login-wrapper">
                    <div class="login-content">
                        <div class="login-userset">
                            <div class="login-logo logo-normal">
                                <img src="{{ asset('build') }}/assets/img/logo.png" alt="img">
                            </div>
                            <a href="index.html" class="login-logo logo-white">
                                <img src="{{ asset('build') }}/assets/img/logo-white.png"  alt="">
                            </a>
                            <div class="login-userheading">
                                <h3>Create an Account</h3>
                            </div>
                            <div class="form-login">
                                <label>Full Name</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your full name" id="name" class="block mt-1 w-full" name="name" :value="old('name')" required autofocus autocomplete="name">
                                    <img src="{{ asset('build') }}/assets/img/icons/users1.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="email" placeholder="Enter your email address" id="email" class="block mt-1 w-full" name="email" :value="old('email')" required autocomplete="username" >
                                    <img src="{{ asset('build') }}/assets/img/icons/mail.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" placeholder="Enter your password" id="password" class="block mt-1 w-full" name="password" required autocomplete="new-password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password Confirmation</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" placeholder="Enter your password" id="password_confirmation" class="block mt-1 w-full" name="password_confirmation" required autocomplete="new-password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Phone Number</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your phone number" id="phone_num" class="block mt-1 w-full" name="phone_num" >
                                </div>
                            </div>
                            <div class="form-login">
                                <input type="hidden" id="user_type" name="user_type" value="Customer">
                                <button class="btn btn-login" type="submit">Register</button>
                            </div>
                            <div class="signinform text-center">
                                <h4>Already a user? <a href="{{ route('login') }}" class="hover-a">Sign In</a></h4>
                            </div>
                            <!-- <div class="form-setlogin">
                                <h4>Or sign up with</h4>
                            </div>
                            <div class="form-sociallink">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('build') }}/assets/img/icons/google.png" class="me-2" alt="google">
                                            Sign Up using Google
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('build') }}/assets/img/icons/facebook.png" class="me-2" alt="google">
                                            Sign Up using Facebook
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="login-img">
                        <img src="{{ asset('build') }}/assets/img/login.jpg" alt="img">
                    </div>
                </div>
            </form> 
        </div>
    </div>
    <!-- /Main Wrapper -->
</x-guest-layout>
