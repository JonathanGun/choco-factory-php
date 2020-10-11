function updateSearch(p){
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
            return;
        }
    }
    if (current_page > pages || current_page < 1){
        current_page = save;
        return;
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