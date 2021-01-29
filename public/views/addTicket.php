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
    <div class="wrapper">
        <div class="formContent">
            <header>
                <h1> Search for connection </h1>
            </header>
            <section class="formSection">
                <form action="connectionList" class="login-form" method="post">
                    <div class="input-group">
                        <label>From</label>
                        <select name="from">
                            <option value="1">Krakow</option>
                            <option value="3">Warszawa</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>To</label>
                        <select name="to">
                            <option value="1">Krakow</option>
                            <option value="3">Warszawa</option>
                        </select>
                    </div>
                    <div class="input-group"><button type="submit">Search</button></div>
                </form>
            </section>
        </div>
    </div>
</body>