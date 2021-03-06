<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="container-header">
                <h1 class="offset-2 text-decoration-underline text-secondary">Simple Laravel CRM</h1>
            </div>
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="{{ route('auth.login') }}" method="post">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input
                                type="email"
                                id="login-email"
                                name="email"
                                class="form-control form-control-lg"
                                value="{{ old('email') }}"/>
                            <label class="form-label" for="login-email">Emai-cím</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input
                                type="password"
                                id="login-password"
                                name="password"
                                class="form-control form-control-lg" />
                            <label class="form-label" for="login-password">Jelszó</label>
                        </div>

                            @if(session()->get('fail'))
                                <div class="alert-danger mb-3 p-1">
                                    {{ session()->get('fail') }}
                                </div>
                            @endif

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Belépés</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
