@extends("layouts.main")

@push('style')
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/toastr/toastr.css" />
@endpush

@push('script')
<script>
    function handleImgUpload(type, coupleId, index = 0) {
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
                        formData.append('index', index)


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

    <div class="u-flex u-flexJustifyContentEnd" style="margin-bottom: 15px;">
        <a href="{{ route('showEditCouple', ['id'=>$coupleId, 'step'=>2]) }}"><button type="button" class="btn btn-default" style="margin-bottom: 15px;">Prev</button></a>
        <a href="{{route('showEditCouple', ['coupleId'=>$coupleId, 'step'=> 4] )}}"><button type="button" class="btn btn-inverse">Next</button></a>
    </div>
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
        <div class="col-lg-4">
            <div class="box">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Background Photo 1</h4>
                    </header>
                </div>
                <div class="box-body">
                    @if(!isset($coupleImg[0]))
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height400 u-relative" onclick="handleImgUpload('COVER1', {{$coupleId}}, 1)">
                            <p id="COVER1_LABEL">Click here to upload Cover Photo</p>
                            <img id="COVER1_PHOTO" class="u-sizeFull" style="display: none">
                        </div>
                    @else
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height400 u-relative" onclick="handleImgUpload('COVER1', {{$coupleId}}, 1)">
                            <p id="COVER1_LABEL" style="display: none">Click here to upload Slider Photo</p>
                            <img id="COVER1_PHOTO" class="u-sizeFull" src="{{$coupleImg[0]}}">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Background Photo 2</h4>
                    </header>
                </div>
                <div class="box-body">
                    @if(!isset($coupleImg[1]))
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height400 u-relative" onclick="handleImgUpload('COVER2', {{$coupleId}}, 2)">
                            <p id="COVER2_LABEL">Click here to upload Cover Photo</p>
                            <img id="COVER2_PHOTO" class="u-sizeFull" style="display: none">
                        </div>
                    @else
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height400 u-relative" onclick="handleImgUpload('COVER2', {{$coupleId}}, 2)">
                            <p id="COVER2_LABEL" style="display: none">Click here to upload Slider Photo</p>
                            <img id="COVER2_PHOTO" class="u-sizeFull" src="{{$coupleImg[1]}}">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Background Photo 3</h4>
                    </header>
                </div>
                <div class="box-body">
                    @if(!isset($coupleImg[2]))
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height400 u-relative" onclick="handleImgUpload('COVER3', {{$coupleId}}, 3)">
                            <p id="COVER3_LABEL">Click here to upload Cover Photo</p>
                            <img id="COVER3_PHOTO" class="u-sizeFull" style="display: none">
                        </div>
                    @else
                        <div class="uploadPhoto-warpper u-backgroundColorGrey10 u-border0 u-cursorPointer u-height400 u-relative" onclick="handleImgUpload('COVER3', {{$coupleId}}, 3)">
                            <p id="COVER3_LABEL" style="display: none">Click here to upload Slider Photo</p>
                            <img id="COVER3_PHOTO" class="u-sizeFull" src="{{$coupleImg[2]}}">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection