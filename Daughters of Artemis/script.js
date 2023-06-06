const bar = document.getElementById('bar');
const nav = document.getElementById('navbar');
const close = document.getElementById('close');

if (bar) {
  bar.addEventListener('click', () => {
    nav.classList.add('active');
  });
}

if (close) {
  close.addEventListener('click', () => {
    nav.classList.remove('active');
  });
}

// Function to navigate to a specific category page
function goToProductsPage(category) {
  const url = 'products.php?category=' + encodeURIComponent(category);
  window.location.href = url;
}

// JavaScript code for handling category filtering
document.addEventListener('DOMContentLoaded', function() {
  const categoryButtonsContainer = document.getElementById('category-buttons');
  const categoryButtons = categoryButtonsContainer.getElementsByClassName('category-btn');
  const products = document.getElementsByClassName('pro');

  // Function to filter products based on selected category
  function filterProducts(category) {
    Array.from(products).forEach(function(product) {
      const productCategory = product.dataset.category;

      if (category === 'All' || productCategory === category) {
        product.style.display = 'block';
      } else {
        product.style.display = 'none';
      }
    });
  }

  // Event listener for category button clicks
  categoryButtonsContainer.addEventListener('click', function(event) {
    if (event.target.classList.contains('category-btn')) {
      const selectedCategory = event.target.textContent;
      filterProducts(selectedCategory);
    }
  });
});


  // Add event listeners to the cart buttons
  document.addEventListener("DOMContentLoaded", function() {
  const cartButtons = document.querySelectorAll('.cart');
  cartButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      const product = button.closest('.pro');
      const name = product.getAttribute('data-name');
      const price = parseFloat(product.getAttribute('data-price'));
      const image = product.querySelector('img').src;

      const item = {
        id: Date.now(), 
        name: name,
        price: price,
        image: image
      };
      addItemToCart(item);
    });
  });
});

document.addEventListener("DOMContentLoaded", function() {
  displayCartItems();
});



//Function to add item to cart
function addItemToCart(item) {
  let cartItems = JSON.parse(localStorage.getItem('cart-items-container')) || [];

  // Check if the item already exists in the cart
  const existingItem = cartItems.find(function (cartItem) {
    return cartItem.name === item.name;
  });

  if (existingItem) {
    // Increase the quantity of the existing item
    existingItem.quantity++;
  } else {
    // Add the new item to the cart
    const cartItem = {
      name: item.name,
      image: item.image,
      price: item.price,
      quantity: 1,
    };
    cartItems.push(cartItem);
  }

  localStorage.setItem('cart-items-container', JSON.stringify(cartItems));
  displayCartItems();
}



