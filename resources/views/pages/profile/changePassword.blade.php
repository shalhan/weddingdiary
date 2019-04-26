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
                    <div class="avatarContainer u-size128">
                        <img id="PROFILE_PICTURE" class="avatarImage u-borderRadius50Percent u-backgroundColorGrey10 u-border0 u-cursorPointer" src="/images/img-placeholder.png" onclick="handleImageUpload()" />
                    </div>
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