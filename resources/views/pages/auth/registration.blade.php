@extends('layouts.blank')

@section('content')
<div class="row u-marginTop64">
  <div class="col-md-4 col-md-offset-4">
    <form role="form" method="POST" action="{{route('register')}}" enctype="multipart/form-data">
      @csrf
      <div class="box">
        <div class="box-body">
          <div class="form-vertical">
            <div class="form-group">
                <label for="name">Name</label>
                @if($errors->any() && $errors->first("name"))
                    <input type="text" name="name"  id="name" class="form-control u-input--isError" placeholder="Your vendor name" value={{ old('name')}}>
                    <small class="text-support2">* {{ $errors->first("name") }}</small>
                @else
                    <input type="text" name="name"  id="name" class="form-control" placeholder="Your vendor name" value={{ old('name')}}>
                @endif
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                @if($errors->any() && $errors->first("website"))
                    <input type="text" name="website"  id="website" class="form-control u-input--isError" placeholder="Your vendor website" value={{ old('website')}}>
                    <small class="text-support2">* {{ $errors->first("website") }}</small>
                @else
                    <input type="text" name="website" id="website" class="form-control" placeholder="Your vendor website" value={{ old('website')}}>
                @endif
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
                @if($errors->any() && $errors->first("email"))
                    <input type="text" name="email"  id="email" class="form-control u-input--isError" placeholder="Your email address" value={{ old('email')}}>
                    <small class="text-support2">* {{ $errors->first("email") }}</small>
                @else
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your email address" value={{ old('email')}}>
                @endif
            </div>
            <div class="form-vertical">
              <div class="form-group">
                <label for="password">Password</label>
                @if($errors->any() && $errors->first("password"))
                    <input type="password" name="password" id="password" class="form-control u-input--isError" placeholder="Your password" value={{ old('password')}}>
                    <small class="text-support2">* {{ $errors->first("password") }}</small>
                @else
                    <input type="password" name="password" id="password" class="form-control" placeholder="Your password" value={{ old('password')}}>
                @endif
              </div>
            </div>
            <div class="form-vertical">
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm your password" value={{ old('password_confirmation')}}>
                </div>
            </div>
            <div class="form-vertical">
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control" value={{ old('logo')}}>
                    @if($errors->any() && $errors->first("logo"))
                        <small class="text-support2">* {{ $errors->first("logo") }}</small>
                    @endif

                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-inverse u-fullWidth">Register</button>
          <p class="u-marginTop16 u-textAlignCenter">Oops, I already have <a href="/login" class="u-fontMedium text-primary">an account</a></p>
        </div>
    </form>

  </div>
</div>

@endsection