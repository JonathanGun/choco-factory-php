var current_page = 1;

function updatePagination(p){
    // scroll to top
    window.scrollTo(0,0);
    
    // validation
    save = current_page;
    if(p == "+"){
        current_page++;
    } else if (p == "-"){
        current_page--;
    } else {
        if(Number.isInteger(p)){
            current_page = p;
        } else {
            return false;
        }
    }
    if (current_page > pages || current_page < 1){
        current_page = save;
        return false;
    }

    // update pagination
    var pagination = document.querySelectorAll("#pagination>a");
    pagination.forEach(el =>{
        if(el.classList.contains("bold")){
            el.classList.remove("bold");
        }
        if(el.innerHTML == current_page){
            el.classList.add("bold");
        }
    })

    return true;
}

function updateSearch(p){
    if(!updatePagination(p)){
        return;
    }

    // update chocolates
    current_page--;
    for(let i = 1; i <= chocolate_per_page; i++){
        var choco_div = document.getElementById('choco'+i);
        if(current_page*chocolate_per_page + i > chocolates.length){
            choco_div.style.display = 'none';
        } else {
            choco_div.style.display = 'block';
            var chocolate = chocolates[current_page*chocolate_per_page + i - 1];
            var choco_link = document.getElementById('chocolink'+i);
            var choco_img = document.getElementById('chocoimg'+i);
            var choco_name = document.getElementById('choconame'+i);
            var choco_sold = document.getElementById('chocosold'+i);
            var choco_price = document.getElementById('chocoprice'+i);
            var choco_stock = document.getElementById('chocostock'+i);
            var choco_desc = document.getElementById('chocodesc'+i);
            choco_link.href = '/chocolate/view/' + chocolate.ChocoID + '/';
            choco_img.src = '/public/uploads/' + chocolate.ImageName;
            choco_img.alt = chocolate.ImageName;
            choco_name.innerHTML = chocolate.Name;
            choco_sold.innerHTML = chocolate.Sold;
            choco_price.innerHTML = chocolate.Price;
            choco_stock.innerHTML = chocolate.Stock;
            choco_desc.innerHTML = (chocolate.Description?chocolate.Description:'-');
        }
    }
    current_page++;
}

function updateTransaction(p){
    if(!updatePagination(p)){
        return;
    }

    // update transcactions
    current_page--;
    for(let i = 1; i <= transaction_per_page; i++){
        var transaction_div = document.getElementById('transaction'+i);
        if(current_page*transaction_per_page + i > transactions.length){
            if(transaction_div !== null){
                transaction_div.style.display = 'none';
            }
        } else {
            transaction_div.style.display = '';
            var transaction = transactions[current_page*transaction_per_page + i - 1];
            var transaction_name = document.getElementById('transaction_name'+i);
            var transaction_amount = document.getElementById('transaction_amount'+i);
            var transaction_price = document.getElementById('transaction_price'+i);
            var transaction_date = document.getElementById('transaction_date'+i);
            var transaction_time = document.getElementById('transaction_time'+i);
            var transaction_address = document.getElementById('transaction_address'+i);
            transaction_name.innerHTML = transaction.Name;
            transaction_name.href = '/chocolate/view/'+transaction.ChocoID+'/';
            transaction_amount.innerHTML = thousandSeparator(transaction.Amount, precission=0);
            transaction_price.innerHTML = "Rp " + thousandSeparator(transaction.Price * transaction.Amount);
            transaction_date.innerHTML = transaction.Date.split(' ')[0];
            transaction_time.innerHTML = transaction.Date.split(' ')[1];
            transaction_address.innerHTML = transaction.Address;
        }
    }
    current_page++;
}

function thousandSeparator(x, precission=2, decimal_sep=',', thousand_sep='.') {
    decimal = (x - Math.round(x)).toFixed(precission).toString().slice(2);
    if(precission > 0) decimal = decimal_sep + decimal;
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, thousand_sep) + decimal;
}