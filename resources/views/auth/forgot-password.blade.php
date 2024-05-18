<x-guest-layout>
    @section('title')
        Forgot Password
    @endsection
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper forgot-pass-wrap bg-img">
                <div class="login-content">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="login-userset">
                            <div class="login-logo logo-normal">
                                <img src="{{asset('assets/img/logo.png')}}" style="transform: scale(2);">
                            </div>
                            <a href="#!" class="login-logo logo-white">
                                <img src="{{asset('assets/img/logo-white.png')}}" style="transform: scale(2);">
                            </a>
                            <div class="login-userheading">
                                <h3>Forgot password?</h3>
                                <h4>If you forgot your password, well, then we’ll email you instructions to reset your
                                    password.</h4>
                                @session('status')
                                <div class="mb-4 font-medium text-sm text-success">
                                    {{ $value }}
                                </div>
                                @endsession

                                <x-validation-errors class="mb-4 text-danger" />
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="email" placeholder="example@domain.com" name="email" class="form-control">
                                    <img src="{{asset('assets/img/icons/mail.svg')}}" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Request Password Reset</button>
                            </div>
                            <div class="signinform text-center">
                                <h4>Return to<a href="{{route('login')}}" class="hover-a"> login </a></h4>
                            </div>
                            <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                                <p>&copy; <script>
                                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                </script> {{config('app.name')}}. All rights reserved. Powered by <a href="https://mcomps.co.ke"><b>Mcomps</b></a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
