@extends("layouts.main")

@push('style')
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1403937875" />
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/DataTables/TableTools.css?1403937875" />
@endpush

@push('script')
<script src="/assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
<script src="/assets/js/libs/DataTables/extras/ColVis/js/ColVis.min.js"></script>
<script src="/assets/js/libs/DataTables/extras/TableTools/media/js/TableTools.min.js"></script>
<script>
$('#visitorTable').DataTable();
$('#messageTable').DataTable();
</script>
@endpush

@section("content")

@php
    $couple = $couple['data'];
    $messages = $messages['data'];
    $visitors = $visitors['data'];
@endphp

<ol class="breadcrumb">
    <li><a href="{{route('showCouples')}}">couples</a></li>
    <li class="active">{{$couple->groom->GROOM_NAME}} & {{$couple->bride->BRIDE_NAME}}</li>
</ol>

<div class="section-header u-marginTop18 u-flex u-flexJustifyContentSpaceBetween u-flexAlignItemsCenter">
    <h3 class="text-standard u-margin0">{{$couple->groom->GROOM_NAME}} & {{$couple->bride->BRIDE_NAME}}</h3>
    <div>
        <a href="{{ route('showEditCouple', ['coupleId'=> $couple->GUID]) }}">
            <button class="btn btn-inverse">Edit</button>
        </a>
        <button class="btn btn-danger" data-toggle="modal" data-target="#dialog">Delete</button>
        @component('components.dialog')
            @slot('action')
            /couples/{{$couple->GUID}}
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
        <div class="col-lg-6">
            <div class="box">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Comments</h4>
                    </header>
                </div>
                <div class="box-body table-responsive">
                    <table id="messageTable" class="table table-hover">
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
                                <td style="width: 20%;">{{$message->NAME}}</td>
                                <td style="width: 30%;">{{$message->TEXT}}</td>
                                <td>{{dateFormat($message->DATE)}}</td>
                                <td>{{timeFormat($message->TIME)}}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#dialog{{$message->GUID}}" data-placement="top" data-original-title="Delete message"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            @component('components.dialog')
                                @slot('id')
                                    {{$message->GUID}}
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
        <div class="col-lg-6">
                <div class="box">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Visitors</h4>
                        </header>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="visitorTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>IP Adress</th>
                                    <th>Browser</th>
                                    <th>OS</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visitors as $visitor)
                                <tr>
                                    <td style="width: 20%;">{{$visitor->IPPUBLIC}}</td>
                                    <td style="width: 30%;">{{$visitor->BROWSER}}</td>
                                    <td>{{$visitor->OS}}</td>
                                    <td>{{dateFormat($visitor->DATETIME)}}</td>
                                    <td>{{ timeFormat($visitor->DATETIME)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection