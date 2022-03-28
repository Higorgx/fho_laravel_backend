<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }


    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required | max:255', 'course' => 'required', 'email' => 'required | email', 'passwd' => 'required',
        ]);
        $data = $this->studentService->create($request->all());
        return response()->json($data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | email', 'passwd' => 'required',
        ]);
        $data = $this->studentService->login($request->all());
        return response()->json($data);
    }


    public function list_all()
    {
        $students = $this->studentService->listAll();
        return response()->json($students);
    }

    public function listById($id)
    {
        $students = $this->studentService->listById($id);
        return response()->json($students);
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required', 'name' => 'required | max:255', 'course' => 'required', 'email' => 'required | email', 'passwd' => 'required',
        ]);

        $response = $this->studentService->update($request->all());
        return response()->json($response);
    }

    public function delete($id)
    {

        $this->studentService->delete($id);
        return response()->json(['msg' => 'estudante excluido com Sucesso']);
    }
}
