@extends('layouts.master')

@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@stop

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
						<div class="panel-heading">
							<h3 class="panel-title">Posts</h3>
							<div class="right">
								<a href="{{route('post.add')}}" class="btn btn-sm btn-primary">Add new posts</a>
							</div>
							
						</div>
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>TITLE</th>
										<th>USER</th>
										<th>ACTION</th>
										<th> </th>
									</tr>
								</thead>
								<tbody>@foreach($posts as $post)
									<tr>
										<td>{{$post->id}}</td>
										<td>{{$post->title}}</td>
										<td>{{$post->user->name}}</td>
          
											<td><a target="_blank" href="{{route('site.single.post',$post->slug)}}" class="btn btn-info btn-sm">View</a>
											<a href="/posts/{{$post->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
											<a href="#" class="btn btn-danger btn-sm delete" post-id ="{{$post->id}}">Delete</a></td>
									</tr>@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('footer')

<script>
	$('.delete').click(function(){
		var post_id = $(this).attr('post-id');
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {

			if (willDelete) {
				window.location = "/posts/"+post_id+"/delete";
				swal("Poof! Your imaginary file has been deleted!", {
					icon: "success",
				});
			} else {
				swal("Your imaginary file is safe!");
			}
		});
	});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
		@if(Session::has('sukses')){
			toastr.success('{{Session::get('sukses')}}', 'Alhamdulillah')
		}
		@endif

		@if(Session::has('error')){
			toastr.error('{{Session::get('error')}}', 'Afwan')
		}
		@endif
	</script>
@stop