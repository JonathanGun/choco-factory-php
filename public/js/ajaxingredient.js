var dropdown = document.createElement("select");
var dropdownInput = document.createElement("input");
var ingredients = document.getElementById("ingredients");
var nInput = document.getElementById("n");
onLoad();

function onLoad() {
  dropdown.classList = "col-xs-12 col-sm-8".split();

  dropdownInput.type = "number";
  dropdownInput.classList = "col-xs-12 col-sm-4".split();
  dropdownInput.placeholder = "1";
  dropdownInput.min = "0";
  dropdownInput.step = "1";
  dropdownInput.required = true;

  getIngredients();
}

function getIngredients(price = "false") {
  var url = " http://localhost:3000/";
  fetch(url + "?price=" + (price === "false" ? "false" : "true"), {
    method: "GET",
    headers: {
      "Access-Control-Allow-Origin": "*",
    },
  })
    .then((res) => res.text())
    .then((res) => {
      let data = JSON.parse(res);
      data.sort((a, b) =>
        a.IngredientName.toLowerCase() > b.IngredientName.toLowerCase()
          ? 1
          : b.IngredientName.toLowerCase() > a.IngredientName.toLowerCase()
          ? -1
          : 0
      );
      for (let i = 0; i < data.length; i++) {
        let option = document.createElement("option");
        option.text = data[i].IngredientName;
        option.value = data[i].IngredientID;
        dropdown.add(option);
      }
      document.getElementById("ingredient-button").style.display = null;
      addIngredient();
    });
}

function addIngredient() {
  var n_ingredient = nInput.value;
  n_ingredient++;
  nInput.value = n_ingredient;

  var curDropdown = dropdown.cloneNode(true);
  curDropdown.name = "ingredientid[" + (n_ingredient - 1) + "]";
  ingredients.prepend(curDropdown);

  var curDropdownInput = dropdownInput.cloneNode(true);
  curDropdownInput.name = "ingredientamount[" + (n_ingredient - 1) + "]";

  var dropdownDiv = document.createElement("div");
  dropdownDiv.classList = "row mb-2".split();
  dropdownDiv.id = "ingredient" + n_ingredient;
  dropdownDiv.appendChild(curDropdown);
  dropdownDiv.appendChild(curDropdownInput);

  ingredients.appendChild(dropdownDiv);
}

function reduceIngredient() {
  var n_ingredient = nInput.value;
  if (n_ingredient <= 1) return;
  n_ingredient--;
  nInput.value = n_ingredient;

  ingredients.removeChild(ingredients.lastChild);
}
