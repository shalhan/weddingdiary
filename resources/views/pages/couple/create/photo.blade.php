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
    <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Step photo <small>Handy when you need to create a new page</small></h3>
</div>
<div class="section-body">
    <a href="{{route('showCreateCouple', ['step'=>4])}}"><button type="button" class="btn btn-inverse">Save</button></a> <!-- temporary -->

</div><!--end .section-body -->
@endsection