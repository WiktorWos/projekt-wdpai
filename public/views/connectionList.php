<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
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
                <button>Book</button>
            </div>
        <?php endforeach; ?>
    </div>
</body>
