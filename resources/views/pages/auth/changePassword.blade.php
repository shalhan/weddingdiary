@extends("layouts.blank")

@push('style')
@endpush

@push('script')
@endpush

@section("content")
<div class="row u-marginTop64">
  <div class="col-md-4 col-md-offset-4">

    <div class="box">

      <div class="box-body">
        <p>Enter your new password</p>
        <form role="form" method="POST">
          <div class="form-vertical u-marginTop24">
            <div class="form-group">
              <label for="NEW_PASSWORD">New Password</label>
              <input type="password" name="NEW_PASSWORD" id="NEW_PASSWORD" class="form-control" placeholder="Your New Password" value={{ old('NEW_PASSWORD')}}>
            </div>
            <div class="form-group">
              <label for="CONFIRM_NEW_PASSWORD">Confirm New Password</label>
              <input type="password" name="CONFIRM_NEW_PASSWORD" id="CONFIRM_NEW_PASSWORD" class="form-control" placeholder="Confirm New Password" value={{ old('CONFIRM_NEW_PASSWORD')}}>
            </div>
          </div>
          <button type="submit" class="btn btn-inverse u-fullWidth">Save New Password</button>
        </form>
      </div>

    </div>

  </div>
</div>
@endsection