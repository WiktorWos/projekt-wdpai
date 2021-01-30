const ticketContainer = document.getElementById("tickets")

window.onload = function() {
    document.getElementById("buttonAdd").onclick = () => location.href = 'http://localhost:8080/addTicket';
    fetchTickets();
    fetchUserDetails();
}

function fetchTickets() {
    fetch("/getTickets", {
        method: "GET"
    }).then(function (response) {
        return response.json();
    }).then(function (tickets) {
        ticketContainer.innerHTML = "";
        loadTickets(tickets);
    });
}

function fetchUserDetails() {
    fetch("/getUserDetails", {
        method: "GET"
    }).then(function (response) {
        return response.json();
    }).then(function (details) {
        loadDetails(details);
    });
}

function loadTickets(tickets) {
    tickets.forEach(ticket => createTicket(ticket));
}

function createTicket(ticket) {
    const template = document.getElementById("ticketTemplate");

    const clone = template.content.cloneNode(true);
    const fromLabel = clone.querySelector(".fromLabel");
    const toLabel = clone.querySelector(".toLabel");
    const dateLabel = clone.querySelector(".dateLabel");
    const typeLabel = clone.querySelector(".typeLabel");

    typeLabel.innerHTML = ticket.type;
    fromLabel.innerHTML = ticket.from_location;
    toLabel.innerHTML = ticket.to_location;
    dateLabel.innerHTML = ticket.date + " " + ticket.time;

    ticketContainer.appendChild(clone);
}

function loadDetails(details) {
    const firstName = document.getElementById("name");
    const lastName = document.getElementById("lastname");
    const email = document.getElementById("usersEmail");
    firstName.innerHTML = details.first_name;
    lastName.innerHTML = details.last_name;
    email.innerHTML = details.email;
}