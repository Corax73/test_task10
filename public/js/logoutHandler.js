const btn = document.getElementById('btn-logout');

/**
 * handle the event
 */
function btnHandler() {
    btn.addEventListener('click', function (e) {
        e.preventDefault();
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
    if (btn) (btnHandler());
}

init();