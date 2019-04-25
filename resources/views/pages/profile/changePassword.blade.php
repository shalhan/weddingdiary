@extends("layouts.main")

@push('style')

@endpush

@push('script')

@endpush

@section("content")
<ol class="breadcrumb">
    <li><a href="../../html/.html">home</a></li>
    <li class="active">Change Password</li>
</ol>

<div class="section-header">
    <h3 class="text-standard">Change Password</h3>
</div>

<div class="section-body">

    <div class="row">
        <div class="col-sm-3">
            <div class="box">
                <div class="box-body u-flex u-flexJustifyContentCenter">
                    <div class="u-size128 u-backgroundColorGrey10 u-borderRadius50Percent u-backgroundPositionCenter u-backgroundNoRepeat u-backgroundSizeCover" style="background-image: url('')"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="box">

                <div class="box-head">
                    <header>
                        <h4 class="text-light">Change Your Password</h4>
                    </header>
                </div>

                <div class="box-body">

                    <form role="form" method="POST">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="OLD_PASSWORD">Old Password</label>
                                <input type="password" name="OLD_PASSWORD" id="OLD_PASSWORD" class="form-control" placeholder="Your Old Password" value={{ old('OLD_PASSWORD')}}>
                            </div>
                            <div class="form-group">
                                <label for="NEW_PASSWORD">New Password</label>
                                <input type="password" name="NEW_PASSWORD" id="NEW_PASSWORD" class="form-control" placeholder="Your New Password" value={{ old('NEW_PASSWORD')}}>
                            </div>
                            <div class="form-group">
                                <label for="CONFIRM_NEW_PASSWORD">Confirm New Password</label>
                                <input type="password" name="CONFIRM_NEW_PASSWORD" id="CONFIRM_NEW_PASSWORD" class="form-control" placeholder="Confirm New Password" value={{ old('CONFIRM_NEW_PASSWORD')}}>
                            </div>
                        </div>
                        <div class="u-flex u-flexJustifyContentEnd u-marginTop16">
                            <button type="submit" class="btn btn-inverse">Save</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection