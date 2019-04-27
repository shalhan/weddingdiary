@extends("layouts.main")

@push('style')
<link type="text/css" rel="stylesheet" href="/assets/css/theme-default/libs/blueimp-file-upload/jquery.fileupload.css?1401557893" />
@endpush

@push('script')
<script src="/assets/js/libs/blueimp-file-upload/vendor/jquery.ui.widget.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/vendor/tmpl.min.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/vendor/load-image.min.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/vendor/jquery.blueimp-gallery.min.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/jquery.iframe-transport.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/jquery.fileupload.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/jquery.fileupload-process.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/jquery.fileupload-image.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/jquery.fileupload-audio.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/jquery.fileupload-video.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/jquery.fileupload-validate.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/jquery.fileupload-ui.js"></script>
<script src="/assets/js/libs/blueimp-file-upload/main.js"></script>

<!-- BEGIN JAVASCRIPT -->
<!-- START FILE UPLOAD TEMPLATES -->
<script id="template-upload" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr class="template-upload fade">
				<td>
					<span class="preview"></span>
				</td>
				<td>
					<p class="name">{%=file.name%}</p>
					<strong class="error text-danger"></strong>
				</td>
				<td>
					<p class="size">Processing...</p>
					<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
				</td>
				<td>
					{% if (!i && !o.options.autoUpload) { %}
					<button class="btn btn-primary start" disabled>
						<i class="glyphicon glyphicon-upload"></i>
						<span>Start</span>
					</button>
					{% } %}
					{% if (!i) { %}
					<button class="btn btn-warning cancel">
						<i class="glyphicon glyphicon-ban-circle"></i>
						<span>Cancel</span>
					</button>
					{% } %}
				</td>
			</tr>
			{% } %}
		</script>
<script id="template-download" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr class="template-download fade">
				<td>
					<span class="preview">
						{% if (file.thumbnailUrl) { %}
						<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
						{% } %}
					</span>
				</td>
				<td>
					<p class="name">
						{% if (file.url) { %}
						<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
						{% } else { %}
						<span>{%=file.name%}</span>
						{% } %}
					</p>
					{% if (file.error) { %}
					<div><span class="label label-danger">Error</span> {%=file.error%}</div>
					{% } %}
				</td>
				<td>
					<span class="size">{%=o.formatFileSize(file.size)%}</span>
				</td>
				<td>
					{% if (file.deleteUrl) { %}
					<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
						<i class="glyphicon glyphicon-trash"></i>
						<span>Delete</span>
					</button>
					<input type="checkbox" name="delete" value="1" class="toggle">
					{% } else { %}
					<button class="btn btn-warning cancel">
						<i class="glyphicon glyphicon-ban-circle"></i>
						<span>Cancel</span>
					</button>
					{% } %}
				</td>
			</tr>
			{% } %}
		</script>
<!-- END FILE UPLOAD TEMPLATES -->
@endpush

@section("content")
<ol class="breadcrumb">
	<li><a href="../../html/.html">home</a></li>
	<li class="active">Dashboard</li>
</ol>

<div class="section-header">
	<h3 class="text-standard">Step Gallery</h3>
</div>

<div class="section-body">

	<form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
		<div class="box">

			<div class="box-head">
				<header>
					<h4 class="text-light">Form Upload Gallery</strong></h4>
				</header>
			</div>

			<div class="box-body">
				<div class="btn-group">
					<span class="btn btn-success btn-rounded fileinput-button">
						<i class="glyphicon glyphicon-plus"></i>
						<span>Add files...</span>
						<input type="file" name="files[]" multiple="">
					</span>
					<button type="submit" class="btn btn-primary btn-rounded start">
						<i class="glyphicon glyphicon-upload"></i>
						<span>Start upload</span>
					</button>
					<button type="reset" class="btn btn-warning btn-rounded cancel">
						<i class="glyphicon glyphicon-ban-circle"></i>
						<span>Cancel upload</span>
					</button>
				</div>
				<div class="u-marginTop24">
					<table role="presentation" class="table table-striped">
						<tbody class="files"></tbody>
					</table>
				</div>
			</div>
			<a href="{{route('showCouples')}}"><button type="button" class="btn btn-inverse">Publish</button></a> <!-- temporary -->


		</div>
	</form>

</div>
@endsection