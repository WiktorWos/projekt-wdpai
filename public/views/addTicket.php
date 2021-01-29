<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="/public/js/populateBusStops.js" defer></script>
    <title>LOGIN PAGE</title>
</head>

<body>
    <header class="appTitle">
        <h1>CONNECTIONS</h1>
    </header>
    <div class="wrapper">
        <div class="formContent">
            <header>
                <h1> Search for connection </h1>
            </header>
            <section class="formSection">
                <form action="connectionList" class="login-form" method="post">
                    <div class="input-group">
                        <label>From</label>
                        <select name="from" id="fromSelect"></select>
                    </div>
                    <div class="input-group">
                        <label>To</label>
                        <select name="to" id ="toSelect"></select>
                    </div>
                    <div class="input-group"><button type="submit">Search</button></div>
                </form>
            </section>
        </div>
    </div>
</body>