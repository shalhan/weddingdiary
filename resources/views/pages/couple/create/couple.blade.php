@extends("layouts.main")

@push('style')
@endpush

@push('script')

@endpush

@section("content")
@php
    $couple = isset($data['data']) ? $data['data'] : null
@endphp

<ol class="breadcrumb">
    <li><a href="{{route('showCouples')}}">couples</a></li>
    <li><a href="{{route('showCreateCouple', ['step'=>1])}}">create</a></li>
    <li class="active">step 1</li>
</ol>
<div class="section-header">
    <h3 class="text-standard">Couple Information</h3>
</div>
<div class="section-body">
    <form role="form" method="POST" action="{{route('saveCouple')}}">
        @csrf
        <div class="u-flex u-flexJustifyContentEnd">
            <!-- <a href="{{route('showCreateCouple', ['step'=>2])}}"><button type="button" class="btn btn-inverse">Save</button></a> -->
            <button type="submit" class="btn btn-inverse" style="margin-bottom: 15px;">Next</button>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Groom Detail</h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <input type="hidden" name="current_url" value="{{Request::url()}}">
                            <div class="form-group">
                                <label for="GROOM_REALNAME">Real Name</label>
                                @if($errors->any() && $errors->first('GROOM_REALNAME'))
                                <input type="text" name="GROOM_REALNAME" id="GROOM_REALNAME" class="form-control u-input--isError" placeholder="Real Name" value="{{ old('GROOM_REALNAME')}}">
                                <small class="text-support2">* {{$errors->first('GROOM_REALNAME')}} </small>
                                @else
                                <input type="text" name="GROOM_REALNAME" id="GROOM_REALNAME" class="form-control" placeholder="Real Name" value="{{ isset($couple->groom->GROOM_REALNAME) ? $couple->groom->GROOM_REALNAME : old('GROOM_REALNAME') }}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="GROOM_NAME">Name</label>
                                @if($errors->any() && $errors->first('GROOM_NAME'))
                                <input type="text" name="GROOM_NAME" id="GROOM_NAME" class="form-control u-input--isError" placeholder="Name" value={{ old('GROOM_NAME')}}>
                                <small class="text-support2">* {{$errors->first('GROOM_NAME')}} </small>
                                @else
                                <input type="text" name="GROOM_NAME" id="GROOM_NAME" class="form-control" placeholder="Name" value="{{ isset($couple->groom->GROOM_NAME) ? $couple->groom->GROOM_NAME : old('GROOM_NAME') }}">
                                @endif
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="GROOM_FACEBOOK">Facebook</label>
                                <input type="text" name="GROOM_FACEBOOK" id="GROOM_FACEBOOK" class="form-control" placeholder='e.g "https://facebook.com/weddingdiary"' value="{{ isset($couple->groom->GROOM_FACEBOOK) ? $couple->groom->GROOM_FACEBOOK : old('GROOM_FACEBOOK') }}">
                            </div>
                            <div class="form-group">
                                <label for="GROOM_INSTA">Instagram</label>
                                <input type="text" name="GROOM_INSTA" id="GROOM_INSTA" class="form-control" placeholder=' e.g "https://instagram.com/weddingdiary"' value="{{ isset($couple->groom->GROOM_INSTA) ? $couple->groom->GROOM_INSTA : old('GROOM_INSTA') }}">
                            </div>
                            <div class="form-group">
                                <label for="GROOM_TWTITER">Twitter</label>
                                <input type="text" name="GROOM_TWTITER" id="GROOM_TWTITER" class="form-control" placeholder=' e.g "https://twitter.com/weddingdiary"' value="{{ isset($couple->groom->GROOM_TWTITER) ? $couple->groom->GROOM_TWTITER : old('GROOM_TWTITER') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Bride Detail</h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="BRIDE_REALNAME">Real Name</label>
                                @if($errors->any() && $errors->first('BRIDE_REALNAME'))
                                    <input type="text" name="BRIDE_REALNAME" id="BRIDE_REALNAME" class="form-control u-input--isError" placeholder="Name" value={{ old('BRIDE_REALNAME')}}>
                                    <small class="text-support2">* {{$errors->first('BRIDE_REALNAME')}} </small>
                                @else
                                <input type="text" name="BRIDE_REALNAME" id="BRIDE_REALNAME" class="form-control" placeholder="Real Name" value="{{ isset($couple->bride->BRIDE_REALNAME) ? $couple->bride->BRIDE_REALNAME : old('BRIDE_REALNAME') }}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="BRIDE_NAME">Name</label>
                                @if($errors->any() && $errors->first('BRIDE_NAME'))
                                    <input type="text" name="BRIDE_NAME" id="BRIDE_NAME" class="form-control u-input--isError" placeholder="Name" value={{ old('BRIDE_NAME')}}>
                                    <small class="text-support2">* {{$errors->first('BRIDE_NAME')}} </small>
                                @else
                                <input type="text" name="BRIDE_NAME" id="BRIDE_NAME" class="form-control" placeholder="Name" value="{{ isset($couple->bride->BRIDE_NAME) ? $couple->bride->BRIDE_NAME : old('BRIDE_NAME') }}">
                                @endif
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="BRIDE_FACEBOOK">Facebook</label>
                                <input type="text" name="BRIDE_FACEBOOK" id="BRIDE_FACEBOOK" class="form-control" placeholder=' e.g "https://facebook.com/weddingdiary"' value="{{ isset($couple->bride->BRIDE_FACEBOOK) ? $couple->bride->BRIDE_FACEBOOK : old('BRIDE_FACEBOOK') }}">
                            </div>
                            <div class="form-group">
                                <label for="BRIDE_INSTA">Instagram</label>
                                <input type="text" name="BRIDE_INSTA" id="BRIDE_INSTA" class="form-control" placeholder=' e.g "https://instagram.com/weddingdiary"' value="{{ isset($couple->bride->BRIDE_INSTA) ? $couple->bride->BRIDE_INSTA : old('BRIDE_INSTA') }}">
                            </div>
                            <div class="form-group">
                                <label for="BRIDE_TWTITER">Twitter</label>
                                <input type="text" name="BRIDE_TWTITER" id="BRIDE_TWTITER" class="form-control" placeholder=' e.g "https://twitter.com/weddingdiary"' value="{{ isset($couple->bride->BRIDE_TWTITER) ? $couple->bride->BRIDE_TWTITER : old('BRIDE_TWTITER') }}">
                            </div>
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
                            <h4 class="text-light">Website Setting</h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <input type="hidden" name="GUID" value="{{isset($couple->GUID) ? $couple->GUID : null}}" />
                                <label for="URL">Nickname</label>
                                @if(Auth::user())
                                <p><small class="text-gray">{{Auth::user()->VENDOR_URL}}/diary?wedding={NICKNAME}</small></p>
                                @endif
                                @if($errors->any() && $errors->first('SUBFOLDER2'))
                                    <input type="text" name="SUBFOLDER2" id="SUBFOLDER2" class="form-control u-input--isError" placeholder="Nickname" value={{ old('SUBFOLDER2')}}>
                                    <small class="text-support2">* {{$errors->first('SUBFOLDER2')}} </small>
                                @else
                                    <input type="text" name="SUBFOLDER2" id="URL" class="form-control" placeholder="Nickname" value="{{ isset($couple->prettyLink) ? $couple->prettyLink : old('SUBFOLDER2') }}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="PREWEDPHOTO_AMOUNT">Total Photo</label>
                                <p><small class="text-gray">Total Photos Appear On Gallery Screen above input total photo</small></p>
                                <select id="PREWEDPHOTO_AMOUNT" class="form-control" disabled>
                                    <option value="24" selected>24</option>
                                </select>
                                <input type="hidden" name="PREWEDPHOTO_AMOUNT" value="20" />
                            </div>
                            <div class="form-group">
                                <label for="EXPIRED_DATE">Expired Date</label>
                                <p><small class="text-gray">This website will be available until expired date</small></p>
                                <select id="EXPIRED_DATE" class="form-control" disabled>
                                    @php $date1MonthLater = date(' d-m-Y', strtotime("+1 months", strtotime("NOW") )) @endphp <option value="{{$date1MonthLater}}">{{$date1MonthLater}}</option>
                                </select>
                                <input type="hidden" name="EXPIRED_DATE" value="{{$date1MonthLater}}" />
                            </div>
                            <div class="form-group">
                                <label for="MSTEMPLATE_GUID">Template</label>
                                <select name="MSTEMPLATE_GUID" id="MSTEMPLATE_GUID" class="form-control">
                                    <option value="1" {{!isset($couple->MSTEMPLATE_GUID) || (isset($couple->MSTEMPLATE_GUID) && $couple->MSTEMPLATE_GUID == 1) ? 'selected' : '' }}>1</option>
                                    <option value="2" {{isset($couple->MSTEMPLATE_GUID) && $couple->MSTEMPLATE_GUID == 2 ? 'selected' : '' }}>2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<!--end .section-body -->
@endsection