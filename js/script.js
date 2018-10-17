<!-- For add product to cart -->
var buttonAdd = document.getElementsByClassName("cart-submit");
for (var i = 0; i < buttonAdd.length; i++) {
    buttonAdd[i].onclick = function (event) {
        var button = event.currentTarget.parentNode.parentNode;
        var idProduct = button.getElementsByClassName("id-product");
        var idUser = button.getElementsByClassName("id-user");
        idProduct = idProduct[0];
        idUser = idUser[0];
        idProduct = idProduct.innerHTML;
        idUser = idUser.innerHTML;

        var getCountTov = button.getElementsByClassName("cart-number");
        getCountTov = getCountTov[0];
        getCountTov = getCountTov.value;
        var xhl = new XMLHttpRequest();
        var request = "functions/add_to_cart.php?id=" + idProduct + "?idUser=" + idUser + "?count=" + getCountTov;
        console.log(request);
        xhl.open("GET", request, true);
        xhl.send();
    }
}

<!--For remove product from cart-->
var buttonRemove = document.getElementsByClassName("cart-remove");
for (var i = 0; i < buttonRemove.length; i++) {
    buttonRemove[i].onclick = function (event) {
        var button = event.currentTarget.parentNode.parentNode;
        var idProduct = button.getElementsByClassName("id-product");
        var idUser = button.getElementsByClassName("id-user");
        idProduct = idProduct[0];
        idUser = idUser[0];
        idProduct = idProduct.innerHTML;
        idUser = idUser.innerHTML;

        var getCountTov = button.getElementsByClassName("cart-number");
        getCountTov = getCountTov[0];
        getCountTov = getCountTov.value;
        var xhl = new XMLHttpRequest();
        var request = "functions/add_to_cart.php?id=" + idProduct + "?idUser=" + idUser + "?count=" + getCountTov;
        console.log(request);
        xhl.open("GET", request, true);
        xhl.send();
    }
}