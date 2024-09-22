{{-- webpage title --}}
@section('title')
    Legal Advisor Login & Register
@endsection
{{-- main  --}}
@include('include.head')

<body class="authentication-bg authentication-bg-pattern">

    @include('include.alirt')
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <!-- Login Form -->
                        <div class="card-body p-4" id="login-form">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <h3>Legal Advisor Login</h3>
                                </div>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access the
                                    ligal advisor panel.</p>
                            </div>

                            <form action="{{ route('lageladvisor.login') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" name="email" required
                                        placeholder="Enter your email">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye font-12"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit">Log In</button>
                                </div>
                            </form>

                        </div> <!-- end login card-body -->

                        <!-- Registration Form (hidden by default) -->
                        <div class="card-body p-4" id="register-form" style="display: none;">
                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <h3>Legal Advisor Register</h3>
                                </div>
                                <p class="text-muted mb-4 mt-3">Don't have an account? Create your account, it takes
                                    less than a minute</p>
                            </div>

                            <form action="{{ route('lageladvisor.register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input class="form-control" type="text" id="fullname" name="name"
                                        placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" name="email" required
                                        placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="number" name="phone"
                                        placeholder="Enter your number" required>
                                </div>
                                <div class="form-group">
                                    <label>NID</label>
                                    <input class="form-control" type="number" name="nid"
                                        placeholder="Enter your nid" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye font-12"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-success btn-block" type="submit">Sign Up</button>
                                </div>
                            </form>

                        </div> <!-- end register card-body -->
                    </div> <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p id="login-text" class="text-white">Don't have an account? <a href="javascript:void(0);"
                                    class="text-white ml-1" id="sign-up-link"><b>Sign
                                        Up</b></a></p>
                            <p id="register-text" class="text-white" style="display: none;">Already have an account?
                                <a href="javascript:void(0);" class="text-white ml-1" id="sign-in-link"><b>Sign
                                        In</b></a>
                            </p>
                            <p class="text-white">Login as Admin <a href="{{ route('adminLogin') }}"
                                    class="text-white ml-1"><b>Click</b></a></p>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div> <!-- end page -->

    @include('include.footer')

    <!-- JavaScript to handle form switching -->
    <script>
        document.getElementById('sign-up-link').addEventListener('click', function() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
            document.getElementById('login-text').style.display = 'none';
            document.getElementById('register-text').style.display = 'block';
        });

        document.getElementById('sign-in-link').addEventListener('click', function() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('login-text').style.display = 'block';
            document.getElementById('register-text').style.display = 'none';
        });
    </script>

</body>

</html>
