<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Redis;

class StudentController extends Controller
{
	public function index()
	{
		$data = [
			'title' => 'Student Data',
			'student' => Student::all()
		];
		// var_dump($data);
		return view('student.index', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Add Student'
		];

		return view('student.create', $data);
	}

	public function store(Request $request)
	{
		$validate =	$request->validate([
			'name' => 'required|string|max:100',
			'nim' => 'required|string|max:30',
			'email' => 'required|email|max:70',
			'gender' => 'required|in:Male,Female',
			'study_program' => 'required'
		]);

		$student = Student::all();
		$nameExist = collect($student)->contains('name', $validate['name']);
		$nimExist = collect($student)->contains('nim', $validate['nim']);
		$emailExist = collect($student)->contains('email', $validate['email']);

		if ($nimExist) {
			return back()->withErrors(['nim' => 'NIM already registered.'])->withInput();
		}

		if ($nameExist) {
			return back()->withErrors(['name' => 'Name already registered.'])->withInput();
		}
		if ($emailExist) {
			return back()->withErrors(['email' => 'Email already registered.'])->withInput();
		}


		Student::store($validate);
		return redirect()->route('student.index')->with('success', 'Student successfully added !');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Edit Student',
			'student' => Student::find($id)
		];

		return view('student.edit', $data);
	}

	public function update(Request $request, $id)
	{
		$validate =	$request->validate([
			'name' => 'required|string|max:100',
			'nim' => 'required|string|max:30',
			'email' => 'required|email|max:70',
			'gender' => 'required|in:Male,Female',
			'study_program' => 'required'
		]);

		Student::update($id, $validate);
		return redirect()->route('student.index')->with('success', 'Student successfully edited !');
	}

	public function destroy($id)
	{
		Student::destroy($id);
		return redirect()->back()->with('success', 'Deleted student successfully !');
	}
}
