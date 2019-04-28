@extends("layouts.main")

@push('style')

@endpush

@push('script')

@endpush

@section("content")
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
        <div class="col-lg-12">

            <div class="box">
                <div class="box-head">
                    <header>
                        <h4 class="text-light">Table <strong>Couples</strong></h4>
                    </header>
                </div>

                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Groom Name</th>
                                <th>Bride Name</th>
                                <th>Template</th>
                                <th class="text-right1" style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($couples['data'] as $couple)
                            <tr class="u-cursorPointer" onclick=" window.location.href = `{{ route('showCouple', $couple->GUID) }}` ">
                                <td>{{$couple->groom->GROOM_NAME}}</td>
                                <td>{{$couple->bride->BRIDE_NAME}}</td>
                                <td>{{$couple->template->code_name}}</td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-inverse btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Edit row"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#dialog" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button>
                                </td>
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