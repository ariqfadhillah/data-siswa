@extends('layouts.master')

@section('content')
<div class="main">
	<div class="main-content">
		<h1>Edit data pribadi</b></h1>	
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
							<h3 class="panel-title">Edit data pribadi</h3>
						</div>
						<div class="panel-body">
							<form action="/siswa/{{$siswa->id}}/update" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Depan</label>
									<input name="fnama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->fnama}}">
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Nama Belakang</label>
									<input name="lnama" type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->lnama}}">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1" class="outline">Jenis Kelamin</label>
									<select name="jkelamin" class="custom-select">
										<option selected>Jenis Kelamin this select menu</option>
										<option value="L" @if($siswa->jkelamin == 'L') selected @endif>Laki - Laki</option>
										<option value="P" @if($siswa->jkelamin == 'P') selected @endif>Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Agama</label>
									<input name="agama" type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Agama"  value="{{$siswa->agama}}">
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Alamat</label>
									<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{$siswa->alamat}}</textarea>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Avatar</label>
									<input name="avatar" type="file" class="form-control">
								</div>
							</div>
								<button type="submit" class="btn btn-warning">Update</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('content1')

		
		<div class="row">
			<div class="col-lg-12">
			
		</div>
	</div>
@endsection