<?php

namespace App\Http\Controllers;

use App\Models\KategoriPenghasilan;
use Illuminate\Http\Request;

class KategoriPenghasilanController extends Controller
{
	// Menampilkan seluruh data kategori penghasilan
	public function index()
	{
		$data['title'] = 'Data Kategori Penghasilan';
		$data['kategori_penghasilan'] = KategoriPenghasilan::all();

		return view('kategori_penghasilan.index', $data);
	}

	// Menampilkan form untuk menambahkan kategori penghasilan baru
	public function create()
	{
		$data['title'] = 'Tambah Kategori Penghasilan';

		return view('kategori_penghasilan.create', $data);
	}

	// Menyimpan data kategori penghasilan baru ke penyimpanan data
	public function store(Request $request)
	{
		$request->validate([
			'nama_kategori' => 'required',
			'batas_minimal' => 'required|numeric',
			'batas_maksimal' => 'required|numeric'
		]);

		$data = [
			'id' => uniqid(),
			'nama_kategori' => $request->nama_kategori,
			'batas_minimal' => $request->batas_minimal,
			'batas_maksimal' => $request->batas_maksimal
		];

		KategoriPenghasilan::store($data);
		return redirect()->route('kategori_penghasilan.index')->with('sukses', 'Kategori Penghasilan berhasil ditambahkan !');
	}

	// Menampilkan form edit berdasarkan ID kategori penghasilan
	public function edit($id)
	{
		$data['title'] = 'Edit Kategori Penghasilan';
		$data['kategori_penghasilan'] = KategoriPenghasilan::find($id);

		return view('kategori_penghasilan.edit', $data);
	}

	// Memperbarui data kategori penghasilan berdasarkan ID
	public function update($id, Request $request)
	{
		$request->validate([
			'nama_kategori' => 'required',
			'batas_minimal' => 'required|numeric',
			'batas_maksimal' => 'required|numeric'
		]);

		$data = [
			'nama_kategori' => $request->nama_kategori,
			'batas_minimal' => $request->batas_minimal,
			'batas_maksimal' => $request->batas_maksimal
		];

		KategoriPenghasilan::update($id, $data);
		return redirect()->route('kategori_penghasilan.index')->with('sukses', 'Kategori Penghasilan berhasil diubah !');
	}

	// Menghapus data kategori penghasilan berdasarkan ID
	public function destroy($id)
	{
		KategoriPenghasilan::delete($id);
		return redirect()->back()->with('sukses', 'Data kategori penghasilan berhasil dihapus !');
	}
}
