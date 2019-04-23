@extends("layouts.main")

@push('style')

@endpush

@push('script')

@endpush

@section("content")
<ol class="breadcrumb">
    <li><a href="../../html/.html">home</a></li>
    <li class="active">Dashboard</li>
</ol>
<div class="section-header">
    <h3 class="text-standard">Step couple</h3>
</div>
<div class="section-body">

    <form role="form" method="POST">
        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Form Groom</strong></h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="GROOM_NAME">Groom's Name</label>
                                <input type="text" name="GROOM_NAME" id="GROOM_NAME" class="form-control" placeholder="Groom's Name">
                            </div>
                            <div class="form-group">
                                <label for="GROOM_FACEBOOK">Groom's Facebook</label>
                                <input type="text" name="GROOM_FACEBOOK" id="GROOM_FACEBOOK" class="form-control" placeholder="Groom's Facebook">
                            </div>
                            <div class="form-group">
                                <label for="GROOM_INSTAGRAM">Groom's Instagram</label>
                                <input type="text" name="GROOM_INSTAGRAM" id="GROOM_INSTAGRAM" class="form-control" placeholder="Groom's Instagram">
                            </div>
                            <div class="form-group">
                                <label for="GROOM_TWTITER">Groom's Twitter</label>
                                <input type="text" name="GROOM_TWTITER" id="GROOM_TWTITER" class="form-control" placeholder="Groom's Twitter">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Form Bride</strong></h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="BRIDE_NAME">Bride's Name</label>
                                <input type="text" name="BRIDE_NAME" id="BRIDE_NAME" class="form-control" placeholder="Bride's Name">
                            </div>
                            <div class="form-group">
                                <label for="BRIDE_FACEBOOK">Bride's Facebook</label>
                                <input type="text" name="BRIDE_FACEBOOK" id="BRIDE_FACEBOOK" class="form-control" placeholder="Bride's Facebook">
                            </div>
                            <div class="form-group">
                                <label for="BRIDE_INSTAGRAM">Bride's Instagram</label>
                                <input type="text" name="BRIDE_INSTAGRAM" id="BRIDE_INSTAGRAM" class="form-control" placeholder="Bride's Instagram">
                            </div>
                            <div class="form-group">
                                <label for="BRIDE_TWTITER">Bride's Twitter</label>
                                <input type="text" name="BRIDE_TWTITER" id="BRIDE_TWTITER" class="form-control" placeholder="Bride's Twitter">
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
                            <h4 class="text-light">Form Settings</strong></h4>
                        </header>
                    </div>
                    <div class="box-body">
                        <div class="form-vertical">
                            <div class="form-group">
                                <label for="URL">URL</label>
                                <input type="text" name="URL" id="URL" class="form-control" placeholder="URL">
                            </div>
                            <div class="form-group">
                                <label for="TOTAL_PHOTO">Total Photo</label>
                                <select name="TOTAL_PHOTO" id="TOTAL_PHOTO" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="EXP_DATE">Expired Date</label>
                                <select name="EXP_DATE" id="EXP_DATE" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="TEMPLATE">Template</label>
                                <select name="TEMPLATE" id="TEMPLATE" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
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