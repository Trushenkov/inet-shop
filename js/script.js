var buttonEnter = document.getElementsByClassName("cart-submit");
for (var i = 0; i < buttonEnter.length; i++) {
    buttonEnter[i].onclick = function (event) {
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
