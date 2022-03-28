<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function create(array $data)
    {
        $data['passwd'] = password_hash($data['passwd'], PASSWORD_BCRYPT);
        $data = $this->student->create($data);

        return [
            'msg' => 'estudante criado com sucesso',
            'status' => 200,
        ];
    }
    public function login(array $data)
    {

        $bdData = student::where('email', $data['email'])->firstOrFail();

        $isAuth = password_verify($data['passwd'], $bdData['passwd']);

        if ($isAuth) {
            return [
                'auth' => true,
                'status' => 200,
            ];
        } else {
            return [
                'auth' => false,
                'status' => 401,
            ];
        }
    }

    public function listAll()
    {

        $data = $this->student->all();

        return [
            'msg' => 'Listagem efetuada com sucesso',
            'status' => 200,
            'data' => $data
        ];
    }

    public function listById($id)
    {

        $data = $this->student->find($id);

        return [
            'msg' => 'Listagem efetuada com sucesso',
            'status' => 200,
            $data
        ];
    }

    public function delete($id)
    {

        $data = $this->student->find($id);
        $data->delete();

        return [
            'msg' => 'estudante deletado',
            'status' => 200,
        ];
    }

    public function update(array $data)
    {
        $response = $data;
        $student = student::where('id', $data['id'])->first();
        $data['passwd'] = password_hash($data['passwd'], PASSWORD_BCRYPT);
        $data = $student->update($data);
        if ($student != false || $data != $student) {
            return [
                'msg' => 'estudante atualizado',
                'status' => 200,
                $response
            ];
        } else {
            return [
                'msg' => 'falha ao atualizar',
                'status' => 400,
                $data,
            ];
        }
    }
}
