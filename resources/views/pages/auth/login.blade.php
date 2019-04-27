@extends('layouts.blank')

@section('content')
<div class="row u-marginTop64">
  <div class="col-md-4 col-md-offset-4">

    <form role="form" method="POST" action="{{route('login')}}">
      @csrf
      <div class="box">
        <div class="box-body">
          <div class="form-vertical">
            <div class="form-group">
              <label for="EMAIL">Email Address</label>
              <input type="email" name="email" id="EMAIL" class="form-control" placeholder="Your email address" value={{ old('EMAIL')}}>
            </div>
            <div class="form-vertical">
              <div class="form-group">
                <label for="PASSWORD">Password</label>
                <input type="password" name="password" id="PASSWORD" class="form-control" placeholder="Your password" value={{ old('PASSWORD')}}>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-inverse u-fullWidth">Login</button>
        </div>
    </form>

  </div>
</div>

@endsection