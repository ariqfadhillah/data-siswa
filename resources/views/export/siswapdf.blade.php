<table autosize="1" class="table">
	<thead>
		<tr>
			<th width="30%">NAMA LENGKAP</th>
			<th width="30%">JENIS KELAMIN</th>
			<th width="30%">AGAMA</th>
			<th width="30%">RATA-RATA NILAI</th>
		</tr>
	</thead>
	<tbody>
		@foreach($siswa as $s)
		<tr>
			<td width="30%" align="left">{{$s->nmlengkap()}}</td>
			<td align="center">{{$s->jkelamin}}</td>
			<td width="30%" align="center">{{$s->agama}}</td>
			<td width="30%" align="center">{{$s->nilaiRataRata()}}</td>
		</tr>
		@endforeach
	</tbody>
</table>