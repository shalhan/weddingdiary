@extends("layouts.main")

@push('style')
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/toastr/toastr.css" />
@endpush

@push('script')
<script src="/assets/js/libs/toastr/toastr.min.js"></script>
@if(session('success'))
    <script>
        toastr.success("<?php echo session('success'); ?>")
    </script>
@endif
@endpush

@section("content")
@php
$nextPage = $couples['data']['nextPage'];
$prevPage = $couples['data']['prevPage'];
$couples = $couples['data']['pagination'];
@endphp




<ol class="breadcrumb">
    <li class="active">Couple</li>
</ol>

<div class="section-header u-md-flex u-md-flexJustifyContentSpaceBetween u-md-flexAlignItemsCenter u-marginTop18 u-marginBottom9">
    <h3 class="text-standard u-margin0">List of Couples</h3>
    <a href="{{route('showCreateCouple', ['step' => 1])}}">
        <button type="button" class="btn btn-inverse u-marginTop16 u-md-marginTop0">Create New Couple</button>
    </a>
</div>

<div class="section-body">
    <div class="row">
        @if(count($couples) > 0)
        @foreach($couples as $couple)
        <div class="col-md-3">
            <div class="box">
                <a href="{{ route('showCouple', $couple->GUID) }}">
                    <div class="coupleCard-imageWrapper">
                        <div class="coupleCard-image" style="background-image: url('{{ $couple->coverImages[0] }}')"></div>
                        <div class="coupleCard-actionWrapper">
                            <a href="{{ route('showEditCouple', $couple->GUID) }}"><button type="button" class="btn btn-xs btn-inverse btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></button></a>
                            <a href="{{ route('showCouple', $couple->GUID) }}"><button type="button" class="btn btn-xs btn-success btn-equal" data-placement="top" data-original-title="Report"><i class="fa fa-file"></i></button></a>
                        </div>
                    </div>
                </a>
                <div class="u-padding24">
                    <a href="{{ route('showCouple', $couple->GUID) }}">
                        <h2 class="coupleCard-title">{{$couple->groom->GROOM_NAME}} & {{$couple->bride->BRIDE_NAME}}</h2>
                    </a>
                    <p class="coupleCard-template">Created at : {{$couple->createdDateForHumans}}</p>
                    <p class="coupleCard-template">{{$couple->template->code_name}}</p>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p>Couples still empty</p>
        @endif
    </div>

    <div class="u-flex u-flexJustifyContentEnd u-marginTop24">
        @component('components.btnPagination')
        @slot('redirectPrev')
            {{ route('showCouples', ['page' => $prevPage] ) }}
        @endslot
        @slot('redirectNext')
            {{ route('showCouples', ['page' => $nextPage] ) }}
        @endslot
        @slot('prevPage')
            {{$prevPage}}
        @endslot
        @slot('nextPage')
            {{$nextPage}}
        @endslot
        @slot('data')
            {{$couples}}
        @endslot
        @endcomponent
    </div>

</div>
@endsection