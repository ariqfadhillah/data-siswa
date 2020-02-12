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
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Ranking Siswa</h3>
						</div>
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>NAMA</th>
										<th>RANKING</th>
										<th>NILAI</th>
									</tr>
								</thead>
								<tbody>
									@php
									$rank = 1;
									@endphp
									@foreach(ranking3Besar() as $s)
									<tr>
										<td><a href="/siswa/{{$s->id}}/profile">{{$s->nmlengkap()}}</a></td>
										<td>{{$rank}}</td>
										<td>{{$s->nilaiRataRata()}}</td>
									</tr>
									@php
									$rank++;
									@endphp
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-download"></i></span>
						<p>
							<span class="number">{{totalGuru()}}</span>
							<span class="title">Guru</span>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-shopping-bag"></i></span>
						<p>
							<span class="number">{{totalSiswa()}}</span>
							<span class="title">Siswa</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop