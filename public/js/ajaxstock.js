const updateStockInterval = 10000; // 10 seconds
setInterval(updateStock, updateStockInterval);

function updateStock(){
    ajax("GET", "/chocolate/stock/" + choco_id + "/", onSuccessUpdateStock);
}

function onSuccessUpdateStock(resp){
    document.getElementById('stock').innerHTML = resp.responseText;
}