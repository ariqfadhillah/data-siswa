@extends('layouts.master')

@section('content')

<div class="main">
	<div class="main-content">
		@if(session('sukses'))
		<div class="alert alert-success" role="alert">
			{{session('sukses')}}
		</div>
		@endif
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Selamat Datang Perindu Syurga <b>Batch 1</b> <br> Data Siswa</h3>
							<div class="right">
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
										<td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
										<td><a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" 
											onclick="return confirm('Yakin ini dihapus ?')">Delete</a></td>
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
								<form action="/siswa/create" method="post">
									{{csrf_field()}}
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Depan</label>
										<input name="fnama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
										<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Nama Belakang</label>
										<input name="lnama" type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Nama Belakang">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Email</label>
										<input name="email" type="email" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Email">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Jenis Kelamin</label>
										<select name="jkelamin" class="custom-select">
											<option selected>Jenis Kelamin this select menu</option>
											<option value="L">Laki - Laki</option>
											<option value="P">Perempuan</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Agama</label>
										<input name="agama" type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Agama">
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Alamat</label>
										<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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