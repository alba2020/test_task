<?php

class Controller
{
    protected $allowedTables = ['News', 'Session'];

    public function tables()
    {
        if (!isset($_POST['table'])) {
            return Response::error('table name not set');
        }

        $tableName = $_POST['table'];

        if (!in_array($tableName, $this->allowedTables)) {
            return Response::error('bad table name');
        }

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $payload = ($tableName)::where('ID', $id)->first();
        } else {
            $payload = ($tableName)::all();
        }

        return Response::ok($payload);
    }

    public function subscribe()
    {
        if (!isset($_POST['sessionId'])) {
            return Response::error('session id not set');
        }

        if (!isset($_POST['userEmail'])) {
            return Response::error('user email not set');
        }

        // проверка наличия пользователя в несуществующей таблице Users

        $sessionId = $_POST['sessionId'];
        $userEmail = $_POST['userEmail'];

        // создадим участника
        $p = Participant::Create([
            'Email' => $userEmail,
        ]);

        return Response::ok(null, 'Спасибо, вы успешно записаны!');
    }

    public function notFound()
    {
        return Response::error('action not found');
    }
}
