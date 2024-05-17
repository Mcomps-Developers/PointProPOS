<x-guest-layout>
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper email-veri-wrap bg-img">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-userset">
                            <div class="login-logo logo-normal">
                                <img src="{{asset('assets/img/logo.png')}}" style="transform: scale(2);">
                            </div>
                        </div>
                        <a href="/" class="login-logo logo-white">
                            <img src="{{asset('assets/img/logo-white.png')}}" style="transform: scale(2);">
                        </a>
                        <div class="login-userheading text-center">
                            <h3>Verify Your Email</h3>

                            @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-success">
                                {{ __('A new verification link has been sent to the email address you provided in your
                                profile settings. Please
                                follow the link inside to continue.')
                                }}
                            </div>
                            @else
                            <h4 class="verfy-mail-content">We've sent a link to your email <a
                                    href="#!">{{Auth::user()->email}}</a>. Please
                                follow the link inside to continue. Check junk/spam folder if you can't see it.</h4>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="signinform text-center">
                                <h4>Didn't receive an email?</h4>
                            </div>

                            <div class="form-login">
                                <button class="btn btn-login" type="submit">Resend Verification Link</button>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <br>
                            <div class="form-login">
                                <button class="btn btn-login" type="submit">Logout</button>
                            </div>
                        </form>
                        <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                            <p>&copy; <script>
                                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                </script> {{config('app.name')}}. All rights reserved. Powered by <a
                                    href="https://mcomps.co.ke"><b>Mcomps</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
