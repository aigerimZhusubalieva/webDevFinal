const products = [
  {
    id: 0,
    cost: 200,
    name: "Web dev course",
    imageUrl:
      "https://img.freepik.com/free-vector/hand-drawn-web-developers_23-2148819604.jpg?w=2000",
  },
  {
    id: 1,
    cost: 10,
    name: "Figma course",
    imageUrl: "https://i.ytimg.com/vi/g6rQFP9zCAM/maxresdefault.jpg",
  },
  {
    id: 2,
    cost: 120,
    name: "Figma tutorial",
    imageUrl: "https://i.ytimg.com/vi/ks4g08InpOg/hqdefault.jpg",
  },
];

const cart = {};
const createImage = (src) => {
  const image = document.createElement("img");
  image.src = src;
  return image;
};

const createTitle = (name) => {
  const title = document.createElement("p");
  title.textContent = name;
  return title;
};

const createPrice = (price) => {
  const priceSpan = document.createElement("p");
  priceSpan.textContent = "$" + price;
  return priceSpan;
};

const button = (id, text) => {
  const btn = document.createElement("button");
  btn.textContent = text;
  btn.addEventListener("click", () => {
    if (btn.textContent == "Add to cart") {
      cart[id] = products[id];
      cart[id]["qty"] = 1;
      btn.textContent = "Remove";
    } else {
      delete cart[id];
      btn.textContent = "Add to cart";
    }
    btn.classList.toggle("pressed");
    updateCart();
  });
  return btn;
};

const createContainer = (id, name, cost) => {
  const container = document.createElement("div");
  container.appendChild(createTitle(name));
  container.appendChild(createPrice(cost));
  container.appendChild(button(id, "Add to cart"));
  return container;
};

const createListItem = (product) => {
  const item = document.createElement("li");
  item.appendChild(createImage(product.imageUrl));
  item.appendChild(createContainer(product.id, product.name, product.cost));
  return item;
};

const createCartRemain = (id, con) => {
  const qty = document.createElement("span");
  if (con) qty.textContent = cart[id]["qty"];
  else qty.textContent = "x" + cart[id]["qty"];
  const total = document.createElement("span");
  total.textContent = "$" + cart[id]["qty"] * cart[id]["cost"];
  const minus = document.createElement("span");
  minus.addEventListener("click", () => {
    if (cart[id]["qty"] > 1) {
      cart[id]["qty"]--;
    }
    qty.textContent = cart[id]["qty"];
    total.textContent = "$" + cart[id]["qty"] * cart[id]["cost"];
    countTotal("total_val");
  });
  minus.textContent = "-";
  minus.classList.add("control");
  const plus = document.createElement("span");
  plus.addEventListener("click", () => {
    cart[id]["qty"]++;
    qty.textContent = cart[id]["qty"];
    total.textContent = "$" + cart[id]["qty"] * cart[id]["cost"];
    countTotal("total_val");
  });
  plus.textContent = "+";
  plus.classList.add("control");

  const quantityControl = document.createElement("div");
  if (con) quantityControl.appendChild(minus);
  quantityControl.appendChild(qty);
  if (con) quantityControl.appendChild(plus);
  const rem = document.createElement("div");
  rem.appendChild(quantityControl);
  rem.appendChild(total);
  return rem;
};

const createCartItem = (id, product) => {
  const cartItem = document.createElement("li");
  const contain = document.createElement("div");
  contain.appendChild(createImage(product.imageUrl));
  contain.appendChild(createTitle(product.name));
  cartItem.appendChild(contain);
  cartItem.appendChild(createCartRemain(id, true));
  return cartItem;
};

const addNewProduct = (e) => {
  e.preventDefault();
  var formData = new FormData(e.target);

  const newProduct = {};
  newProduct["id"] = products.length;
  for (var pair of formData.entries()) {
    if (pair[0] == "product_name") newProduct["name"] = pair[1];
    else if (pair[0] == "product_image") newProduct["imageUrl"] = pair[1];
    else if (pair[0] == "product_cost") newProduct["cost"] = parseInt(pair[1]);
  }
  products.push(newProduct);
  updateProducts();
  openAddition();
};

const countTotal = (where) => {
  totalCart = 0;
  for (const [key, value] of Object.entries(cart)) {
    totalCart += value.cost * value.qty;
  }
  document.getElementById(where).textContent = `$${totalCart + 10}`;
};

const updateCart = () => {
  const cartList = document.getElementById("cart_list");
  cartList.innerHTML = "";

  for (const [key, value] of Object.entries(cart)) {
    cartList.appendChild(createCartItem(key, value));
  }
  countTotal("total_val");
};

const updateProducts = () => {
  const list = document.getElementById("products");
  list.innerHTML = "";
  products.forEach((product) => {
    list.appendChild(createListItem(product));
  });
};

const createReceiptItem = (id, product) => {
  const receiptItem = document.createElement("li");
  const contain = document.createElement("div");
  contain.appendChild(createTitle(product.name));
  receiptItem.appendChild(contain);
  receiptItem.appendChild(createCartRemain(id, false));
  return receiptItem;
};

const updateReceipt = () => {
  const cartList = document.getElementById("receipt_list");
  cartList.innerHTML = "";

  for (const [key, value] of Object.entries(cart)) {
    cartList.appendChild(createReceiptItem(key, value));
  }
  countTotal("receipt_total_val");
};

const openCart = () => {
  updateCart();
  document.body.classList.toggle("blur");
  document.getElementById("cart").classList.toggle("display");
};

const openAddition = () => {
  document.body.classList.toggle("blur");
  document.getElementById("add_article").classList.toggle("display");
};

const openReceipt = () => {
  document.getElementById("receipt").classList.toggle("display");
  document.body.classList.toggle("bl");
};

const openCheckout = () => {
  document.body.classList.toggle("bl");
  document.getElementById("get_checkout").classList.toggle("display");
  updateReceipt();
};

const getReceipt = (e) => {
  e.preventDefault();
  var formData = new FormData(e.target);

  for (var pair of formData.entries()) {
    if (pair[0] == "person_name")
      document.getElementById("receipt_name").textContent = pair[1];
    else if (pair[0] == "email")
      document.getElementById("receipt_email").textContent = pair[1];
    else if (pair[0] == "zip")
      document.getElementById("receipt_zip").textContent = pair[1];
    else {
      document.getElementById("receipt_card").textContent =
        "xxxx xxxx xxxx " + pair[1].slice(12, 17);
    }
  }
  openReceipt();
  openCheckout();
  updateReceipt();
};

document.addEventListener("DOMContentLoaded", updateProducts);
