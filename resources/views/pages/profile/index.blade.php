@extends("layouts.main")

@push('style')

@endpush

@push('script')

@endpush

@section("content")
<ol class="breadcrumb">
    <li><a href="../../html/.html">home</a></li>
    <li class="active">Profile</li>
</ol>

<div class="section-header">
    <h3 class="text-standard">Profile</h3>
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
                        <h4 class="text-light">Form Profile</h4>
                    </header>
                </div>

                <div class="box-body">

                    <form role="form" method="POST">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="VENDOR_NAME">Vendor Name</label>
                                <input type="text" name="VENDOR_NAME" id="VENDOR_NAME" class="form-control" placeholder="Vendor Name" value={{ old('VENDOR_NAME')}}>
                            </div>
                            <div class="form-group">
                                <label for="VENDOR_WEBSITE">Vendor Website</label>
                                <input type="text" name="VENDOR_WEBSITE" id="VENDOR_WEBSITE" class="form-control" placeholder="Vendor Website" value={{ old('VENDOR_WEBSITE')}}>
                            </div>
                            <div class="form-group">
                                <label for="EMAIL">Email Address</label>
                                <input type="email" name="EMAIL" id="EMAIL" class="form-control" placeholder="Email Address" value={{ old('EMAIL')}}>
                            </div>
                        </div>
                        <a href="/profile/change-password" class="u-fontMedium text-primary">Change Password</a>
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