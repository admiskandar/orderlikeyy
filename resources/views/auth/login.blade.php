<x-guest-layout>
    <div class="main-wrapper">
        <div class="account-content">
            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
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
                                <h3>Sign In</h3>
                                <h4>Please login to your account</h4>
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email address">
                                    <!-- <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /> -->
                                    <img src="{{ asset('build') }}/assets/img/icons/mail.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input block mt-1 w-full" placeholder="Enter your password" id="password" name="password" required autocomplete="current-password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <div class="alreadyuser">
                                    @if (Route::has('password.request'))
                                        <h4><a href="{{ route('password.request') }}" class="hover-a">Forgot Password?</a></h4>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="form-login">
                                <button class="btn btn-login" type="submit">Sign In</button>
                            </div>
                            <div class="signinform text-center">
                                <h4>Don’t have an account? <a href="{{ route('register') }}" class="hover-a">Sign Up</a></h4>
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
</x-guest-layout>
