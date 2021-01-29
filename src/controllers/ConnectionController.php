<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/ConnectionRepository.php';

class ConnectionController extends AppController
{
    private $connectionRepository;

    public function __construct()
    {
        $this->connectionRepository = new ConnectionRepository();
    }

    public function addTicket() {
        return $this->render('addTicket', ['connections' => []]);
    }

    public function connectionList() {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $connections = $this->connectionRepository->getConnectionsByCities($from, $to);
        $this->render('connectionList', ['connections' => $connections]);
    }

    public function getBusStops() {
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($this->connectionRepository->getBusStops());
    }
}