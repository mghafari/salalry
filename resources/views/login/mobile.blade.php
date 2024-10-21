@extends('login.main')
@section('body')
<div class="limiter">

    <div class="container-login100" style="background-image: url('/auth/images/bg-2.jpg');">




        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <div style="text-align: center">

            </div>


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


                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        لطفا  شماره موبایل   خود را  وارد نمایید
                    </span>
                </div>
                <form method="post" action="{{ route('login.send') }}">
                    @csrf
                <div class="wrap-input100 validate-input" data-validate = "شماره موبایل خود را وارد نمایید " >
                    <input class="input100"  name="mobile" required  >
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