function displayCartItems() {
  let cartItems = JSON.parse(localStorage.getItem('cart-items-container')) || [];
  const tbody = document.querySelector('#cart-items-container');
  let subtotal = 0;

  tbody.innerHTML = '';

  if (cartItems && cartItems.length > 0) {
    cartItems.forEach(function(item) {
      const tr = document.createElement('tr');

      const removeTd = document.createElement('td');
      const removeBtn = document.createElement('button');
      removeBtn.innerHTML = 'Remove';
      removeBtn.classList.add('normal');
      removeBtn.addEventListener('click', function() {
        removeFromCart(item);
      });
      removeTd.appendChild(removeBtn);
      tr.appendChild(removeTd);

      const imageTd = document.createElement('td');
      const image = document.createElement('img');
      image.src = item.image;
      image.classList.add('cart-item-image');
      imageTd.appendChild(image);
      tr.appendChild(imageTd);

      const nameTd = document.createElement('td');
      nameTd.textContent = item.name;
      nameTd.classList.add('cart-item-name');
      tr.appendChild(nameTd);

      const priceTd = document.createElement('td');
      priceTd.textContent = 'R' + item.price.toFixed(2);
      priceTd.classList.add('cart-item-price');
      tr.appendChild(priceTd);

      const minusButton = document.createElement('button');
      minusButton.innerHTML = '-';
      minusButton.className = 'quantity-btn minus-btn';
      minusButton.style.padding = '12px 12px'; 
      minusButton.classList.add('quantity-minus-btn');
      minusButton.addEventListener('click', function() {
        if (item.quantity > 1) {
          updateQuantity(item, item.quantity - 1);
        }
      });

      const quantityTd = document.createElement('td');
      const quantityInput = document.createElement('input');
      quantityInput.type = 'text';
      quantityInput.value = item.quantity;
      quantityInput.classList.add('quantity-input');
      quantityInput.addEventListener('change', function() {
        updateQuantity(item, quantityInput.value);
      });
      quantityTd.appendChild(quantityInput);

      const plusButton = document.createElement('button');
      plusButton.innerHTML = '+';
      plusButton.className = 'quantity-btn plus-btn';
      plusButton.style.padding = '12px 11px'; 
      plusButton.classList.add('quantity-plus-btn');
      plusButton.addEventListener('click', function() {
        updateQuantity(item, item.quantity + 1);
      });

      if (item.quantity === 1) {
        minusButton.setAttribute('disabled', 'disabled');
      }

      quantityTd.appendChild(minusButton);
      quantityTd.appendChild(plusButton);
      tr.appendChild(quantityTd);

      const subtotalTd = document.createElement('td');
      const itemSubtotal = item.price * item.quantity;
      subtotalTd.classList.add('cart-item-subtotal');
      subtotal += itemSubtotal;
      subtotalTd.textContent = 'R' + itemSubtotal.toFixed(2);
      tr.appendChild(subtotalTd);

      tbody.appendChild(tr);
    });

        // Add a line
        const lineRow = document.createElement('tr');
        lineRow.innerHTML = `
          <td colspan="7" class="line"></td>
        `;
        tbody.appendChild(lineRow);

    // Display the cart subtotal
    const subtotalRow = document.createElement('tr');
    subtotalRow.innerHTML = `
    <td colspan="4"></td>
    <td><strong>Cart Subtotal:</strong></td>
    <td>R${subtotal.toFixed(2)}</td>
    `;
    subtotalRow.classList.add('cart-subtotal');
    tbody.appendChild(subtotalRow);

    // Display the shipping cost
    const shippingCostRow = document.createElement('tr');
    shippingCostRow.innerHTML = `
      <td colspan="4"></td>
      <td><strong>Shipping Cost:</strong></td>
      <td><strong>R200.00</strong></td>
    `;
    shippingCostRow.classList.add('shipping-subtotal');
    tbody.appendChild(shippingCostRow);

    // Calculate the final total
    const finalTotal = subtotal + 200;

    // Display the final total
    const FinalTotalRow = document.createElement('tr');
    FinalTotalRow.innerHTML = `
      <td colspan="4"></td>
      <td><strong>Final Total:</strong></td>
      <td>R${finalTotal.toFixed(2)}</td>
    `;
    FinalTotalRow.classList.add('final-total');
    tbody.appendChild(FinalTotalRow);

    
     // Set the value of the hidden input field with the cart items
     const cartItemsInput = document.querySelector('#cartItemsInput');
     cartItemsInput.value = JSON.stringify(cartItems);
 
   } else {
     tbody.innerHTML = '<tr><td colspan="6">Your cart is empty.</td></tr>';
   }
  
    // Add a line
    const lineRow = document.createElement('tr');
    lineRow.innerHTML = `
      <td colspan="7" class="line"></td>
    `;
    tbody.appendChild(lineRow);
}

// Function to remove item from cart
function removeFromCart(item) {
  let cartItems = JSON.parse(localStorage.getItem('cart-items-container')) || [];
  cartItems = cartItems.filter(function (cartItem) {
    return cartItem.name !== item.name;
  });
  localStorage.setItem('cart-items-container', JSON.stringify(cartItems));
  displayCartItems();
}

//Function to update cart quantity
function updateQuantity(item, quantity) {
  const cartItems = JSON.parse (localStorage.getItem('cart-items-container')) || [];
  const existingItemIndex = cartItems.findIndex(function(cartItem) {
    return cartItem.name === item.name;
  });

  if (existingItemIndex !== -1) {
    if (quantity >= 1) {
      cartItems[existingItemIndex].quantity = quantity;
     localStorage.setItem('cart-items-container', JSON.stringify(cartItems));
      displayCartItems();
    } else {
      // Display a modal or custom notification to show the message
      showModal('Quantity cannot be zero. You can remove the items from your cart instead.');
      cartItems[existingItemIndex].quantity = 1;
     localStorage.setItem('cart-items-container', JSON.stringify(cartItems));
      displayCartItems();
    }
  }
}


//Login/ Registration page slider function
function register(){
  var x = document.getElementById("login");
  var y = document.getElementById("register");
  var z = document.getElementById("btn");
  x.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "110px";
}

function login(){
  var x = document.getElementById("login");
  var y = document.getElementById("register");
  var z = document.getElementById("btn");
  x.style.left = "50px";
  y.style.left = "450px";
  z.style.left = "0px";
}

function clearCart() {
  // Clear the cart items from local storage
  localStorage.removeItem('cart-items-container');
  sessionStorage.removeItem('cart-items-container');
}
