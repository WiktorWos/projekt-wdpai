<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>CONNECTIONS</title>
    <script type="text/javascript" src="/public/js/backToProfile.js" defer></script>
</head>

<body>
    <header class="appTitle">
        <h1>CONNECTIONS</h1>
    </header>
    <div class="connections">
        <div class="connection">
            <header>
                <h1> Available Connections </h1>
            </header>
            <button id="backToProfileBtn">Back to profile</button>
        </div>

        <?php foreach ($connections as $connection): ?>
            <div class="connection">
                <div class="connectionInfoGroup">
                    <div>From: <?= $connection->getFrom(); ?></div>
                    <div>To: <?= $connection->getTo(); ?></div>
                </div>
                <div class="connectionInfoGroup">
                    <div>Price: <?= $connection->getPrice(); ?>PLN</div>
                    <div>Time: <?= $connection->getTime(); ?>min</div>
                </div>
                <div class="connectionInfoGroup">
                    <div><?= $connection->getSchedule()->getDayOfWeek(); ?></div>
                    <div><?= $connection->getSchedule()->getDepartureTime(); ?></div>
                </div>
                <div class="connectionInfoGroup">
                    <form action="bookTicket" method="post">
                        <input type="hidden" name="id" value="<?=$connection->getId();?>">
                        <input type="hidden" name="fromCity" value="<?=$connection->getFrom();?>">
                        <input type="hidden" name="price" value="<?=$connection->getPrice();?>">
                        <input type="hidden" name="time" value="<?=$connection->getTime();?>">
                        <input type="hidden" name="toCity" value="<?=$connection->getTo();?>">
                        <input type="hidden" name="day" value="<?=$connection->getSchedule()->getDayOfWeek();?>">
                        <input type="hidden" name="departure" value="<?=$connection->getSchedule()->getDepartureTime();?>">
                        <button class="bookTicketBtn" type="submit">Book</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
