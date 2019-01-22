<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Clauber Oliveira - Login</title>

        <!--Favicon -->
        <link rel="shortcut icon" href="/img/logo.png">
    </head>
    <body>
        <section class="hero is-fullheight">
                <div class="hero-body">
                    <div class="container has-text-centered">
                        <div class="column is-4 is-offset-4">
                            <div class="box">
                                <figure class="avatar">
                                        <img src="/img/logo-mini.png">
                                </figure>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="field"><!--Username-->
                                        <div class="control">
                                            <input id="username" type="text" class="input is-large{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
            
                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="field"><!--Password-->
                                        <div class="control">
                                            <input id="password" type="password" class="input is-large{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
            
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="checkbox">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </label>
                                    </div>
                                            <button type="submit" class="button is-block is-info is-large is-fullwidth">
                                                {{ __('Login') }}
                                            </button>
                                </form>
                            </div>
                            <p class="has-text-grey">
                                    <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>        
    </body>
</html>
<style>
.avatar {
    margin-top: -70px;
    padding-bottom: 20px;
    padding: 5px;
}
.avatar img {
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
    overflow: hidden;
}







</style>