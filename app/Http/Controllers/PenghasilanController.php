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
				return str_contains(strtolower($item['nik']), $search)
					|| str_contains(strtolower($item['nama_lengkap']), $search);
			});
		}

		$data['title'] = 'Data Penghasilan';
		$data['penghasilan'] = $penghasilan;

		return view('penghasilan.index', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Penghasilan';

		return view('penghasilan.create', $data);
	}

	public function store(Request $request)
	{
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

	public function edit($id)
	{
		$data['title'] = 'Edit Penghasilan';
		$data['penghasilan'] = Penghasilan::find($id);

		return view('penghasilan.edit', $data);
	}

	public function update($id, Request $request)
	{
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

		Penghasilan::update($id, $data);

		return redirect()->route('penghasilan.index')->with('sukses', 'Penghasilan berhasil diubah !');
	}

	public function destroy($id)
	{
		Penghasilan::delete($id);
		return redirect()->back()->with('sukses', 'Data penghasilan berhasil dihapus !');
	}

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
