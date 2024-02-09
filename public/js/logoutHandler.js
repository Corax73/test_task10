const btn = document.getElementById('btn-logout');

/**
 * handle the event
 */
function btnHandler() {
    btn.addEventListener('click', function (e) {
        window.axios.post('/logout')
            .then(response => {
                location.reload()
            })
            .catch(error => {
                console.log(error)
            });
    });
}

/**
 * script initialization
 */
function init() {
    btnHandler();
}

init();