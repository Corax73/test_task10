const btnDel = document.getElementsByClassName('btn btn-outline-primary del-product');

/**
 * handle the event
 */
function btnDelHandler() {
    for (let i = 0; i < btnDel.length; i++) {
        btnDel[i].addEventListener('click', function (e) {
            e.preventDefault();
            window.axios.delete('/cart/product/' + btnDel[i].dataset.id)
                .then(response => {
                    location.reload()
                })
                .catch(error => {
                    console.log(error)
                });
        });
    }
}

/**
 * script initialization
 */
function init() {
    btnDelHandler();
}

init();