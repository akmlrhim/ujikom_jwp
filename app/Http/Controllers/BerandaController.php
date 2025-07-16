<?php

namespace App\Http\Controllers;

use App\Models\KategoriPenghasilan;
use App\Models\Penghasilan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
	public function index()
	{
		$penghasilan = Penghasilan::all();

		$data['title'] = 'Beranda'; // data untuk judul halaman
		$data['jumlah_data_penghasilan'] = Penghasilan::count(); // menghitung jumlah data penghasilan
		$data['rata_rata_penghasilan'] = Penghasilan::average(); // menghitung rata-rata penghasilan
		$data['jumlah_kategori_penghasilan'] = KategoriPenghasilan::count(); // menghitung jumlah kategori penghasilan
		$data['chart_labels'] = array_column($penghasilan, 'nama_lengkap'); // mengambil nama lengkap untuk grafik chart
		$data['chart_data'] = array_column($penghasilan, 'penghasilan_bulanan'); // mengambil penghasilan bulanan untuk grafik chart

		return view('beranda', $data);
	}
}
