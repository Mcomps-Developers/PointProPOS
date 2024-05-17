<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to
            you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided in your profile settings.')
            }}
        </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div>
                <a href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Edit Profile') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 ms-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
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
