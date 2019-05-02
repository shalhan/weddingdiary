@extends("layouts.main")

@push('style')
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.css" />
@endpush

@push('script')
<script src="/assets/js/libs/moment/moment.min.js"></script>
<script src="/assets/js/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
<script src="/assets/js/core/demo/DemoFormComponents.js"></script>
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
        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Form Matrimony</strong></h4>
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
                                    <textarea name="WEDDING_MATRIMONY_ADDRESS" id="WEDDING_MATRIMONY_ADDRESS" class="form-control" rows="3" placeholder="Matrimony Venue Address">{{ isset($wedding->WEDDING_MATRIMONY_ADDRESS) ? $wedding->WEDDING_MATRIMONY_ADDRESS : old('WEDDING_MATRIMONY_ADDRESS') }}</textarea>
                                    <small class="text-support2">* {{$errors->first('WEDDING_MATRIMONY_ADDRESS')}} </small>
                                @else
                                    <textarea name="WEDDING_MATRIMONY_ADDRESS" id="WEDDING_MATRIMONY_ADDRESS" class="form-control" rows="3" placeholder="Matrimony Venue Address">{{ isset($wedding->WEDDING_MATRIMONY_ADDRESS) ? $wedding->WEDDING_MATRIMONY_ADDRESS : old('WEDDING_MATRIMONY_ADDRESS') }}</textarea>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_MATRIMONY_TIME">Matrimony Time</label>
                                @if($errors->any() && $errors->first('WEDDING_MATRIMONY_TIME'))
                                    <input type="text" name="WEDDING_MATRIMONY_TIME" id="WEDDING_MATRIMONY_TIME" class="form-control u-input--isError" placeholder="Matrimony Venue Address" value={{ old('WEDDING_MATRIMONY_TIME')}}>
                                    <small class="text-support2">* {{$errors->first('WEDDING_MATRIMONY_TIME')}} </small>
                                @else
                                    <input type="text" name="WEDDING_MATRIMONY_TIME" id="demo-date-inline-first" class="form-control" placeholder="Matrimony Venue Address" value="{{ isset($wedding->WEDDING_MATRIMONY_TIME) ? $wedding->WEDDING_MATRIMONY_TIME : old('WEDDING_MATRIMONY_TIME') }}">
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
                            <h4 class="text-light">Form Reception</strong></h4>
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
                                    <textarea name="WEDDING_RECEPTION_ADDRESS" id="WEDDING_RECEPTION_ADDRESS" class="form-control" rows="3" placeholder="Reception Venue Address">{{ old('WEDDING_RECEPTION_ADDRESS')}}</textarea>
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
                            <!-- <div class="form-group">
                                <label for="WEDDING_RECEPTION_TIMEZONE">Matrimony Timezone</label>
                                <select name="WEDDING_RECEPTION_TIMEZONE" id="WEDDING_RECEPTION_TIMEZONE" class="form-control">
                                    <option value="WIB" {{ isset($wedding->WEDDING_RECEPTION_TIMEZONE) && $wedding->WEDDING_RECEPTION_TIMEZONE == "WIB" ? 'selected' : ''}}>WIB</option>
                                    <option value="WITA" {{ isset($wedding->WEDDING_RECEPTION_TIMEZONE) && $wedding->WEDDING_RECEPTION_TIMEZONE == "WITA" ? 'selected' : ''}}>WITA</option>
                                    <option value="WIT" {{ isset($wedding->WEDDING_RECEPTION_TIMEZONE) && $wedding->WEDDING_RECEPTION_TIMEZONE == "WIT" ? 'selected' : ''}}>WIT</option>
                                </select>
                            </div> -->
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
                            <h4 class="text-light">Form General</strong></h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="WEDDING_STYLE">Religion</label>
                                <select name="WEDDING_STYLE" id="WEDDING_STYLE" class="form-control">
                                    <option value="0">Katolik</option>
                                    <option value="1">Protestan</option>
                                    <option value="2">Budha</option>
                                    <option value="3">Islam</option>
                                    <option value="4">Hindu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_MATRIMONY_TIMEZONE">Timezone</label>
                                <select name="WEDDING_MATRIMONY_TIMEZONE" id="WEDDING_MATRIMONY_TIMEZONE" class="form-control">
                                    <option value="WIB" {{ isset($wedding->WEDDING_MATRIMONY_TIMEZONE) && $wedding->WEDDING_MATRIMONY_TIMEZONE == "WIB" ? 'selected' : ''}}>WIB</option>
                                    <option value="WITA" {{ isset($wedding->WEDDING_MATRIMONY_TIMEZONE) && $wedding->WEDDING_MATRIMONY_TIMEZONE == "WITA" ? 'selected' : ''}}>WITA</option>
                                    <option value="WIT" {{ isset($wedding->WEDDING_MATRIMONY_TIMEZONE) && $wedding->WEDDING_MATRIMONY_TIMEZONE == "WIT" ? 'selected' : ''}}>WIT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_MAP">Maps</label>
                                @if($errors->any() && $errors->first('WEDDING_MAP'))
                                    <input type="text" name="WEDDING_MAP" id="WEDDING_MAP" class="form-control" rows="3" placeholder="Wedding map" value="{{ old('WEDDING_MAP') }}">
                                    <small class="text-support2">* {{$errors->first('WEDDING_MAP')}} </small>
                                @else
                                    <input type="text" name="WEDDING_MAP" id="WEDDING_MAP" class="form-control" rows="3" placeholder="Wedding map" value="{{ isset($wedding->WEDDING_MAP) ? $wedding->WEDDING_MAP : old('WEDDING_MAP') }}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_VIDEO">Video</label>
                                @if($errors->any() && $errors->first('WEDDING_VIDEO'))
                                    <input type="text" name="WEDDING_VIDEO" id="WEDDING_VIDEO" class="form-control" rows="3" placeholder="Wedding video" value="{{ old('WEDDING_VIDEO') }}">
                                    <small class="text-support2">* {{$errors->first('WEDDING_VIDEO')}} </small>
                                @else
                                    <input type="text" name="WEDDING_VIDEO" id="WEDDING_VIDEO" class="form-control" rows="3" placeholder="Wedding video" value="{{ isset($wedding->WEDDING_VIDEO) ? $wedding->WEDDING_VIDEO : old('WEDDING_VIDEO') }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="u-flex u-flexJustifyContentEnd">
            <button type="submit" class="btn btn-inverse">Save</button>
        </div>
    </form>

</div>
<!--end .section-body -->
@endsection