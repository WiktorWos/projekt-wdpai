<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script type="text/javascript" src="/public/js/populateTickets.js" defer></script>
    <title>LOGIN PAGE</title>
</head>

<body>
    
    <header class="appTitle">
        <h1>CONNECTIONS</h1>
    </header>

    <div class="userInfo">

        <div class="userDetails">
            <span class="material-icons" id="profileIcon"> account_circle </span>
            <label>John</label>
            <hr>
            <label>Doe</label>
            <hr>
            <label>johndoe@mail.com</label>
            <hr>
            <div class="addTicket">
                <button class="addTicketButton" id="buttonAdd">Add new ticket</button>
            </div>
        </div>

    
        <div class="addTicket hide">
            <button class="addTicketButton" id="buttonAdd">Add new ticket</button>
        </div>
    
        <div class="myTickets">
            <label class="title">My tickets</label>
            <hr>
            <div class="tickets">
                <div class="ticket">
                    <div class="ticketIconDiv">
                        <span class="material-icons" id="ticketIcon">
                                confirmation_number
                        </span>
                    </div>
                    <div class="ticketDetails">
                        <label>From: Warszawa</label>
                        <hr>
                        <label>To: Kraków</label>
                        <hr>
                        <label>10.01.2021 11:30</label>
                        <hr>
                        <label>Type: STUDENT</label>
                        <hr>
                    </div>
                </div>
    
                <div class="ticket">
                    <div class="ticketIconDiv">
                        <span class="material-icons" id="ticketIcon">
                                    confirmation_number
                        </span>
                    </div>
                    <div class="ticketDetails">
                        <label>From: Warszawa</label>
                        <hr>
                        <label>To: Kraków</label>
                        <hr>
                        <label>10.01.2021 11:30</label>
                        <hr>
                        <label>Type: STUDENT</label>
                        <hr>
                    </div>
                </div>

                <!-- <div class="ticket">
                    <div class="ticketIconDiv">
                        <span class="material-icons" id="ticketIcon">
                                    confirmation_number
                        </span>
                    </div>
                    <div class="ticketDetails">
                        <label>From: Warszawa</label>
                        <hr>
                        <label>To: Kraków</label>
                        <hr>
                        <label>10.01.2021 11:30</label>
                        <hr>
                        <label>Type: STUDENT</label>
                        <hr>
                    </div>
                </div> -->

                <!-- <div class="ticket">
                    <div class="ticketIconDiv">
                        <span class="material-icons" id="ticketIcon">
                                    confirmation_number
                        </span>
                    </div>
                    <div class="ticketDetails">
                        <label>From: Warszawa</label>
                        <hr>
                        <label>To: Kraków</label>
                        <hr>
                        <label>10.01.2021 11:30</label>
                        <hr>
                        <label>Type: STUDENT</label>
                        <hr>
                    </div>
                </div>
            </div> -->
            
            
        </div>
    </div>
</body>