<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ get_tenant_sitename() }} - Home</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-custom {
            background-color: #ffffff;
            border-bottom: 1px solid #e1e8ed;
        }

        .tweet-card {
            background-color: #fff;
            border: 1px solid #e1e8ed;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .tweet-card img {
            border-radius: 50%;
            width: 48px;
            height: 48px;
        }

        .tweet-content {
            padding: 1rem;
        }

        .tweet-footer {
            display: flex;
            justify-content: space-between;
            padding: 0 1rem 1rem 1rem;
        }

        .footer-icon {
            font-size: 1.2rem;
        }

        .fixed-width {
            max-width: 600px;
            margin: auto;
        }

        .navbar-profile-img {
            border-radius: 50%;
            width: 36px;
            height: 36px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tenant.home') }}">{{ get_tenant_sitename() ?? 'Home' }}</a>
            <div class="ml-auto d-flex align-items-center">
                @auth
                <div class="dropdown">
                    <img src="https://via.placeholder.com/36" alt="Current User" class="navbar-profile-img dropdown-toggle"  id="profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="dropdown-menu" aria-labelledby="profile-dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
                <button class="btn btn-primary ml-3" data-toggle="modal" data-target="#tweet-modal">Tweet</button>
                <div class="modal fade" id="tweet-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                        What's On Your Mind?
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <form id="tweet-form" action="{{ route('tenant.posts.create') }}" method="POST" class="w-100">
                                            @csrf
                                            <div class="form-group">
                                                <textarea type="text" class="form-control" id="tweet-body" name="body"
                                                    aria-describedby="tweet-helper" rows="10" placeholder="Let People Know..."></textarea>
                                                @error('body')
                                                    <small id="tweet-helper" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" form="tweet-form" class="btn btn-primary">Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
                @guest
                    <button class="btn btn-primary" data-toggle="modal" data-target="#login-modal">Login</button>
                    <!-- Login Modal -->
                    <div class="modal fade" id="login-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Login to {{ get_tenant_sitename() }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form id="login-form" action="{{ route('login') }}" method="POST" class="w-100">
                                            @csrf
                                            <div class="form-group">
                                                <label for="login-email">Email</label>
                                                <input type="email" class="form-control" id="login-email" name="email"
                                                    aria-describedby="login-help">
                                                @error('email')
                                                    <small id="login-email" class="form-text text-muted">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="login-password">Password</label>
                                                <input type="password" class="form-control" id="login-password" name="password">
                                                @error('password')
                                                    <small id="login-password"
                                                        class="form-text text-muted">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="container-fluid">
                                                <div class="mb-3 text-center">OR</div>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-outline-primary btn-sm" data-dismiss="modal" data-toggle="modal" data-target="#register-modal">Register</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" form="login-form" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Register Modal -->
                    <div class="modal fade" id="register-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                    {{ get_tenant_sitename() }} Signup
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <form id="register-form" action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="login-email">Name</label>
                                                <input type="text" class="form-control" id="registration-name" name="name"
                                                    aria-describedby="registration-help">
                                                @error('email')
                                                    <small id="registration-email" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="registration-email">Email</label>
                                                <input type="email" class="form-control" id="registration-email" name="email"
                                                    aria-describedby="registration-help">
                                                @error('email')
                                                    <small id="registration-email" class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="registration-password">Password</label>
                                                <input type="password" class="form-control" id="registration-password" name="password">
                                                @error('password')
                                                    <small id="registration-password"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="registration-password-confirm">Confirm Password</label>
                                                <input type="password" class="form-control" id="registration-password-confirm" name="password_confirmation">
                                                @error('password')
                                                    <small id="registration-password"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" form="register-form" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                    $(document).ready(function() {
                        @if($errors->registration_failed === true)
                            $('#register-modal').modal('show');
                        @elseif($errors->login_failed === true)
                            $('#login-modal').modal('show');
                        @elseif($errors->post_creation_failed === true)
                            $('#tweet-modal').modal('show');
                        @endif
                    });
                    </script>
                @endguest
            </div>
        </div>
    </nav>

    <main>
        <div class="container-fluid mb-2">
            @if($errors->any())
                @foreach($errors as $error)
                    <div class="alert alert-danger alert-dismissible">
                        <span>{{ $error }}</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <span>{{ session('error') }}</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible">
                    <span>{{ session('warning') }}</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        {{ $slot }}
    </main>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>