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
    $weddingPartners = isset($data['data']) ? $data['data'] : null
@endphp
<ol class="breadcrumb">
    <li><a href="../../html/.html">home</a></li>
    <li class="active">Dashboard</li>
</ol>
<div class="section-header">
    <h3 class="text-standard">Partner Information</h3>
</div>
<div class="section-body">
    <div class="u-flex u-flexJustifyContentEnd">
        <a href="{{ route('showEditCouple', ['id'=>$coupleId, 'step'=>4]) }}"><button type="button" class="btn btn-default" style="margin-bottom: 15px;">Prev</button></a>
        <a href="{{ route('publish') }}"><button type="button" class="btn btn-inverse" style="margin-bottom: 15px;">PUBLISH</button></a>
    </div>
    <div class="row">
            <form role="form" method="POST" action="{{route('saveWeddingPartner')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-6">
                    <div class="box">
                        <div class="box-head">
                            <header>
                                <h4 class="text-light">Partner Detail</h4>
                            </header>
                        </div>
                        <div class="box-body">
                            <div class="form-vertical">
                                <input type="hidden" name="current_url" value="{{Request::url()}}">
                                <div class="form-group">
                                    <input type="hidden" name="current_url" value="{{Request::url()}}">
                                    <input type="hidden" name="MSCOUPLE_GUID" value="{{isset($coupleId) ? $coupleId : ''}}">
                                    <label for="WEDDING_PARTNER_NAME">Name</label>
                                    @if($errors->any() && $errors->first('WEDDING_PARTNER_NAME'))
                                    <input type="text" name="WEDDING_PARTNER_NAME" id="WEDDING_PARTNER_NAME" class="form-control u-input--isError" placeholder="Name" value={{ old('WEDDING_PARTNER_NAME')}}>
                                    <small class="text-support2">* {{$errors->first('WEDDING_PARTNER_NAME')}} </small>
                                    @else
                                    <input type="text" name="WEDDING_PARTNER_NAME" id="WEDDING_PARTNER_NAME" class="form-control" placeholder="Wedding partner name" value="{{ isset($couple->groom->WEDDING_PARTNER_NAME) ? $couple->groom->WEDDING_PARTNER_NAME : old('WEDDING_PARTNER_NAME') }}">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="WEDDING_PARTNER_WEBSITE">Website</label>
                                    @if($errors->any() && $errors->first('WEDDING_PARTNER_WEBSITE'))
                                    <input type="text" name="WEDDING_PARTNER_WEBSITE" id="WEDDING_PARTNER_WEBSITE" class="form-control u-input--isError" placeholder="e.g 'https://youpartnerwebsite.com'" value="{{ old('WEDDING_PARTNER_WEBSITE')}}">
                                    <small class="text-support2">* {{$errors->first('WEDDING_PARTNER_WEBSITE')}} </small>
                                    @else
                                    <input type="text" name="WEDDING_PARTNER_WEBSITE" id="WEDDING_PARTNER_WEBSITE" class="form-control" placeholder="e.g 'https://youpartnerwebsite.com'" value="{{ isset($couple->groom->WEDDING_PARTNER_WEBSITE) ? $couple->groom->WEDDING_PARTNER_WEBSITE : old('WEDDING_PARTNER_WEBSITE') }}">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="logo">Partner Logo</label>
                                    @if($errors->any() && $errors->first('LOGO_RESOURCE'))
                                        <input type="file" class="form-control-file" name="LOGO_RESOURCE" id="LOGO_RESOURCE" accept="image/*" value="{{ old('LOGO_RESOURCE')}}">
                                        <small class="text-support2">* {{$errors->first('LOGO_RESOURCE')}} </small>
                                    @else
                                        <input type="file" class="form-control-file" name="LOGO_RESOURCE" id="LOGO_RESOURCE" accept="image/*">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary float-right" style="float:right;">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        <div class="col-md-12">
            <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">List of wedding partners</h4>
                        </header>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="visitorTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($weddingPartners)>0)
                                @foreach($weddingPartners as $partner)
                                <tr>
                                    <td>
                                        {{$partner->WEDDING_PARTNER_NAME}}
                                    </td>
                                    <td>
                                        <a href="{{$partner->WEDDING_PARTNER_WEBSITE}}" target="_blank">{{$partner->WEDDING_PARTNER_WEBSITE}}</a>
                                    </td>
                                    <td>
                                        <img src="{{$partner->WEDDING_PARTNER_LOGO}}" style="width:100px;height:100px;">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#dialog{{$partner->GUID}}" data-placement="top" data-original-title="Delete partner"><i class="fa fa-trash-o"></i></button>
                                        @component('components.dialog')
                                            @slot('id')
                                                {{$partner->GUID}}
                                            @endslot
                                            @slot('action')
                                                /wedding-partner/{{$partner->GUID}}
                                            @endslot
                                            @slot('title')
                                            Modal Delete
                                            @endslot
                                            Are you sure want to delete this wedding partner?
                                        @endcomponent
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="4">There is no partner yet</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
<!--end .section-body -->
@endsection