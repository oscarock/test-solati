<?php

namespace App\Controller;

use App\Model\User;
class UserController {

    public function index() {
        $user = new User();
        $users = $user->findAll();

        header('Content-Type: application/json');
        echo json_encode($users);

    }

    public function show($id) {
        $user = new User();
        $users = $user->findById($id);

        header('Content-Type: application/json');
        echo json_encode($users);

    }

    public function create() {
        $user = new User();
        try{
            $requestData = json_decode(file_get_contents("php://input"), true);

            if ($requestData === null) {
                throw new \Exception('Error al decodificar el JSON');
            }

            $userData = [
                'name' => $requestData['name'],
                'email' => $requestData['email'],
                'phone' => $requestData['phone'],
            ];

            $newUser = $user->insert($userData);

            $response = [
                'success' => true,
                'message' => 'Usuario creado correctamente',
                'data' => $newUser
            ];

        } catch(\Exception $e) {
            $response = [
                'error' => true,
                'message' => 'Error al crear el usuario',
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function update($id) {
        $user = new User();

        try {
            $requestData = json_decode(file_get_contents("php://input"), true);

            if ($requestData === null) {
                throw new \Exception('Error al decodificar el JSON');
            }

            $userData = [
                'name' => $requestData['name'],
                'email' => $requestData['email'],
                'phone' => $requestData['phone'],
            ];

            $user->customUpdate($id, $userData);

            $response = [
                'message' => 'Usuario actualizado correctamente',
            ];
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ];
        }

        header('Content-Type: application/json');

        echo json_encode($response);
    }

    public function delete($id) {
        $user = new User();

        try {
            $user->customDelete($id);

            $response = [
                "message" => "Usuario eliminado correctamente",
            ];

        } catch (\Exception $e) {
            $response = [
                'message' => 'Error: ' . $e->getMessage(),
            ];
        }

        header('Content-Type: application/json');

        echo json_encode($response);
    }
}