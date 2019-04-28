@extends("layouts.main")

@push('style')
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/toastr/toastr.css" />
@endpush

@push('script')
<script>
    function handleImgUpload(type) {
        const reader = new FileReader();
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.addEventListener('change', (e) => {
            const files = e.srcElement.files;

            reader.addEventListener('load', async () => {
                try {
                    const labelId = `${type}_LABEL`;
                    const pictureId = `${type}_PHOTO`;

                    let label = document.getElementById(labelId);
                    let picture = document.getElementById(pictureId);

                    if (reader.result) {
                        label.setAttribute('class', 'u-displayNone');

                        picture.removeAttribute('style');
                        picture.removeAttribute('src');
                    }

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
    <li><a href="{{route('showCreateCouple', ['step'=>1])}}">create</a></li>
    <li class="active">step 3</li>
</ol>
<div class="section-header">
    <h3 class="text-standard">Couple Photo</h3>
</div>
<div class="section-body">
    <div class="row">

        <div class="col-lg-6">
            <div class="box">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Groom Photo</h4>
                    </header>
                </div>
                <div class="box-body">
                    <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height300 u-relative" onclick="handleImgUpload('GROOM')">
                        <p id="GROOM_LABEL">Click here to upload Groom Photo</p>
                        <img id="GROOM_PHOTO" class="u-sizeFull" style="display: none">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="box">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Bride Photo</h4>
                    </header>
                </div>
                <div class="box-body">
                    <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height300 u-relative" onclick="handleImgUpload('BRIDE')">
                        <p id="BRIDE_LABEL">Click here to upload Bride Photo</p>
                        <img id="BRIDE_PHOTO" class="u-sizeFull" style="display: none">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Cover Photo</h4>
                    </header>
                </div>
                <div class="box-body">
                    <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height400 u-relative" onclick="handleImgUpload('COVER')">
                        <p id="COVER_LABEL">Click here to upload Cover Photo</p>
                        <img id="COVER_PHOTO" class="u-sizeFull" style="display: none">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="u-flex u-flexJustifyContentEnd">
        <a href="{{route('showCreateCouple', ['step'=>4])}}"><button type="button" class="btn btn-inverse">Save</button></a>
    </div>
</div>
@endsection