function paymentMethodCheck(method) {
    if (method.value == "Credit Card") {
        document.getElementById("bankmethod").style.display = "none";
        document.getElementById("creditmethod").style.display = "block";
    }

    else if (method.value == "Bank Transfer") {
        document.getElementById("creditmethod").style.display = "none";
        document.getElementById("bankmethod").style.display = "block";
    }


    else {
        document.getElementById("creditmethod").style.display = "none";
        document.getElementById("bankmethod").style.display = "none";
    }
}
