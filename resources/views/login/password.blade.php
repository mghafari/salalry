@extends('login.main')
@section('body')
<div class="limiter">
    <div class="container-login100" style="background-image: url('/auth/images/bg4.jpg');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">


                <span class="login100-form-title ">

            <img src="/auth/images/logo-4.png" width="220px">
                </span>
                @if ($errors->any())
                <div class="alert alert-danger" >
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


                <div class="p-t-31 p-b-9" style="color: #dfd8d8">

                        لطفا پسورد خود را وارد کنید.
                </div>
                <form method="post" action="{{ route('login.password') }}">
                    @csrf
                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="password" name="password"  >
                    <span class="focus-input100"></span>
                </div>




                <div class="container-login100-form-btn m-t-17 p-b-33">
                    <button class="login100-form-btn">
                    تایید
                    </button>
                </div>


            </form>


        </div>

        @include('login.enamad')
    </div>

</div>


<div id="dropDownSelect1"></div>

@endsection
