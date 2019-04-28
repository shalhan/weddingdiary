@extends('layouts.blank')

@section('content')
<div class="row u-marginTop64">
  <div class="col-md-4 col-md-offset-4">

    <form role="form" method="POST">
      @csrf
      <div class="box">
        <div class="box-body">
          <p>Enter your email address to reset your password</p>
          <div class="form-vertical u-marginTop24">
            <div class="form-group">
              <label for="EMAIL">Email Address</label>
              <input type="email" name="email" id="EMAIL" class="form-control" placeholder="Your email address" value={{ old('EMAIL')}}>
            </div>
          </div>
          <button type="submit" class="btn btn-inverse u-fullWidth">Send Email</button>
        </div>
    </form>

  </div>
</div>

@endsection