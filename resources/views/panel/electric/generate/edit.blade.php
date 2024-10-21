@extends('main')
@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>برق تولیدی</h4>
              
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
               
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">برق تولیدی کل کارخانه</h4>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body" id="app">
                    <div class="basic-form">
                        <form method="post" action="{{ route('electricgen.update',$eletricGen) }}"  >
                            @csrf
                             <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label></label>
                                    <select name="day" class="form-control" required>
                                        <option value=""> روز</option>
                                        @for($i=1; $i<31; $i++)
                                        <option value="{{$i}}" @if($eletricGen->day==$i)selected @endif>{{$i}}</option>
                                        @endfor
                                       

                                    </select>
                                </div>

                          
                                <div class="form-group col-md-4">
                                    <label></label>
                                    <select name="term" class="form-control" required>
                                        <option value=""> دوره</option>
                                         @for($i=1; $i<13; $i++)
                                        <option value="{{$i}}" @if($eletricGen->term==$i)selected @endif>{{$i}}</option>
                                        @endfor


                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label></label>
                                    <select name="year" class="form-control" required>
                                        <option value=""> سال</option>
                                          @for($i=1395; $i<1401; $i++)
                                        <option value="{{$i}}" @if($eletricGen->year==$i)selected @endif>{{$i}}</option>
                                        @endfor
                                       


                                    </select>
                                </div>


                                
                               
                                <div class="form-group col-md-6">
                                    <label>مقدار تولید پیک</label>
                                    <input type="text" name="amount_pik" @input='caluse()' v-model="amount_pik"
                                        class="form-control" placeholder="مقدار / کیلووات">
                                </div>
                               
                                <div class="form-group col-md-6">
                                    <label>مقدار تولید میان باری</label>
                                    <input type="text" name="amount_mid" @input='caluse()' v-model="amount_mid"
                                        class="form-control" placeholder="مقدار / کیلووات">
                                </div>

                               
                                <div class="form-group col-md-6">
                                    <label>مقدار تولید کم باری</label>
                                    <input type="text" name="amount_low" @input='caluse()' v-model="amount_low"
                                        class="form-control" placeholder="مقدار / کیلووات">
                                </div>
                              
                               
                                <div class="form-group col-md-12">
                                    <label>تولید  کل</label>
                                    <input type="text" name="all_amount" style="color:red; font-size:20px; font-weight:bold"
                                        class="form-control" v-model='amount'>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>میزان مصرف سوخت </label>
                                    <input type="text" value="{{$eletricGen->fuel_use}}" name="fuel_use" style="color:orange; font-size:20px; font-weight:bold"
                                        class="form-control" >
                                </div>




                            </div>



                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 ">






            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">مقادیر ثبت شده </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>

                                        <th>سال </th>
                                        <th>دوره</th>
                                        <th>روز</th>
                                       
                                        <th>پیک </th>
                                        <th>میان باری </th>
                                        <th>کم باری </th>
                                       
                                        <th>کل </th>
                                        <th>سوخت مصرفی </th>
                                        <th>عملیات </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allGens as $all)
                                        <tr>

                                            <td>{{ $all->year }}</td>
                                            <td>{{ $all->term }}</td>
                                            <td>{{ $all->day }}</td>
                                       
                                            <td>{{ number_format($all->amount_pik) }}</td>
                                            <td>{{ number_format($all->amount_mid) }}</td>
                                            <td>{{ number_format($all->amount_low) }}</td>
                                           
     <td>{{ number_format($all->all_amount) }}</td>
                                            <td>{{ number_format($all->fuel_use) }}</td>
                                       
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('electricgen.edit', $all) }}"
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <form action="{{ route('electricgen.delete', $all) }}"
                                                        method="post" onsubmit="return ConfirmDelete()">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>



                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <script>
        function ConfirmDelete() {
            var x = confirm("آیا مطمئنید؟");
            if (x)
                return true;
            else
                return false;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
 
    <script>


new Vue(
    {
        el: '#app',
        data: {
          amount_pik: {{$eletricGen->amount_pik}},
          amount_mid: {{$eletricGen->amount_mid}},
          amount_low: {{$eletricGen->amount_low}},

           amount: {{$eletricGen->all_amount}},
         
        },
        methods: {
            caluse: function () {
              
                    this.amount = this. amount_pik*1 + this.amount_mid*1+this.amount_low*1
                    
            }

        }

    }
);
</script>


@endsection
