@extends("layouts.main")

@push('style')

@endpush

@push('script')

@endpush

@section("content")
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
        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Form Groom</h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="GROOM_REALNAME">Real Name</label>
                                <input type="text" name="GROOM_REALNAME" id="GROOM_REALNAME" class="form-control u-input--isError" placeholder="Real Name" value={{ old('GROOM_REALNAME')}}>
                            </div>
                            <div class="form-group">
                                <label for="GROOM_NAME">Name</label>
                                <input type="text" name="GROOM_NAME" id="GROOM_NAME" class="form-control" placeholder="Name" value={{ old('GROOM_NAME')}}>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="GROOM_FACEBOOK">Facebook</label>
                                <input type="text" name="GROOM_FACEBOOK" id="GROOM_FACEBOOK" class="form-control" placeholder='e.g "https://facebook.com/weddingdiary"' value={{ old('GROOM_FACEBOOK')}}>
                            </div>
                            <div class="form-group">
                                <label for="GROOM_INSTAGRAM">Instagram</label>
                                <input type="text" name="GROOM_INSTAGRAM" id="GROOM_INSTA" class="form-control" placeholder=' e.g "https://instagram.com/weddingdiary"' value={{ old('GROOM_INSTAGRAM')}}>
                            </div>
                            <div class="form-group">
                                <label for="GROOM_TWTITER">Twitter</label>
                                <input type="text" name="GROOM_TWTITER" id="GROOM_TWTITER" class="form-control" placeholder=' e.g "https://twitter.com/weddingdiary"' value={{ old('GROOM_TWTITER')}}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Form Bride</h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="BRIDE_REALNAME">Real Name</label>
                                <input type="text" name="BRIDE_REALNAME" id="BRIDE_REALNAME" class="form-control" placeholder="Real Name" value={{ old('BRIDE_REALNAME')}}>
                            </div>
                            <div class="form-group">
                                <label for="BRIDE_NAME">Name</label>
                                <input type="text" name="BRIDE_NAME" id="BRIDE_NAME" class="form-control" placeholder="Name" value={{ old('BRIDE_NAME')}}>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="BRIDE_FACEBOOK">Facebook</label>
                                <input type="text" name="BRIDE_FACEBOOK" id="BRIDE_FACEBOOK" class="form-control" placeholder=' e.g "https://facebook.com/weddingdiary"' value={{ old('BRIDE_FACEBOOK')}}>
                            </div>
                            <div class="form-group">
                                <label for="BRIDE_INSTAGRAM">Instagram</label>
                                <input type="text" name="BRIDE_INSTAGRAM" id="BRIDE_INSTA" class="form-control" placeholder=' e.g "https://instagram.com/weddingdiary"' value={{ old('BRIDE_INSTAGRAM')}}>
                            </div>
                            <div class="form-group">
                                <label for="BRIDE_TWTITER">Twitter</label>
                                <input type="text" name="BRIDE_TWTITER" id="BRIDE_TWTITER" class="form-control" placeholder=' e.g "https://twitter.com/weddingdiary"' value={{ old('BRIDE_TWTITER')}}>
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
                            <h4 class="text-light">Form Settings</h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="URL">URL</label>
                                <input type="text" name="SUBFOLDER2" id="URL" class="form-control" placeholder=' e.g "https://yourdomain.com/diary?wedding=URL"' value={{ old('SUBFOLDER2')}}>
                            </div>
                            <div class="form-group">
                                <label for="PREWEDPHOTO_AMOUNT">Total Photo</label>
                                <select id="PREWEDPHOTO_AMOUNT" class="form-control" disabled>
                                    <option value="24" selected>24</option>
                                </select>
                                <input type="hidden" name="PREWEDPHOTO_AMOUNT" value="20" />
                            </div>
                            <div class="form-group">
                                <label for="EXPIRED_DATE">Expired Date</label>
                                <select id="EXPIRED_DATE" class="form-control" disabled>
                                    @php $date1MonthLater = date(' d-m-Y', strtotime("+1 months", strtotime("NOW") )) @endphp <option value="{{$date1MonthLater}}">{{$date1MonthLater}}</option>
                                </select>
                                <input type="hidden" name="EXPIRED_DATE" value="{{$date1MonthLater}}" />
                            </div>
                            <div class="form-group">
                                <label for="MSTEMPLATE_GUID">Template</label>
                                <select name="MSTEMPLATE_GUID" id="MSTEMPLATE_GUID" class="form-control">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="u-flex u-flexJustifyContentEnd">
            <a href="{{route('showCreateCouple', ['step'=>2])}}"><button type="button" class="btn btn-inverse">Save</button></a>
            <!-- <button type="submit" class="btn btn-inverse">Save</button> -->
        </div>
    </form>

</div>
<!--end .section-body -->
@endsection