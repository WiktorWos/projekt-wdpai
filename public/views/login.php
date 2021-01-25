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
                <h1> Sign In </h1>
            </header>
            <section class="formSection">
                <form class="login-form" action="login" method="POST">
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input
                            name="email"
                            type="text"
                            placeholder="Email"
                            id="email"
                        />
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input
                            name="password"
                            type="password"
                            placeholder="Password"
                            id="password"
                        />
                    </div>
                    <div class="input-group"><button type="submit">Sign in</button></div>
                </form>
            </section>
        </div>
    </div>
</body>