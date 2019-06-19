@extends("layouts.main")

@push('style')
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/toastr/toastr.css" />
@endpush

@push('script')
<script>
    function handleImageUpload() {
        const reader = new FileReader();
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.addEventListener('change', (e) => {
            const files = e.srcElement.files;

            reader.addEventListener('load', async () => {
                try {
                    let picture = document.getElementById("PROFILE_PICTURE");

                    if (reader.result) picture.removeAttribute('src');

                    picture.setAttribute('src', reader.result);
                    toastr.success('Successfully Saving Photo');
                } catch (err) {
                    console.log(err);
                }
            });

            if (files && files.length > 0) {
                reader.readAsDataURL(files[0]);
            }
        });
    }
</script>
<script src="/assets/js/libs/toastr/toastr.min.js"></script>
@endpush

@section("content")
<ol class="breadcrumb">
    <li><a href="{{route('showCouples')}}">couples</a></li>
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
                    <div class="avatarContainer u-size128">
                        <img id="PROFILE_PICTURE" class="avatarImage u-borderRadius50Percent u-backgroundColorGrey10 u-border0 u-cursorPointer" src="{{Auth::user()->VENDOR_LOGO}}" onclick="handleImageUpload()" />
                    </div>
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
                                <input type="text" name="VENDOR_NAME" id="VENDOR_NAME" class="form-control" placeholder="Vendor Name" value="{{ old('VENDOR_NAME') ? old('VENDOR_NAME') : Auth::user()->VENDOR_NAME }}">
                            </div>
                            <div class="form-group">
                                <label for="VENDOR_WEBSITE">Vendor Website</label>
                                <input type="text" name="VENDOR_WEBSITE" id="VENDOR_WEBSITE" class="form-control" placeholder="Vendor Website" value="{{ old('VENDOR_WEBSITE') ? old('VENDOR_WEBSITE') : Auth::user()->VENDOR_WEBSITE}}">
                            </div>
                            <div class="form-group">
                                <label for="EMAIL">Email Address</label>
                                <input type="email" id="EMAIL" class="form-control" placeholder="Email Address" value="{{ old('email') ? old('email') : Auth::user()->email }}" disabled>
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