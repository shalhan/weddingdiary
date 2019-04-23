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
                                <label for="MT_VENUE">Matrimony Venue</label>
                                <input type="text" name="MT_VENUE" id="MT_VENUE" class="form-control" placeholder="Matrimony Venue">
                            </div>
                            <div class="form-group">
                                <label for="MT_VENUE_ADDRESS">Matrimony Venue Address</label>
                                <textarea name="MT_VENUE_ADDRESS" id="MT_VENUE_ADDRESS" class="form-control" rows="3" placeholder="Matrimony Venue Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="MT_TIME">Matrimony Time</label>
                                <input type="text" name="MT_TIME" placeholder="Matrimony Time" class="form-control" id='demo-date-inline-first' />
                            </div>
                            <div class="form-group">
                                <label for="MT_TIMEZONE">Matrimony Timezone</label>
                                <select name="MT_TIMEZONE" id="MT_TIMEZONE" class="form-control">
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
                            <h4 class="text-light">Form Wedding</strong></h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="WD_VENUE">Wedding Venue</label>
                                <input type="text" name="WD_VENUE" id="WD_VENUE" class="form-control" placeholder="Wedding Venue">
                            </div>
                            <div class="form-group">
                                <label for="WD_VENUE_ADDRESS">Wedding Venue Address</label>
                                <textarea name="WD_VENUE_ADDRESS" id="WD_VENUE_ADDRESS" class="form-control" rows="3" placeholder="Wedding Venue Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="WD_TIME">Wedding Time</label>
                                <input type="text" name="WD_TIME" placeholder="Wedding Time" class="form-control" id='demo-date-inline-second' />
                            </div>
                            <div class="form-group">
                                <label for="WD_TIMEZONE">Wedding Timezone</label>
                                <select name="WD_TIMEZONE" id="WD_TIMEZONE" class="form-control">
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