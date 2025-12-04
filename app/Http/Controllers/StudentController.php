<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // LIST
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    // FORM CREATE
    public function create()
    {
        return view('students.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students',
            'name' => 'required',
            'tingkat' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'photo' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    // DETAIL
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // FORM EDIT
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // UPDATE DATA
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id,
            'name' => 'required',
            'tingkat' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'photo' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
