@extends("layouts.main")

@push('style')
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.css" />
@endpush

@push('script')
<script src="/assets/js/libs/moment/moment.min.js"></script>
<script src="/assets/js/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
<script>
$('#WEDDING_MATRIMONY_TIME').datetimepicker();
</script>
@endpush

@section("content")
@php
    $wedding = isset($data['data']) ? $data['data'] : null
@endphp
<ol class="breadcrumb">
    <li><a href="../../html/.html">home</a></li>
    <li class="active">Dashboard</li>
</ol>
<div class="section-header">
    <h3 class="text-standard">Wedding Information</h3>
</div>
<div class="section-body">

    <form role="form" method="POST" action="{{route('saveWedding')}}">
        @csrf
        <div class="u-flex u-flexJustifyContentEnd">
            <a href="{{ route('showEditCouple', ['id'=>$coupleId, 'step'=>1]) }}"><button type="button" class="btn btn-default" style="margin-bottom: 15px;">Prev</button></a>
            <button type="submit" class="btn btn-inverse" style="margin-bottom: 15px;">Next</button>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Holy Matrimony Detail</strong></h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <input type="hidden" name="current_url" value="{{Request::url()}}">
                                <input type="hidden" name="GUID" value="{{isset($wedding->GUID) ? $wedding->GUID : ''}}">
                                <input type="hidden" name="MSCOUPLE_GUID" value="{{isset($coupleId) ? $coupleId : ''}}">
                                <label for="WEDDING_MATRIMONY_VENUE">Matrimony Venue</label>
                                @if($errors->any() && $errors->first('WEDDING_MATRIMONY_VENUE'))
                                    <input type="text" name="WEDDING_MATRIMONY_VENUE" id="WEDDING_MATRIMONY_VENUE" class="form-control u-input--isError" placeholder="Matrimony Venue" value={{ old('WEDDING_MATRIMONY_VENUE')}}>
                                    <small class="text-support2">* {{$errors->first('WEDDING_MATRIMONY_VENUE')}} </small>
                                @else
                                    <input type="text" name="WEDDING_MATRIMONY_VENUE" id="WEDDING_MATRIMONY_VENUE" class="form-control" placeholder="Matrimony Venue" value="{{ isset($wedding->WEDDING_MATRIMONY_VENUE) ? $wedding->WEDDING_MATRIMONY_VENUE : old('WEDDING_MATRIMONY_VENUE') }}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_MATRIMONY_ADDRESS">Matrimony Venue Address</label>
                                @if($errors->any() && $errors->first('WEDDING_MATRIMONY_ADDRESS'))
                                    <textarea name="WEDDING_MATRIMONY_ADDRESS" id="WEDDING_MATRIMONY_ADDRESS" class="form-control u-input--isError" rows="3" placeholder="Matrimony Venue Address">{{ isset($wedding->WEDDING_MATRIMONY_ADDRESS) ? $wedding->WEDDING_MATRIMONY_ADDRESS : old('WEDDING_MATRIMONY_ADDRESS') }}</textarea>
                                    <small class="text-support2">* {{$errors->first('WEDDING_MATRIMONY_ADDRESS')}} </small>
                                @else
                                    <textarea name="WEDDING_MATRIMONY_ADDRESS" id="WEDDING_MATRIMONY_ADDRESS" class="form-control" rows="3" placeholder="Matrimony Venue Address">{{ isset($wedding->WEDDING_MATRIMONY_ADDRESS) ? $wedding->WEDDING_MATRIMONY_ADDRESS : old('WEDDING_MATRIMONY_ADDRESS') }}</textarea>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_MATRIMONY_TIME">Matrimony Time</label>
                                @if($errors->any() && $errors->first('WEDDING_MATRIMONY_TIME'))
                                    <input id="WEDDING_MATRIMONY_TIME"  type="text" name="WEDDING_MATRIMONY_TIME" class="form-control u-input--isError" placeholder="Matrimony Venue Address" value={{ getDateTimeFormFormat(old('WEDDING_MATRIMONY_TIME'))}}>
                                    <small class="text-support2">* {{$errors->first('WEDDING_MATRIMONY_TIME')}} </small>
                                @else
                                    <input id="WEDDING_MATRIMONY_TIME" type="text" name="WEDDING_MATRIMONY_TIME" class="form-control" placeholder="Matrimony Venue Address" value="{{ isset($wedding->WEDDING_MATRIMONY_TIME) ? getDateTimeFormFormat($wedding->WEDDING_MATRIMONY_TIME) : getDateTimeFormFormat(old('WEDDING_MATRIMONY_TIME')) }}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_MATRIMONY_TIME">Matrimony Timezone</label>
                                @if($errors->any() && $errors->first('WEDDING_MATRIMONY_TIMEZONE'))
                                    <input type="text" name="WEDDING_MATRIMONY_TIMEZONE" id="WEDDING_MATRIMONY_TIMEZONE" class="form-control u-input--isError" placeholder="e.g : WIB, WITA, WIT, GMT+7, etc" value="{{ getDateTimeFormFormat(old('WEDDING_MATRIMONY_TIMEZONE')) }}">
                                    <small class="text-support2">* {{$errors->first('WEDDING_MATRIMONY_TIMEZONE')}} </small>
                                @else
                                    <input type="text" name="WEDDING_MATRIMONY_TIMEZONE" id="WEDDING_MATRIMONY_TIMEZONE" class="form-control" placeholder="e.g : WIB, WITA, WIT, GMT+7, etc" value="{{ isset($wedding->WEDDING_MATRIMONY_TIMEZONE) ? getDateTimeFormFormat($wedding->WEDDING_MATRIMONY_TIMEZONE) : getDateTimeFormFormat(old('WEDDING_MATRIMONY_TIMEZONE')) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Reception Details</strong></h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="WEDDING_RECEPTION_VENUE">Reception Venue</label>
                                @if($errors->any() && $errors->first('WEDDING_RECEPTION_VENUE'))
                                    <input type="text" name="WEDDING_RECEPTION_VENUE" id="WEDDING_RECEPTION_VENUE" class="form-control u-input--isError" placeholder="Reception Venue" value={{ old('WEDDING_RECEPTION_VENUE')}}>
                                    <small class="text-support2">* {{$errors->first('WEDDING_RECEPTION_VENUE')}} </small>
                                @else
                                    <input type="text" name="WEDDING_RECEPTION_VENUE" id="WEDDING_RECEPTION_VENUE" class="form-control" placeholder="Reception Venue" value="{{ isset($wedding->WEDDING_RECEPTION_VENUE) ? $wedding->WEDDING_RECEPTION_VENUE : old('WEDDING_RECEPTION_VENUE') }}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_RECEPTION_ADDRESS">Reception Venue Address</label>
                                @if($errors->any() && $errors->first('WEDDING_RECEPTION_ADDRESS'))
                                    <textarea name="WEDDING_RECEPTION_ADDRESS" id="WEDDING_RECEPTION_ADDRESS" class="form-control u-input--isError" rows="3" placeholder="Reception Venue Address">{{ old('WEDDING_RECEPTION_ADDRESS')}}</textarea>
                                    <small class="text-support2">* {{$errors->first('WEDDING_RECEPTION_ADDRESS')}} </small>
                                @else
                                    <textarea name="WEDDING_RECEPTION_ADDRESS" id="WEDDING_RECEPTION_ADDRESS" class="form-control" rows="3" placeholder="Reception Venue Address">{{ isset($wedding->WEDDING_RECEPTION_ADDRESS) ? $wedding->WEDDING_RECEPTION_ADDRESS : old('WEDDING_RECEPTION_ADDRESS') }}</textarea>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_RECEPTION_TIME">Reception Time</label>
                                @if($errors->any() && $errors->first('WEDDING_RECEPTION_TIME'))
                                    <input type="text" name="WEDDING_RECEPTION_TIME" id="WEDDING_RECEPTION_TIME" class="form-control u-input--isError" placeholder="Reception Time" value={{ old('WEDDING_RECEPTION_TIME')}}>
                                    <small class="text-support2">* {{$errors->first('WEDDING_RECEPTION_TIME')}} </small>
                                @else
                                    <input type="text" name="WEDDING_RECEPTION_TIME" placeholder="Reception Time" class="form-control" id='demo-date-inline-second' value="{{ isset($wedding->WEDDING_RECEPTION_TIME) ? $wedding->WEDDING_RECEPTION_TIME : old('WEDDING_RECEPTION_TIME') }}" value={{ old('WEDDING_RECEPTION_TIME')}}>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_RECEPTION_TIMEZONE">Reception Timezone</label>
                                @if($errors->any() && $errors->first('WEDDING_RECEPTION_TIMEZONE'))
                                    <input type="text" name="WEDDING_RECEPTION_TIMEZONE" id="WEDDING_RECEPTION_TIMEZONE" class="form-control u-input--isError" placeholder="e.g : WIB, WITA, WIT, GMT+7, etc" value="{{ old('WEDDING_RECEPTION_TIMEZONE') }}">
                                    <small class="text-support2">* {{$errors->first('WEDDING_RECEPTION_TIMEZONE')}} </small>
                                @else
                                    <input type="text" name="WEDDING_RECEPTION_TIMEZONE" id="WEDDING_RECEPTION_TIMEZONE" class="form-control" placeholder="e.g : WIB, WITA, WIT, GMT+7, etc" value="{{ isset($wedding->WEDDING_RECEPTION_TIMEZONE) ? $wedding->WEDDING_RECEPTION_TIMEZONE : old('WEDDING_RECEPTION_TIMEZONE') }}">
                                @endif
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
                            <h4 class="text-light">General Detail</strong></h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="WEDDING_STYLE">Religion</label>
                                <select name="WEDDING_STYLE" id="WEDDING_STYLE" class="form-control">
                                    <option value="0" {{isset($wedding->WEDDING_STYLE) && $wedding->WEDDING_STYLE == 0 ? 'selected' : '' }}>Katolik</option>
                                    <option value="1" {{isset($wedding->WEDDING_STYLE) && $wedding->WEDDING_STYLE == 1 ? 'selected' : '' }}>Protestan</option>
                                    <option value="2" {{isset($wedding->WEDDING_STYLE) && $wedding->WEDDING_STYLE == 2 ? 'selected' : '' }}>Budha</option>
                                    <option value="3" {{isset($wedding->WEDDING_STYLE) && $wedding->WEDDING_STYLE == 3 ? 'selected' : '' }}>Islam</option>
                                    <option value="4" {{isset($wedding->WEDDING_STYLE) && $wedding->WEDDING_STYLE == 4 ? 'selected' : '' }}>Hindu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_MAP">Maps</label>
                                <ul class="box-body">
                                    <li class="text-gray"><small>Open Google Maps or click this <a href="https://google.com/maps" target="_blank">link</a></small></li>
                                    <li class="text-gray"><small>Search your location</small></li>
                                    <li class="text-gray"><small>Click share button</small></li>
                                    <li class="text-gray"><small>Click embedded map menu</small></li>
                                    <li class="text-gray"><small>Click copy html</small></li>
                                    <li class="text-gray"><small>Paste the link here</small></li>
                                </ul>
                                @if($errors->any() && $errors->first('WEDDING_MAP'))
                                    <textarea name="WEDDING_MAP" id="WEDDING_MAP" class="form-control" rows="3" placeholder="Google map iframe">{{ old('WEDDING_MAP')}}</textarea>
                                    <small class="text-support2">* {{$errors->first('WEDDING_MAP')}} </small>
                                @else
                                    <textarea name="WEDDING_MAP" id="WEDDING_MAP" class="form-control" rows="3" placeholder="Google map iframe">{{ isset($wedding->WEDDING_MAP) ? $wedding->WEDDING_MAP : old('WEDDING_MAP') }}</textarea>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_VIDEO">Video</label>
                                <ul class="box-body">
                                    <li class="text-gray"><small>Open Youtube or click this <a href="https://youtube.com" target="_blank">link</a></small></li>
                                    <li class="text-gray"><small>Open your video</small></li>
                                    <li class="text-gray"><small>Copy the video ID and paste it to here</small></li>
                                    <li class="text-gray"><small>For example, your video url is `https://youtube.com/watch?v=<b>GhfuF43</b>`</small></li>
                                    <li class="text-gray"><small>From that link, the video ID is <b>GhfuF43</b></small></li>
                                </ul>
                                @if($errors->any() && $errors->first('WEDDING_VIDEO'))
                                    <textarea name="WEDDING_VIDEO" id="WEDDING_VIDEO" class="form-control" rows="3" placeholder="Youtube video ID">{{ old('WEDDING_VIDEO')}}</textarea>

                                    <input type="text" name="WEDDING_VIDEO" id="WEDDING_VIDEO" class="form-control" rows="3" placeholder="Youtube video ID" value="{{ old('WEDDING_VIDEO') }}">
                                    <small class="text-support2">* {{$errors->first('WEDDING_VIDEO')}} </small>
                                @else
                                    <textarea name="WEDDING_VIDEO" id="WEDDING_VIDEO" class="form-control" rows="3" placeholder="Youtube video ID">{{ isset($wedding->WEDDING_VIDEO) ? $wedding->WEDDING_VIDEO : old('WEDDING_VIDEO') }}</textarea>
                                @endif
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