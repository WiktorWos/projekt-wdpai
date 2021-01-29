<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/ConnectionDetails.php';
require_once __DIR__ . '/../models/Schedule.php';


class ConnectionRepository extends Repository {
    private const DAYS = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    public function getConnectionsByCities(string $from, string $to) {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            select c2.id, location, bus_stop_id, price_per_km, s.day_of_week, s.departure, stops_order from connections_bus_stops
            left join connections c2 on c2.id = connections_bus_stops.connection_id
            left join schedule s on s.id = connections_bus_stops.schedule_id
            left join bus_stops bs on connections_bus_stops.bus_stop_id = bs.id
            where (bus_stop_id=:fromId or bus_stop_id=:toId) and connection_id in
            (select connections.id from connections
            left join connections_bus_stops cbs on connections.id = cbs.connection_id
            where (cbs.bus_stop_id=:fromId) and connections.id in
            (select connections.id from connections left join connections_bus_stops c on connections.id = c.connection_id
            where c.bus_stop_id=:fromId or c.bus_stop_id=:toId group by connections.id having count(connections.id) > 1))
            order by c2.id, stops_order;
        ');
        $stmt->bindParam(':fromId', $from, PDO::PARAM_STR);
        $stmt->bindParam(':toId', $to, PDO::PARAM_STR);
        $stmt->execute();
        $connectionsContainingBothStops = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $prevId = 0;
        $prevBusStopId = -1;
        $prevTimeStr = '';
        $prevTime = strtotime('now');
        $fromCity = '';
        $toCity = '';
        foreach ($connectionsContainingBothStops as $connection) {
            if($connection['id'] == $prevId) {
                $currTime = strtotime($connection['departure']);
                $timeDiff = round(abs($currTime - $prevTime) / 60,2);
                $prevTime = $currTime;
                $schedule = new Schedule(self::DAYS[$connection['day_of_week']], $prevTimeStr);
                $price = $timeDiff * $connection['price_per_km'];
                $toCity = $connection['location'];
                if($prevBusStopId == 1) {
                    $result[] = new ConnectionDetails($prevId, $fromCity, $toCity, $timeDiff, $price, $schedule);
                }
            } else {
                $prevId = $connection['id'];
                $prevTimeStr = $connection['departure'];
                $prevTime = strtotime($prevTimeStr);
                $prevBusStopId = $connection['bus_stop_id'];
                $fromCity = $connection['location'];
            }
        }
        return $result;
    }

    public function getBusStops() {
        $stmt = $this->database->connect()->prepare('
            select * from bus_stops;
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}