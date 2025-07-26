'use strict'
class CartUI {
    constructor(containerId, baseUrl) {
        this.cartBody = document.getElementById(containerId);
        this.baseUrl = baseUrl;
        this.cart = JSON.parse(localStorage.getItem("cart")) || [];

        this.bindEvents();
    }

    formatVND(value) {
        return value.toLocaleString('vi-VN') + " VND";
    }

    saveCart() {
        localStorage.setItem("cart", JSON.stringify(this.cart));
    }

    render() {
        this.cartBody.innerHTML = "";

        this.cart.forEach((item, index) => {
            const subtotal = item.price * item.quantity;
            const row = document.createElement("tr");

            row.innerHTML = `
                <td class="shoping__cart__item">
                    <img src="${this.baseUrl}/public/uploads/${item.image}" width="70" alt="">
                    <h5>${item.name}</h5>
                </td>
                <td class="shoping__cart__price">
                    ${this.formatVND(item.price)}
                </td>
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                        <div class="pro-qty" data-index="${index}">
                            <span class="dec qtybtn">-</span>
                            <input type="text" value="${item.quantity}" class="cart-qty-input">
                            <span class="inc qtybtn">+</span>
                        </div>
                    </div>
                </td>
                <td class="shoping__cart__total">
                    ${this.formatVND(subtotal)}
                </td>
                <td class="shoping__cart__item__close">
                    <span class="icon_close cart-remove" data-index="${index}" style="cursor:pointer;"></span>
                </td>
            `;

            this.cartBody.appendChild(row);
        });

        this.saveCart();
        this.updateTotalUI();
    }

    bindEvents() {
        this.cartBody.addEventListener("click", (e) => {
            const btn = e.target;
            const parent = btn.closest(".pro-qty");
            if (!parent) return;

            const index = parseInt(parent.dataset.index);

            if (btn.classList.contains("inc")) {
                this.cart[index].quantity += 1;
                this.render();
            }

            if (btn.classList.contains("dec")) {
                this.cart[index].quantity -= 1;
                if (this.cart[index].quantity < 1) this.cart[index].quantity = 1;
                this.render();
            }

            if (btn.classList.contains("cart-remove")) {
                this.cart.splice(index, 1);
                this.render();
            }
        });

        this.cartBody.addEventListener("input", (e) => {
            if (e.target.classList.contains("cart-qty-input")) {
                const parent = e.target.closest(".pro-qty");
                const index = parseInt(parent.dataset.index);
                let newQty = parseInt(e.target.value);
                if (isNaN(newQty) || newQty < 1) newQty = 1;
                this.cart[index].quantity = newQty;
                this.render();
            }
        });
    }
    updateFromInputs() {
        const qtyInputs = this.cartBody.querySelectorAll(".cart-qty-input");

        qtyInputs.forEach((input, index) => {
            let value = parseInt(input.value);
            if (isNaN(value) || value < 1) value = 1;
            this.cart[index].quantity = value;
        });

        this.saveCart();
        this.render();
    }
    updateTotalUI() {
        const subtotalEl = document.getElementById("cart-subtotal");
        const totalEl = document.getElementById("cart-total");

        const subtotal = this.cart.reduce((sum, item) => sum + item.price * item.quantity, 0);

        if (subtotalEl) subtotalEl.textContent = this.formatVND(subtotal);
        if (totalEl) totalEl.textContent = this.formatVND(subtotal); // Chưa có shipping/discount nên total = subtotal
    }

}