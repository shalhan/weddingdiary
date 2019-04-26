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
    <h3 class="text-standard">Dashboard</h3>
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
                    <h1 class="text-boldest">1000</h1>
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
                    <h1 class="text-boldest">92</h1>
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
                    <h1 class="text-boldest">1256</h1>
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
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>From</th>
                                <th>Message</th>
                                <th class="text-right1" style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection