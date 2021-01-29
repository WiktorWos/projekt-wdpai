<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/TicketRepository.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once __DIR__ .'/../models/Ticket.php';

class ProfileController extends AppController
{
    private $ticketRepository;
    private $userRepository;

    public function __construct()
    {
        $this->ticketRepository = new TicketRepository();
        $this->userRepository = new UserRepository();
    }

    public function bookTicket() {
        $id = $_POST['id'];
        $from = $_POST['fromCity'];
        $to = $_POST['toCity'];
        $day = $_POST['day'];
        $departure = $_POST['departure'];
        $price = $_POST['price'];
        $time = $_POST['time'];
        $schedule = new Schedule($day, $departure);
        $connection = new ConnectionDetails($id, $from, $to, $time, $price, $schedule);
        $userId = 1;
        $ticket = new Ticket($connection, 'NORMAL', $userId);

        $this->ticketRepository->addTicket($ticket);

        $this->render('profile', ['messages' => []]);
    }

    public function getTickets() {
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($this->ticketRepository->getUsersTickets());
    }

    public function getUserDetails() {
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($this->userRepository->getLoggedUserDetails());
    }
}