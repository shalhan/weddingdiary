@extends("layouts.main")

@push('style')
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/toastr/toastr.css" />
@endpush

@push('script')
<script>
    function handleImgUpload(type, coupleId) {
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

                        const formData = new FormData();
                        formData.append('imageBase64', reader.result)
                        formData.append('coupleId', $('meta[name="_coupleId"]').attr('content'))
                        formData.append('type', type)


                        fetch("/api/upload-image", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                            },
                            body: formData
                        }).then(response => {
                            console.log(response)
                        })

                        // fetch("http://localhost:3000/api/v1/", {
                        //     method: 'GET'
                        // }).then(response => {
                        //     return response.json()
                        // }).then(resJson => {
                        //     console.log(JSON.stringify(resJson))
                        // })

                        picture.setAttribute('src', reader.result);
                        toastr.success('Successfully Saving Photo');
                    }



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
@php
    $coupleImg = $data["coupleImage"];
    $groomImg = $data["groomImage"];
    $brideImg = $data["brideImage"];
@endphp
<meta name="_token" content="{{ csrf_token() }}">
<meta name="_coupleId" content="{{ $coupleId }}">
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
                    @if(!isset($groomImg))
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height300 u-relative" onclick="handleImgUpload('GROOM', {{$coupleId}})">
                            <p id="GROOM_LABEL">Click here to upload Groom Photo</p>
                            <img id="GROOM_PHOTO" class="u-sizeFull" style="display: none">
                        </div>
                    @else
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height300 u-relative" onclick="handleImgUpload('GROOM', {{$coupleId}})">
                            <p id="GROOM_LABEL" style="display: none">Click here to upload Cover Photo</p>
                            <img id="GROOM_PHOTO" class="u-sizeFull" src="{{$groomImg}}">
                        </div>
                    @endif
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
                    @if(!isset($brideImg))
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height300 u-relative" onclick="handleImgUpload('BRIDE', {{$coupleId}})">
                            <p id="BRIDE_LABEL">Click here to upload Bride Photo</p>
                            <img id="BRIDE_PHOTO" class="u-sizeFull" style="display: none">
                        </div>
                    @else
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height300 u-relative" onclick="handleImgUpload('BRIDE', {{$coupleId}})">
                            <p id="BRIDE_LABEL" style="display: none">Click here to upload Cover Photo</p>
                            <img id="BRIDE_PHOTO" class="u-sizeFull" src="{{$brideImg}}">
                        </div>
                    @endif
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
                    @if(!isset($coupleImg))
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height400 u-relative" onclick="handleImgUpload('COVER', {{$coupleId}})">
                            <p id="COVER_LABEL">Click here to upload Cover Photo</p>
                            <img id="COVER_PHOTO" class="u-sizeFull" style="display: none">
                        </div>
                    @else
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height400 u-relative" onclick="handleImgUpload('COVER', {{$coupleId}})">
                            <p id="COVER_LABEL" style="display: none">Click here to upload Cover Photo</p>
                            <img id="COVER_PHOTO" class="u-sizeFull" src="{{$coupleImg}}">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="u-flex u-flexJustifyContentEnd">
        <a href="{{route('showEditCouple', ['coupleId'=>$coupleId, 'step'=> 4] )}}"><button type="button" class="btn btn-inverse">Next</button></a>
    </div>
</div>
@endsection