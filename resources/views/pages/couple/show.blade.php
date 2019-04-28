@extends("layouts.main")

@push('style')
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1403937875" />
@endpush

@push('script')
<script src="/assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#COUPLE_DETAIL_TABLE').DataTable({
            "bSort": false,
            "bFilter": false,
        });
    });
</script>
@endpush

@section("content")

@php
    $couple = $couple['data'];
    $messages = $messages['data'];
@endphp

<ol class="breadcrumb">
    <li><a href="{{route('showCouples')}}">couples</a></li>
    <li class="active">{{$couple->groom->GROOM_NAME}} & {{$couple->bride->BRIDE_NAME}}</li>
</ol>

<div class="section-header u-marginTop18 u-flex u-flexJustifyContentSpaceBetween u-flexAlignItemsCenter">
    <h3 class="text-standard u-margin0">{{$couple->groom->GROOM_NAME}} & {{$couple->bride->BRIDE_NAME}}</h3>
    <div>
        <a href="/">
            <button class="btn btn-inverse">Edit</button>
        </a>
        <button class="btn btn-danger" data-toggle="modal" data-target="#dialog">Delete</button>
        @component('components.dialog')
            @slot('action')
            /couples/1
            @endslot
            @slot('title')
            Modal Delete
            @endslot
        Are you sure want to delete this couple?
        @endcomponent
    </div>
</div>

<div class="section-body">

    <div class="row">

        <div class="col-sm-4">
            <div class="box style-primary">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Total Visitor</h4>
                    </header>
                </div>
                <div class="box-body u-flex u-flexJustifyContentEnd">
                    <h1 class="text-boldest">{{$couple->totalVisitors()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box style-warning">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Total Link Clicked</h4>
                    </header>
                </div>
                <div class="box-body u-flex u-flexJustifyContentEnd">
                    <h1 class="text-boldest">{{$couple->totalVendorMenuVisits()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box style-success">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Total Comments</h4>
                    </header>
                </div>
                <div class="box-body u-flex u-flexJustifyContentEnd">
                    <h1 class="text-boldest">{{$couple->totalMessages()}}</h1>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">List of Comments</h4>
                    </header>
                </div>
                <div class="box-body table-responsive">
                    <table id="COUPLE_DETAIL_TABLE" class="table table-hover">
                        <thead>
                            <tr>
                                <th>From</th>
                                <th>Message</th>
                                <th>Data</th>
                                <th>Time</th>
                                <th class="text-right1" style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                            <tr>
                                <td>{{$message->NAME}}</td>
                                <td>{{$message->TEXT}}</td>
                                <td>{{dateFormat($message->DATE)}}</td>
                                <td>{{timeFormat($message->TIME)}}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#dialog{{$message->GUID}}" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            @component('components.dialog')
                                @slot('id')
                                    dialog{{$message->GUID}}
                                @endslot
                                @slot('action')
                                    /messages/{{$message->GUID}}
                                @endslot
                                @slot('title')
                                Modal Delete
                                @endslot
                                Are you sure want to delete this message?
                            @endcomponent
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection