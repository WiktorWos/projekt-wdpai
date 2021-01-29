fetch("/getTickets", {
    method: "GET"
}).then(function (response) {
    return response.json();
}).then(function (tickets) {
    console.log(tickets[0]);
});