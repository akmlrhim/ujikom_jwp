<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Student
{
	protected static $path = 'data/student.json';

	public static function all()
	{
		$json = Storage::get(self::$path);
		return json_decode($json, true) ?? [];
	}

	public static function find($id)
	{
		return collect(self::all())->firstWhere('id', $id);
	}

	public static function store(array $data)
	{
		$students = self::all();
		$data['id'] = uniqid();
		$students[] = $data;
		self::saveAll($students);

		return $data;
	}

	public static function update($id, array $data)
	{
		$students = self::all();
		foreach ($students as &$student) {
			if ($student['id'] == $id) {
				$student = array_merge($student, $data);
				break;
			}
		}
		unset($student);

		self::saveAll($students);
	}

	public static function delete($id)
	{
		$students = array_filter(self::all(), fn($student) => $student['id'] != $id);
		self::saveAll(array_values($students));
	}

	public static function saveAll(array $students)
	{
		Storage::put(self::$path, json_encode($students, JSON_PRETTY_PRINT));
	}

	public static function count()
	{
		return count(self::all());
	}
}
