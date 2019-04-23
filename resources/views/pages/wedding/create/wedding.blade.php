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
<ol class="breadcrumb">
    <li><a href="../../html/.html">home</a></li>
    <li class="active">Dashboard</li>
</ol>
<div class="section-header">
    <h3 class="text-standard">Step wedding</h3>
</div>
<div class="section-body">

    <form role="form" method="POST">
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
                                <label for="WEDDING_MATRIMONY_VENUE">Matrimony Venue</label>
                                <input type="text" name="WEDDING_MATRIMONY_VENUE" id="WEDDING_MATRIMONY_VENUE" class="form-control" placeholder="Matrimony Venue">
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_MATRIMONY_VENUE_ADDRESS">Matrimony Venue Address</label>
                                <textarea name="WEDDING_MATRIMONY_VENUE_ADDRESS" id="WEDDING_MATRIMONY_VENUE_ADDRESS" class="form-control" rows="3" placeholder="Matrimony Venue Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_MATRIMONY_TIME">Matrimony Time</label>
                                <input type="text" name="WEDDING_MATRIMONY_TIME" placeholder="Matrimony Time" class="form-control" id='demo-date-inline-first' />
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_MATRIMONY_TIMEZONE">Matrimony Timezone</label>
                                <select name="WEDDING_MATRIMONY_TIMEZONE" id="WEDDING_MATRIMONY_TIMEZONE" class="form-control">
                                    <option>WIB</option>
                                    <option>WITA</option>
                                    <option>WIT</option>
                                </select>
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
                                <input type="text" name="WEDDING_RECEPTION_VENUE" id="WEDDING_RECEPTION_VENUE" class="form-control" placeholder="Reception Venue">
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_RECEPTION_VENUE_ADDRESS">Reception Venue Address</label>
                                <textarea name="WEDDING_RECEPTION_VENUE_ADDRESS" id="WEDDING_RECEPTION_VENUE_ADDRESS" class="form-control" rows="3" placeholder="Reception Venue Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_RECEPTION_TIME">Reception Time</label>
                                <input type="text" name="WEDDING_RECEPTION_TIME" placeholder="Reception Time" class="form-control" id='demo-date-inline-second' />
                            </div>
                            <div class="form-group">
                                <label for="WEDDING_RECEPTION_TIMEZONE">Reception Timezone</label>
                                <select name="WEDDING_RECEPTION_TIMEZONE" id="WEDDING_RECEPTION_TIMEZONE" class="form-control">
                                    <option>WIB</option>
                                    <option>WITA</option>
                                    <option>WIT</option>
                                </select>
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
                            <h4 class="text-light">Form General</strong></h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="MAPS">Maps</label>
                                <input type="text" name="MAPS" id="MAPS" class="form-control" placeholder="Maps">
                            </div>
                            <div class="form-group">
                                <label for="VIDEO">Video</label>
                                <input type="text" name="VIDEO" id="VIDEO" class="form-control" placeholder="Video">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="u-flex u-flexJustifyContentEnd">
            <button type="button" class="btn btn-inverse">Save</button>
        </div>
    </form>

</div>
<!--end .section-body -->
@endsection