const network = document.querySelector('#networkSelect');

let connection_name = document.querySelector('#connection_name');
let network_name = document.querySelector('#network_name');
let interface = document.querySelector('#interface');

network.addEventListener('change', () => {
    fetch('/getNetwork/' + network.value)
        .then(response => response.json())
        .then(data => {
            connection_name.value = data.connection_name;
            network_name.value = data.network_name;
            interface.value = data.interface;
        });
});