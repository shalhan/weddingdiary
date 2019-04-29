@extends("layouts.main")

@push('style')

@endpush

@push('script')

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
                        <div class="coupleCard-image" style="background-image: url('https://www.hellomagazine.com/imagenes/royalty/2018101463447/missing-people-royal-wedding-princess-eugenie-official-photos/0-299-411/princess-eugenie-st-george-t.jpg')"></div>
                        <div class="coupleCard-actionWrapper">
                            <button type="button" class="btn btn-xs btn-inverse btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Edit row"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#dialog" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </div>
                </a>
                <div class="u-padding24">
                    <a href="{{ route('showCouple', $couple->GUID) }}">
                        <h2 class="coupleCard-title">{{$couple->groom->GROOM_NAME}} & {{$couple->bride->BRIDE_NAME}}</h2>
                    </a>
                    <p class="coupleCard-template">{{$couple->template->code_name}}</p>
                </div>
            </div>
            @component('components.dialog')
            @slot('method')
                DELETE
            @endslot
            @slot('action')
                /weddings/1
            @endslot
            @slot('title')
                Alert!
            @endslot
                Are you sure want to delete this couple?
            @endcomponent
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