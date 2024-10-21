@extends('login.main')
@section('body')
    <style>
        .account
        {
            font-size: 20px;
            color: #515559;
            margin: 10px;
        }

    </style>
<div class="limiter">

    <div class="container-login100" style="background-image: url('auth/images/bg-01.jpg');">




        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <div style="text-align: center">
                سامانه قبوض مشترکین
            </div>


                <span class="login100-form-title ">


                    <img src="/images/logo.png">
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
                        لطفا  اکانت مورد نظر را انتخاب نمایید
                    </span>
                </div>
                <form method="post" action="{{ route('login.account') }}">
                    @csrf

                <div class="wrap-input100 validate-input"  >
                    @foreach($accounts as  $index=>$account)
                        @if($index>0)
                        <br>
                        <hr>
                        @endif
                    <input class="account"  type="radio"  name="id" value="{{$account->id}}" required  >{{$account->name}}

                    @endforeach

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
