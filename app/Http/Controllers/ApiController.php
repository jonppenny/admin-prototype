<?php

namespace App\Http\Controllers;

use App\User;

use Exception;

use function json_encode;
use function response;

class ApiController extends Controller
{
    /**
     * Get a list of all users
     *
     * @return mixed
     */
    public function getUsers()
    {
        $users = User::all();

        return response(json_encode($users), 200)->header('Content-Type', 'application-json');
    }

    /**
     * Get list of user matching the supplied ID
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getUserByID(int $id)
    {
        $user = User::find($id);

        return response(json_encode($user), 200)->header('Content-Type', 'application-json');
    }

    /**
     * Delete user matching suppl;ied ID
     *
     * @param $id
     *
     * @return mixed
     * @throws Exception
     */
    public function deleteUserByID($id)
    {
        $user = User::find($id);

        if ($user !== null) {
            $user->delete();

            $response = [
                "status"  => "success",
                "message" => "User {$id} deleted successfully"
            ];
        } else {
            $response = [
                "status"  => "fail",
                "message" => "User {$id} not found"
            ];
        }

        return response(json_encode($response), 200)->header('Content-Type', 'application/json');
    }
}
