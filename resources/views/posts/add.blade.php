@extends('layouts.master')

@section('content')

<div class="main">
	<div class="main-content">
		<!-- @if(session('sukses'))
		<div class="alert alert-success" role="alert">
			{{session('sukses')}}
		</div>
		@endif -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-8">
								<form action="{{route('post.create')}}" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-group{{$errors->has('fnama') ? ' has-error' : ''}}">
										<label for="exampleInputEmail1">Title</label>
										<input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" value="{{old('title')}}" required>
										@if($errors->has('title'))
											<span class="help-block">{{$errors->first('title')}}</span>
										@endif
									</div>
										<label for="exampleInputEmail1">Content</label>
										<textarea name="content" class="form-control" id="content" rows="3">{{old('content')}}</textarea>
									<div class="form-group">
										
									</div>
								</div>

								<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-btn">
												<a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
													<i class="fa fa-picture-o"></i> Choose
												</a>
											</span>
											<input name="thumbnail" id="image" class="form-control" type="text" readonly>
										</div>
											<img id="holder" style="margin-top:15px;max-height:100px;">
											<div class="form-group">
												<span class="help-block">Diperhatikan maksimum size 2mb</span>
												<input type="submit" class="btn btn-primary" value="Submit">
											</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop


@section('footer')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#content' ) )
		.catch( error => {
			console.error( error );
		});
		$(document).ready(function(){
		 $('#lfm').filemanager('image');
	});	
</script>

@stop