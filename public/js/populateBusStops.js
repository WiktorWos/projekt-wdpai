window.onload = function() {
    fetchBusStops();
}

function fetchBusStops() {
    fetch("/getBusStops", {
        method: "GET"
    }).then(function (response) {
        return response.json();
    }).then(function (busStops) {
        loadBusStops(busStops);
    });
}

function loadBusStops(busStops) {
    const fromSelect = document.getElementById("fromSelect");
    const toSelect = document.getElementById("toSelect");
    busStops.forEach(busStop => {
        fromSelect.appendChild(createOption(busStop));
        toSelect.appendChild(createOption(busStop));
    });
}

function createOption(busStop) {
    const option = document.createElement("option");
    option.value = busStop.id;
    option.text = busStop.location;
    return option;
}