<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ __('trans.an_school') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
    <style>
        .main-shadow {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
                rgba(0, 0, 0, 0.3) 0px 7px 13px -3px,
                rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
        }

        .form-inline {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(44%, 1fr));
            gap: 2rem;
        }

        @media screen and (max-width:768px) {
            .selection {
                border-radius: 15px;
                width: 80%;
                padding-top: 3rem;
                margin: 1rem auto 4rem;
            }

            .form-inline {
                display: grid;
                grid-template-columns: unset;
                gap: 1rem;
            }
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url('{{ asset('assets/images/sativa.png') }}');">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align selection">

                    <div class="col-lg-9 col-md-9 bg-white  mb-4 main-shadow">
                        <div class="p-2 clearfix text-center">
                            <h3 class="p-2 m-0">
                                {{ __('msgs.select', ['name' => __('trans.login_way')]) }}</h3>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 ">
                        <div class="clearfix text-center">
                            <div class="form-inline">
                                <a class="btn btn-default login-fancy main-shadow" title="{{ __('student.student') }}" href="{{ route('login.show', 'student') }}">
                                    <img alt="user-img" loading="lazy" width="150px;" src="{{ URL::asset('assets/images/vectors/student.png') }}">
                                </a>
                                <a class="btn btn-default login-fancy main-shadow" title="{{ __('parent.parent') }}" href="{{ route('login.show', 'parent') }}">
                                    <img alt="user-img" loading="lazy" width="150px;" src="{{ URL::asset('assets/images/vectors/parents.png') }}">
                                </a>
                                <a class="btn btn-default login-fancy main-shadow" title="{{ __('teacher.teacher') }}" href="{{ route('login.show', 'teacher') }}">
                                    <img alt="user-img" loading="lazy" width="150px;" src="{{ URL::asset('assets/images/vectors/teacher.png') }}">
                                </a>
                                <a class="btn btn-default login-fancy main-shadow" title="{{ __('trans.admin') }}" href="{{ route('login.show', 'admin') }}">
                                    <img alt="user-img" loading="lazy" width="150px;" src="{{ URL::asset('assets/images/vectors/admin.png') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- jquery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';
    </script>


    <!-- toastr -->
    @yield('js')
    <!-- custom -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>
