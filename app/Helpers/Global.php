<?php
use App\Siswa;
use App\Guru;

function ranking3Besar()
{
    $siswa = Siswa::all();
	$siswa->map(function($satusiswa){
		$satusiswa->nilaiRataRata = $satusiswa->nilaiRataRata();
		return $satusiswa;
	});
	$siswa = $siswa->sortByDesc('nilaiRataRata')->take(3);
    	return $siswa;
}

function totalGuru()
{
	return Guru::count();
}

function totalSiswa()
{
	return Siswa::count();
}