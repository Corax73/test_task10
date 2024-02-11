const btnAdd = document.getElementsByClassName('btn btn-primary add-product');

/**
 * handle the event
 */
function btnAddHandler() {
    for (let i = 0; i < btnAdd.length; i++) {
        btnAdd[i].addEventListener('click', function (e) {
            e.preventDefault();
            window.axios.post('/cart/product/' + btnAdd[i].dataset.id)
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
    btnAddHandler();
}

init();