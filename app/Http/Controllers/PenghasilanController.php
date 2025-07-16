<?php

namespace App\Http\Controllers;

use App\Models\Penghasilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PenghasilanController extends Controller
{
	public function index(Request $request)
	{
		$penghasilan = Penghasilan::all();

		// logika pencarian berdasarkan nik dan nama lengkap
		if ($request->filled('search')) {
			$search = strtolower($request->search);

			$penghasilan = array_filter($penghasilan, function ($item) use ($search) {
				return str_contains(strtolower($item['nik']), $search) // berdasarkan nik
					|| str_contains(strtolower($item['nama_lengkap']), $search); // berdasarkan nama lengkap
			});
		}

		$data['title'] = 'Data Penghasilan'; // judul halaman
		$data['penghasilan'] = $penghasilan;

		return view('penghasilan.index', $data);
	}

	// menampilkan halaman tambah penghasilan 
	public function create()
	{
		$data['title'] = 'Tambah Penghasilan';

		return view('penghasilan.create', $data);
	}

	// melakukan request untuk menyimpan data ke penyimpanan
	public function store(Request $request)
	{
		// validasi input 
		$request->validate([
			'nama_lengkap' => 'required',
			'nik' => 'required|numeric',
			'penghasilan_bulanan' => 'numeric|required',
		]);

		$kategori = Penghasilan::kategori($request->penghasilan_bulanan);

		$data = [
			'id' => uniqid(),
			'nik' => $request->nik,
			'nama_lengkap' => $request->nama_lengkap,
			'penghasilan_bulanan' => $request->penghasilan_bulanan,
			'kategori_penghasilan' => $kategori
		];

		Penghasilan::store($data);

		return redirect()->route('penghasilan.index')->with('sukses', 'Penghasilan berhasil ditambahkan !');
	}

	//menampilkan form edit data
	public function edit($id)
	{
		$data['title'] = 'Edit Penghasilan'; // judul halaman
		$data['penghasilan'] = Penghasilan::find($id);

		return view('penghasilan.edit', $data);
	}

	//mengedit data yang berada di penyimpanan
	public function update($id, Request $request)
	{
		// validasi input 
		$request->validate([
			'nama_lengkap' => 'required',
			'nik' => 'required|numeric',
			'penghasilan_bulanan' => 'numeric|required',
		]);

		// mengambil data kategori untuk percabangan berdasarkan input penghasilan bulanan oleh user/pengguna
		$kategori = Penghasilan::kategori($request->penghasilan_bulanan);

		$data = [
			'id' => uniqid(), // id uniqid()
			'nik' => $request->nik,
			'nama_lengkap' => $request->nama_lengkap,
			'penghasilan_bulanan' => $request->penghasilan_bulanan,
			'kategori_penghasilan' => $kategori
		];

		Penghasilan::update($id, $data);

		return redirect()->route('penghasilan.index')->with('sukses', 'Penghasilan berhasil diubah !');
	}

	//menghapus salah satu data di penyimpanan berdasarkan id.
	public function destroy($id)
	{
		Penghasilan::delete($id);
		return redirect()->back()->with('sukses', 'Data penghasilan berhasil dihapus !');
	}

	//melakukan export data
	public function export()
	{
		$data = Penghasilan::all();

		$headers = ['id', 'nik', 'nama_lengkap', 'penghasilan_bulanan', 'kategori_penghasilan'];

		$output = implode(',', $headers) . "\n";

		foreach ($data as $row) {
			$line = [];
			foreach ($headers as $key) {
				$line[] = $row[$key] ?? '';
			}
			$output .= implode(',', $line) . "\n";
		}

		return Response::make($output, 200, [
			'Content-Type' => 'text/csv',
			'Content-Disposition' => 'attachment; filename="penghasilan.csv"',
		]);
	}
}
