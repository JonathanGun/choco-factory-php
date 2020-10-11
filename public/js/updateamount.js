function reduceAmount(minimum_amount=1){
    document.getElementById('amount').value = Math.max(parseInt(document.getElementById('amount').value)-1, minimum_amount);
}

function increaseAmount(maximum_amount=-1){
    if(maximum_amount == -1) maximum_amount = parseInt(document.getElementById('stock').innerHTML);
    document.getElementById('amount').value = Math.min(parseInt(document.getElementById('amount').value)+1, maximum_amount);
}

function updatePrice(minimum_amount=1){
    document.getElementById('amount').value = Math.max(parseInt(document.getElementById('amount').value), minimum_amount);
    document.getElementById('amount').value = Math.min(parseInt(document.getElementById('amount').value), parseInt(document.getElementById('stock').innerHTML));
    document.getElementById('total_price').innerHTML = thousandSeparator(parseInt(document.getElementById('amount').value) * parseInt(document.getElementById('price').innerHTML.replace('.', '')));
}

function thousandSeparator(x, precission=2, decimal_sep=',', thousand_sep='.') {
    decimal = (x - Math.round(x)).toFixed(precission).toString().slice(2);
    if(precission > 0) decimal = decimal_sep + decimal;
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, thousand_sep) + decimal;
}