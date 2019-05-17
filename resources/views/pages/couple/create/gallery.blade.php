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
				<td id="status{%= i %}">
					<p class="size">Processing...</p>
					<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div id="progress{%= i %}"  class="progress-bar progress-bar-success" style="width:0%;"></div></div>
				</td>
				<td>
					{% if (!i && !o.options.autoUpload) { %}
					<button id="startbtn{%= i %}" type="button" class="btn btn-primary" onclick="uploadFile({%= i %})">
						<i class="glyphicon glyphicon-upload"></i>
						<span>Start</span>
					</button>
					{% } %}
					{% if (!i) { %}
					<button id="deletebtn{%= i %}" class="btn btn-warning cancel hide">
						<i class="glyphicon glyphicon-ban-circle"></i>
						<span>Delete</span>
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
<script>
	var files = null
	function uploadFile(index) {
		var reader  = new FileReader();
		var startBtn = $("#startbtn"+index)
		var progressBar = $("#progress"+index)
		var deletebtn = $("#deletebtn"+index)
		var startBtnText = $("#startbtn"+index + " span")
		startBtn.addClass("disabled")
		startBtnText.text("Uploading...")
		progressBar.css("width", "100%")
		reader.addEventListener("load", function () {
			const formData = new FormData();
			formData.append('imageBase64', reader.result)
			formData.append('coupleId', $('meta[name="_coupleId"]').attr('content'))
			formData.append('type', "GALLERY")

			fetch("/api/upload-image", {
				method: 'POST',
				headers: {
					'X-CSRF-Token': $('meta[name="_token"]').attr('content')
				},
				body: formData
			})
			.then( (response) =>{
				return response.json()
			})
			.then( (data) => {
				if(data.status == 200) {
					setTimeout(()=> {
						startBtn.addClass("hide")
						startBtnText.text("Start")
						progressBar.css("width", "0")
						deletebtn.removeClass("hide")
						$("#status"+index + " div").remove()
						var attrSuccess = "<p class='text-white'><span class='text-highlight-info'>Success</span></p>"
						$("#status"+index).append(attrSuccess)
					}, 1500)
				}
				console.log(data)
			})
			.catch(e => {
				startBtnText.text("Start")
				progressBar.css("width", "0")
				console.log(e)
			})
		}, false);

		if (files[index]) {
			reader.readAsDataURL(files[index]);
		}
	}
	$("#uploader").change(()=> {
		files = $("#uploader")[0].files
	})

</script>
<!-- END FILE UPLOAD TEMPLATES -->
@endpush

@section("content")
<meta name="_token" content="{{ csrf_token() }}">
<meta name="_coupleId" content="{{ $coupleId }}">
<ol class="breadcrumb">
	<li><a href="../../html/.html">home</a></li>
	<li class="active">Dashboard</li>
</ol>

<div class="section-header">
	<h3 class="text-standard">Step Gallery</h3>
</div>

<div class="section-body">

	<form id="fileupload" action="{{route('upload', ['type'=>'GALLERY'] )}}" method="POST" enctype="multipart/form-data">
		@csrf
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
						<input id="uploader" type="file" name="images[]" multiple>
					</span>
					<button type="button" class="btn btn-primary btn-rounded start" onclick="alert('Upload all will be here soon')">
						<i class="glyphicon glyphicon-upload"></i>
						<span>Start upload</span>
					</button>
				</div>
				<div class="u-marginTop24">
					<table role="presentation" class="table table-striped">
						<tbody class="files">
						</tbody>
						<tbody>
							@foreach($data["data"] as $gallery)
								<tr class="template-upload">
									<td>
										<span class="preview"><img style="width: 60px; height: 80px" src="{{$gallery->GALLERY_PHOTO}}"></span>
									</td>
									<td>
										<p class="name">{{$gallery->fileName}}</p>
									</td>
									<td id="status{{$gallery->GUID}}">
										<p class="size">File size undefined...</p>
										<p class='text-white'>
											<span class='text-highlight-info'>Saved</span>
										</p>
									</td>
									<td>
									<button id="deletebtn{{$gallery->GUID}}" type="button" class="btn btn-warning cancel" onclick="alert('Delete will be here soon')">
											<i class="glyphicon glyphicon-ban-circle"></i>
											<span>Delete</span>
										</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="u-flex u-flexJustifyContentEnd">
			<a href="{{route('showCouples')}}"><button type="button" class="btn btn-inverse">Publish</button></a> <!-- temporary -->
		</div>
	</form>

</div>
@endsection