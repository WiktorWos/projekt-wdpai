<?php
require_once 'Repository.php';
require_once __DIR__ . '/../models/ConnectionDetails.php';
require_once __DIR__ . '/../models/Schedule.php';
require_once __DIR__ . '/../models/Ticket.php';

class TicketRepository extends Repository
{
    public function addTicket($ticket) {
        $conn = $this->database->connect();
        $stmt = $conn->prepare('
            INSERT INTO tickets (from_location, to_location, type, price, time, date, user_id)
            VALUES (?, ?, ?, ?, ?, ?, ?);
        ');

        $connectionDetails = $ticket->getConnectionDetails();
        $schedule = $connectionDetails->getSchedule();

        $conn->beginTransaction();
        $stmt->execute([
            $connectionDetails->getFrom(),
            $connectionDetails->getTo(),
            $ticket->getType(),
            $connectionDetails->getPrice(),
            $schedule->getDepartureTime(),
            $schedule->getDayOfWeek(),
            $ticket->getUserId()
        ]);
        $conn->commit();
    }

    public function getUsersTickets() {
        $userId = $_SESSION['userId'];

        $stmt = $this->database->connect()->prepare('
            select * from tickets where user_id = :id;
        ');
        $stmt->bindParam(':id', $userId, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}