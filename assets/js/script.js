
// ------------------------------- //
//          SIGNUP/LOGIN           //
// -------------------------------//
function selecionarAbaNavegacao() {
    let filmes = document.getElementById("filmes");
    let poltronas = document.getElementById("poltronas");
    let bomboniere = document.getElementById("bomboniere");
    let pagamento = document.getElementById("pagamento");

    if (filmes.checked == true) {
        poltronas.checked = true;
        return;
    }

    if (poltronas.checked == true) {
        bomboniere.checked = true;
        return;
    }

    if (bomboniere.checked == true) {
        pagamento.checked = true;
        return;
    }

    if (pagamento.checked == true) {
        filmes.checked = true;
        return;
    }
}

// ------------------------------- //
//          cart no btn           //
// -------------------------------//
let addToCartButton = document.querySelectorAll(".add-to-cart-button");
document.querySelectorAll('.add-to-cart-button').forEach(function (addToCartButton) {
    addToCartButton.addEventListener('click', function () {
        addToCartButton.classList.add('added');
        setTimeout(function () {
            addToCartButton.classList.remove('added');
        }, 7000);
    });
});
const button = document.querySelector("#openModal");
button.addEventListener("click", () => {
    openModal(modals[0]);
});


// ------------------------------- //
//          modal poltronas       //
// ------------------------------//
const modals = document.querySelectorAll(".modal");
modals.forEach((modal) => {
    modal.querySelector(".modal__header-close").addEventListener("click", (e) => {
        closeModal(modal);
    });
    modal.addEventListener("mousedown", (e) => {
        const button = e.which || e.button;
        if (e.target != modal || button !== 1) return;
        closeModal(modal);
    });
});
const openModal = (modal) => {
    const modalContainer = modal.querySelector(".modal__container");
    modal.classList.add("active");
};
const closeModal = (modal) => {
    modal.classList.add("closing");
    modal.classList.remove("active");
    modal.querySelector(".modal__container").addEventListener(
        "animationend",
        () => {
            modal.classList.remove("closing");
        }, {
        once: true
    }
    );
};


// ------------------------------- //
//          add product cart       //
// ------------------------------- //
function incrementQty(id, price) {
    var input = 'input[name="qty_'.concat(id, '"]');

    var value = document.querySelector(input).value;
    var cardPrice = document.getElementById("price_".concat(id));

    value = isNaN(value) ? 1 : value;
    value++;

    document.querySelector(input).value = value;

    if (value > 0) {
        cardPrice.innerText = "R$ ".concat((value * price), ",00");
    }
    else {
        cardPrice.innerText = "R$ ".concat(price, ",00");
    }
}

function decrementQty(id, price) {
    var input = 'input[name="qty_'.concat(id, '"]');

    var value = document.querySelector(input).value;
    var cardPrice = document.getElementById("price_".concat(id));

    value = isNaN(value) ? 1 : value;
    value > 0 ? value-- : value;

    document.querySelector(input).value = value;

    if (value > 0) {
        cardPrice.innerText = "R$ ".concat((value * price), ",00");
    }
    else {
        cardPrice.innerText = "R$ ".concat(price, ",00");
    }
}