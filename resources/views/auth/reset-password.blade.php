<x-guest-layout>
    @section('title')
        Reset Password
    @endsection
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper reset-pass-wrap bg-img">
                <div class="login-content">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="login-userset">
                            <div class="login-logo logo-normal">
                                <img src="{{asset('assets/img/logo.png')}}" style="transform: scale(2);">
                            </div>
                            <a href="#!" class="login-logo logo-white">
                                <img src="{{asset('assets/img/logo-white.png')}}" style="transform: scale(2);">
                            </a>
                            <div class="login-userheading">
                                <h3>Reset password?</h3>
                                <h4>Enter New Password & Confirm Password to get inside</h4>
                                <x-validation-errors class="mb-4 text-danger" />
                            </div>
                            <div class="form-login">
                                <label> Email</label>
                                <div class="pass-group">
                                    <input type="email" name="email" class="pass-input" placeholder="example@domain.com"
                                        :value="old('email', $request->email)">
                                        <span class="fas toggle-passworda fa-envelope"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <label>New Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-inputs" placeholder="Password">
                                    <span class="fas toggle-passwords fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <label> New Confirm Passworrd</label>
                                <div class="pass-group">
                                    <input type="password" name="password_confirmation" class="pass-inputa"
                                        placeholder="Confirm Password">
                                    <span class="fas toggle-passworda fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Change Password</button>
                            </div>
                            <div class="signinform text-center">
                                <h4>Return to <a href="{{route('login')}}" class="hover-a"> login </a></h4>
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
