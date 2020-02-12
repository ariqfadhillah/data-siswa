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
						<div class="panel-heading">
							<h3 class="panel-title">Selamat Datang Perindu Syurga <b>Batch 1</b> <br> Data Siswa</h3>
							<div class="right">
								<a href="/siswa/exportExcel" class="btn btn-sm btn-primary">Export to Excel</a>
								<a href="/siswa/exportPDF" class="btn btn-sm btn-primary">Export to PDF</a>
								<button type="button" class="btn"><i class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal"></i></button>
							</div>
							
						</div>
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Nama Depan </th>
										<th>Nama Belakang </th>
										<th>Jenis Kelamin </th>
										<th>Agama</th>
										<th>Alamat</th>
										<th>RATA - RATA</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>@foreach($data_siswa as $siswa)
									<tr>
										<td><a href="/siswa/{{$siswa ->id}}/profile">{{$siswa->fnama}}</a></td>
										<td><a href="/siswa/{{$siswa ->id}}/profile">{{$siswa->lnama}}</a></td>
										<td>{{$siswa->jkelamin}}</td>
										<td>{{$siswa->agama}}</td>
										<td>{{$siswa->alamat}}</td>
										<td>{{$siswa->nilaiRataRata()}}</td>

										<td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
										<td><a href="#" class="btn btn-danger btn-sm delete" siswa-id ="{{$siswa->id}}" >Delete</a></td>
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


		<div class="row">
			<div class="col-6">
				<h1></h1>
			</div>
			<div class="col-6">
				<!-- Button trigger modal -->

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="/siswa/create" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-group{{$errors->has('fnama') ? ' has-error' : ''}}">
										<label for="exampleInputEmail1">Nama Depan</label>
										<input name="fnama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('fnama')}}">
										@if($errors->has('fnama'))
											<span class="help-block">{{$errors->first('fnama')}}</span>
										@endif
									</div>
									<div class="form-group{{$errors->has('lnama') ? ' has-error' : ''}}">
										<label for="exampleInputPassword1">Nama Belakang</label>
										<input name="lnama" type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('lnama')}}">
										@if($errors->has('lnama'))
											<span class="help-block">{{$errors->first('lnama')}}</span>
										@endif
									</div>
									<div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
										<label for="exampleInputPassword1">Email</label>
										<input name="email" type="email" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
										@if($errors->has('email'))
											<span class="help-block">{{$errors->first('email')}}</span>
										@endif
									</div>
									<div class="form-group{{$errors->has('jkelamin') ? ' has-error' : ''}}">
										<label for="exampleInputPassword1">Jenis Kelamin</label>
										<select name="jkelamin" class="custom-select">
											<option selected>Jenis Kelamin this select menu</option>
											<option value="L">Laki - Laki</option>
											<option value="P">Perempuan</option>
										</select>
										@if($errors->has('jkelamin'))
											<span class="help-block">{{$errors->first('jkelamin')}}</span>
										@endif
									</div>
									<div class="form-group{{$errors->has('agama') ? ' has-error' : ''}}">
										<label for="exampleInputPassword1">Agama</label>
										<input name="agama" type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
										@if($errors->has('agama'))
											<span class="help-block">{{$errors->first('agama')}}</span>
										@endif
									</div>
									<div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}">
										<label for="exampleFormControlTextarea1">Alamat</label>
										<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{old('alamat')}}"></textarea>
										@if($errors->has('alamat'))
											<span class="help-block">{{$errors->first('alamat')}}</span>
										@endif
									</div>
									<div class="form-group{{$errors->has('avatar') ? ' has-error' : ''}}">
										<label for="exampleFormControlTextarea1">Avatar</label>
										<input name="avatar" type="file" class="form-control">
										@if($errors->has('avatar'))
											<span class="help-block">{{$errors->first('avatar')}}</span>
										@endif
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary btn-sm">Submit</button>
								</form>
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
		var siswa_id = $(this).attr('siswa-id');
		swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {

			  if (willDelete) {
			  	window.location = "/siswa/"+siswa_id+"/delete";
			    swal("Poof! Your imaginary file has been deleted!", {
			      icon: "success",
			    });
			  } else {
			    swal("Your imaginary file is safe!");
			  }
			});
	});
</script>
@stop