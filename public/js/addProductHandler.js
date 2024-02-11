const btnAddPrimary = document.getElementsByClassName('btn btn-primary add-product');
const btnAddOutline = document.getElementsByClassName('btn btn-outline-primary add-product');

/**
 * handle the event
 */
function btnAddHandler(btn) {
    for (let i = 0; i < btn.length; i++) {
        btn[i].addEventListener('click', function (e) {
            e.preventDefault();
            window.axios.post('/cart/product/' + btn[i].dataset.id)
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
    btnAddHandler(btnAddPrimary);
    btnAddHandler(btnAddOutline);
}

init();