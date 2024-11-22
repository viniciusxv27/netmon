const network = document.querySelector('#networkSelect');

network.addEventListener('change', () => {
    fetch('/getConnections/' + network.value)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            const table = document.querySelector('#networkTable');
            table.innerHTML = `
                <tr class="table-dark">
                    <td>${data.network.connection_name}</td>
                    <td>${data.network.mb_used}MB</td>
                    <td>${data.network.network_name}</td>
                    <td>${data.network.status}</td>
                    <td>${data.count}</td>
                </tr>
            `;
        });
});