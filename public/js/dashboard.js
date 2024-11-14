document.getElementById('newConnectionForm').addEventListener('submit', function (event) {
    var btn = document.getElementById('submitButton');
    var btnText = btn.innerHTML;

    btn.innerHTML = '<l-waveform size="20" stroke="2.5" speed="1" color="white" ></l-miyagi>';
    btn.disabled = true;

    setTimeout(function () {
        btn.innerHTML = btnText;
        btn.disabled = false;
    }, 5000);
});