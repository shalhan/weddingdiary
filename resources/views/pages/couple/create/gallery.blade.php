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
				{% var uploadedKey = getKey(o.files, file, i); %}
				<td>
					<span class="preview"></span>
				</td>
				<td>
					<p class="name">{%=file.name%}</p>
					<strong class="error text-danger"></strong>
				</td>
				<td id="status{%= uploadedKey %}">
					<p class="size">Processing...</p>
					<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div id="progress{%= uploadedKey %}"  class="progress-bar progress-bar-success" style="width:0%;"></div></div>
				</td>
				<td>
					{% if (!i && !o.options.autoUpload) { %}
					<button id="startbtn{%= uploadedKey %}" type="button" class="btn btn-primary" onclick="uploadFile({%= uploadedKey %})">
						<i class="glyphicon glyphicon-upload"></i>
						<span>Start</span>
					</button>
					{% } %}
					{% if (!i) { %}
					<button id="deletebtn{%= uploadedKey %}" class="btn btn-warning cancel hide" disabled>
						<i class="glyphicon glyphicon-ban-circle"></i>
						<span>Refresh before delete</span>
					</button>
					{% } %}
				</td>
			</tr>
			{%  } %}
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
				<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %} disabled>
					<i class="glyphicon glyphicon-trash"></i>
					<span>Refresh if you want to delete this</span>
				</button>
				<input type="checkbox" name="delete" value="1" class="toggle">
				{% } else { %}
				<button class="btn btn-warning cancel" disabled>
					<i class="glyphicon glyphicon-ban-circle"></i>
					<span>Refresh if you want to delete this</span>
				</button>
				{% } %}
			</td>
		</tr>
	{% } %}
</script>
<script>
	var files = null
	var isChanged = false
	var inx = 0
	var startBtn =  null
	var progressBar =  null
	var deletebtn = null
	var startBtnText = null

	var getKey = function(arr, obj, i) {
		if(!isChanged)  {
			isChanged = true
			return i
		}else {	
			return inx+=1
		}	
	}
	var uploadAllFiles = async function() {
		let len = files.length
		let i = 0
		for(let ind in files) {
			disabledBtn(ind)
		}
		for(let obj of files) {
			await uploadFile(i)
			i++
		}
		location.reload()
	}
	var disabledBtn = function(index) {
		defineComponent(index)
		startBtn.addClass("disabled")
		uploadAllBtn.addClass("disabled")
		startBtnText.text("Uploading...")
		progressBar.css("width", "100%")
	}
	var defineComponent = function(index) {
		uploadAllBtn = $("#uploadAllFilesBtn")
		startBtn = $("#startbtn"+index)
		progressBar = $("#progress"+index)
		deletebtn = $("#deletebtn"+index)
		startBtnText = $("#startbtn"+index + " span")
	}
	var uploadFile = function(index) {
		return new Promise( (resolve,reject) => {
			var reader = new FileReader()
			disabledBtn(index)
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
							resolve("SUCCESS")
						}, 1500)
					}
					console.log(data)
				})
				.catch(e => {
					startBtnText.text("Start")
					progressBar.css("width", "0")
					$("#status"+index + " div").remove()
					var attrSuccess = "<p class='text-white'><span class='text-highlight-danger'>Failed, please try again</span></p>"
					$("#status"+index).append(attrSuccess)
					reject("FAILED")
				})
			}, false);

			if(files[index]) {
				reader.readAsDataURL(files[index]);
			}
		})
	}
	$("#uploader").change(()=> {
		files = $("#uploader")[0].files
		$("#uploadAllFilesBtn").removeClass("disabled")
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
	<h3 class="text-standard">Gallery</h3>
</div>

<div class="section-body">

	<div class="u-flex u-flexJustifyContentEnd" style="margin-bottom: 15px;">
		<a href="{{route('showEditCouple', ['id'=>$coupleId, 'step'=>3]) }}"><button type="button" class="btn btn-default" style="margin-bottom: 15px;">Prev</button></a>
		<a href="{{route('showEditCouple', ['id'=>$coupleId, 'step'=>5])}}"><button type="button" class="btn btn-inverse">Next</button></a> <!-- temporary -->
	</div>
	<div id="fileupload">
		@csrf
		<div class="box">

			<div class="box-head">
				<header>
					<h4 class="text-light">Upload Gallery</strong></h4>
				</header>
			</div>

			<div class="box-body">
				<div class="btn-group">
					<span class="btn btn-success btn-rounded fileinput-button">
						<i class="glyphicon glyphicon-plus"></i>
						<span>Add files...</span>
						<input id="uploader" type="file" name="images[]" multiple>
					</span>
					<button id="uploadAllFilesBtn" type="button" class="btn btn-primary btn-rounded start disabled" onclick="uploadAllFiles()">
						<i class="glyphicon glyphicon-upload"></i>
						<span>Start upload</span>
					</button>
				</div>
				@if(isset($data["data"]))
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
										<p class='text-white'>
											<span class='text-highlight-info'>Saved</span>
										</p>
									</td>
									<td>
									<button id="deletebtn{{$gallery->GUID}}" type="button" class="btn btn-warning cancel" data-toggle="modal" data-target="#dialog{{$gallery->GUID}}">
											<i class="glyphicon glyphicon-ban-circle"></i>
											<span>Delete</span>
										</button>
									</td>
								</tr>
								@component('components.dialog')
								@slot('id')
									{{$gallery->GUID}}
								@endslot
								@slot('action')
									/api/upload-image/{{$gallery->GUID}}
								@endslot
								@slot('title')
									Alert!
								@endslot
									Are you sure want to delete this gallery photo?
								@endcomponent
							@endforeach
						</tbody>
					</table>
				</div>
				@endif
			</div>
		</div>
	</div>

</div>
@endsection