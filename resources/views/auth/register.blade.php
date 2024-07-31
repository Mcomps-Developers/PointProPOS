<x-guest-layout>
    @section('title')
        Login
    @endsection
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper bg-img">
                <div class="login-content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-userset">
                            <div class="login-logo logo-normal">
                                <img src="{{asset('assets/img/logo.png')}}" style="transform: scale(2);">
                            </div>
                            <a href="#!" class="login-logo logo-white">
                                <img src="{{asset('assets/img/logo-white.png')}}" style="transform: scale(2);">
                            </a>
                            <div class="login-userheading">
                                <h3>Sign In</h3>
                                <h4>Access the {{config('app.name')}} panel using your email and password.</h4>
                                <x-validation-errors class="mb-4 text-danger" />

                                @session('status')
                                <div class="mb-4 text-sm font-medium text-success">
                                    {{ $value }}
                                </div>
                                @endsession
                            </div>
                            <div class="mb-3 form-login">
                                <label class="form-label">Email Address</label>
                                <div class="form-addons">
                                    <input type="email" placeholder="example@domain.com" name="email" class="form- control">
                                    <img src="{{asset('assets/img/icons/mail.svg')}}" alt="img">
                                </div>
                            </div>
                            <div class="mb-3 form-login">
                                <label class="form-label">Password</label>
                                <div class="pass-group">
                                    <input type="password" placeholder="Password" name="password" class="pass-input form-control">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login authentication-check">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-between">
                                        <div class="custom-control custom-checkbox">
                                            <label class="pb-0 mb-0 checkboxs ps-4 line-height-1">
                                                <input type="checkbox" name="remember" class="form-control">
                                                <span class="checkmarks"></span>Remember me
                                            </label>
                                        </div>
                                        <div class="text-end">
                                            <a class="forgot-link" href="{{route('password.request')}}">Forgot
                                                Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Sign In</button>
                            </div>
                            <div class="form-setlogin or-text">
                                <h4>OR</h4>
                            </div>
                            <div class="form-sociallink">
                                <ul class="d-flex">
                                    {{-- <li>
                                        <a href="javascript:void(0);" class="facebook-logo">
                                            <img src="{{asset('assets/img/icons/facebook-logo.svg')}}" alt="Facebook">
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('auth.google') }}">
                                            <img src="{{asset('assets/img/icons/google.png')}}" alt="Google">
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="javascript:void(0);" class="apple-logo">
                                            <img src="{{asset('assets/img/icons/apple-logo.svg')}}" alt="Apple">
                                        </a>
                                    </li> --}}
                                </ul>
                                <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                                    <p>Copyright &copy; {{ date('Y') }} {{config('app.name')}}. All rights reserved</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
