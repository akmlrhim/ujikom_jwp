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

		$data['title'] = 'Beranda';
		$data['jumlah_data_penghasilan'] = Penghasilan::count();
		$data['rata_rata_penghasilan'] = Penghasilan::average();
		$data['jumlah_kategori_penghasilan'] = KategoriPenghasilan::count();
		$data['chart_labels'] = array_column($penghasilan, 'nama_lengkap');
		$data['chart_data'] = array_column($penghasilan, 'penghasilan_bulanan');

		return view('beranda', $data);
	}
}
