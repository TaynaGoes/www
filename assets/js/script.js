
// ------------------------------- //
//          SIGNUP/LOGIN           //
// -------------------------------//
function selecionarAbaNavegacao() {
    let filmes = document.getElementById("filmes");
    let poltronas = document.getElementById("poltronas");
    let bomboniere = document.getElementById("bomboniere");
    let pagamento = document.getElementById("pagamento");
    let ingresso = document.getElementById("ingresso");

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
        ingresso.checked = true;

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
function incrementQty() {
    var value = document.querySelector('input[name="qty"]').value;
    var cardQty = document.querySelector(".cart-qty");
    var cardPrice = document.querySelector(".price");
    let price = 10.00
    value = isNaN(value) ? 1 : value;
    value++;
    document.querySelector('input[name="qty"]').value = value;
    cardQty.innerHTML = value;
    cardPrice.innerHTML = value * price;
    console.log(cardPrice);

}

function decrementQty() {
    var value = document.querySelector('input[name="qty"]').value;
    var cardQty = document.querySelector(".cart-qty");
    var cardPrice = document.querySelector(".price");
    let price = 10.00
    value = isNaN(value) ? 1 : value;
    value > 1 ? value-- : value;
    document.querySelector('input[name="qty"]').value = value;
    cardQty.innerHTML = value;
    cardPrice.innerHTML = value * price;
    console.log(cardPrice);
}


