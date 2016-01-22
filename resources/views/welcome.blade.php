@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">
            <h1>Join AGM Online </h1> 
            @include('flash::message')
            <div class="col-md-12">
                @include('errors.formError')
            </div>
            <div class="login-box">
                {!! Form::open(['url'=>'account/checkuser' ])!!}
                        
                    <input type="text" name="fullname" class="text" placeholder="fullname" >

                     <input type="text" name="email" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" >

                    <input type="number" name="phone" placeholder="Phone Number">
                
                <div class="check-box">
                    <div class="slideThree">    
                        <input type="checkbox" value="None" id="slideThree" name="check" />
                        <label for="slideThree"> </label>
                    </div>
                </div>
                <div class="remember"><a href="#"><p>Remember me</p></a></div>
                <div class="btns"><input type="submit"  value="Find Me" ></div>
                {!!Form::close()!!}
            </div>
                    @if($user)
            <div class="row">
            <div class="col-xs-12">
               
              <!-- /.box -->
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div align="center">
                    <table align="center" class="table table-bordered table-striped" id="example1">
                      <thead>
                        <tr>
                          <th>FullName</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Company</th>
                          <th>Shares</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->company_name }}</td>
                        <td>{{ $user->number_of_shares }}</td>
                        <td>
                          {!! Form::open(['url'=>'account/confirmuser' ])!!}
                            <input type="hidden" name="id" value="{{ $user->id }}">

                            {!! Form::submit('Confirm', ['class'=>'btn  btn-block btn-flat remove-margin']) !!}
                          {!!Form::close()!!}  
                        </td>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>FullName</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Company</th>
                          <th>Shares</th>
                         <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        @endif
            </div>
        </div>
    </div>
@stop
