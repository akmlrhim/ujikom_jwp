<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class KategoriPenghasilan
{
	protected static $path = 'data/kategori_penghasilan.csv';
	protected static $headers = ['id', 'nama_kategori', 'batas_minimal', 'batas_maksimal'];

	//mengambil semua data
	public static function all()
	{
		if (!Storage::exists(self::$path)) {
			return [];
		}

		$csv = array_map('str_getcsv', explode(PHP_EOL, trim(Storage::get(self::$path))));
		if (count($csv) <= 1) return [];

		$header = array_map('trim', $csv[0]);
		$rows = array_slice($csv, 1);

		return array_map(function ($row) use ($header) {
			return array_combine($header, $row);
		}, $rows);
	}

	// mengambil satu data, biasanya untuk edit
	public static function find($id)
	{
		return collect(self::all())->firstWhere('id', $id);
	}

	//menyimpan data di penyimpanan
	public static function store(array $data)
	{
		$employees = self::all();
		$employees[] = $data;
		self::saveAll($employees);

		return $data;
	}

	//memperbarui data di penyimpanan
	public static function update($id, array $data)
	{
		$employees = self::all();

		foreach ($employees as &$employee) {
			if ($employee['id'] === $id) {
				$employee = array_merge($employee, $data);
				break;
			}
		}

		unset($employee);
		self::saveAll($employees);
	}

	public static function delete($id)
	{
		$employees = array_filter(self::all(), fn($e) => $e['id'] !== $id);
		self::saveAll(array_values($employees));
	}

	//menyimpan data hasil perubahan (store/update)
	public static function saveAll(array $employees)
	{
		$lines = [implode(',', self::$headers)];

		foreach ($employees as $employee) {
			$row = [];

			foreach (self::$headers as $key) {
				$row[] = $employee[$key] ?? '';
			}

			$lines[] = implode(',', $row);
		}

		Storage::put(self::$path, implode(PHP_EOL, $lines));
	}

	//menghitung jumlah data
	public static function count()
	{
		return count(self::all());
	}
}
