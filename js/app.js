/**
 * app.js — Tienda Virtual con AJAX
 * Proyecto para el curso de AJAX — U Fidelitas
 *
 * Demuestra el uso de XMLHttpRequest (XHR) y la Fetch API para
 * cargar productos de forma asíncrona sin recargar la página.
 */

'use strict';

// ─── Estado global ────────────────────────────────────────────────────────────
const state = {
  /** @type {Array<{id:number,name:string,category:string,price:number,stock:number,image:string,description:string}>} */
  products: [],
  /** @type {Array<{product: object, qty: number}>} */
  cart: [],
  filter: {
    search: '',
    category: 'all',
  },
};

// ─── Selectores DOM ───────────────────────────────────────────────────────────
const productsGrid    = document.getElementById('products-grid');
const statusEl        = document.getElementById('status');
const searchInput     = document.getElementById('search-input');
const categoryFilter  = document.getElementById('category-filter');
const cartBtn         = document.getElementById('cart-btn');
const cartCount       = document.getElementById('cart-count');
const cartSidebar     = document.getElementById('cart-sidebar');
const cartOverlay     = document.getElementById('cart-overlay');
const closeCartBtn    = document.getElementById('close-cart');
const cartItemsEl     = document.getElementById('cart-items');
const cartEmptyEl     = document.getElementById('cart-empty');
const cartTotalEl     = document.getElementById('cart-total-amount');
const checkoutBtn     = document.getElementById('checkout-btn');
const toastEl         = document.getElementById('toast');

// ─── AJAX: carga de productos ─────────────────────────────────────────────────

/**
 * Carga los productos usando XMLHttpRequest (técnica clásica de AJAX).
 * Equivalente moderno con Fetch se muestra en loadProductsFetch().
 *
 * @param {string} url  Ruta al archivo JSON de productos.
 * @returns {Promise<Array>}
 */
function loadProductsXHR(url) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();

    xhr.open('GET', url, true);           // true = asíncrono
    xhr.setRequestHeader('Accept', 'application/json');

    xhr.onreadystatechange = function () {
      if (xhr.readyState !== XMLHttpRequest.DONE) return;

      if (xhr.status >= 200 && xhr.status < 300) {
        try {
          resolve(JSON.parse(xhr.responseText));
        } catch (e) {
          reject(new Error('Error al parsear JSON: ' + e.message));
        }
      } else {
        reject(new Error('Error HTTP ' + xhr.status + ': ' + xhr.statusText));
      }
    };

    xhr.onerror = () => reject(new Error('Error de red al cargar los productos.'));

    xhr.send();
  });
}

/**
 * Alternativa moderna con la Fetch API (también asíncrona / AJAX).
 * Se usa como respaldo si XHR falla.
 *
 * @param {string} url
 * @returns {Promise<Array>}
 */
async function loadProductsFetch(url) {
  const response = await fetch(url);
  if (!response.ok) {
    throw new Error('Error HTTP ' + response.status + ': ' + response.statusText);
  }
  return response.json();
}

// ─── Renderizado de productos ─────────────────────────────────────────────────

function getFilteredProducts() {
  const { search, category } = state.filter;
  return state.products.filter(p => {
    const matchesCategory = category === 'all' || p.category === category;
    const matchesSearch   = p.name.toLowerCase().includes(search.toLowerCase()) ||
                            p.description.toLowerCase().includes(search.toLowerCase());
    return matchesCategory && matchesSearch;
  });
}

function formatPrice(price) {
  return '$' + price.toFixed(2);
}

function createProductCard(product) {
  const outOfStock = product.stock === 0;

  const card = document.createElement('article');
  card.className = 'product-card';
  card.dataset.id = product.id;

  card.innerHTML = `
    <img src="${product.image}" alt="${escapeHTML(product.name)}" loading="lazy">
    <div class="card-body">
      <span class="category-badge">${escapeHTML(product.category)}</span>
      <h2>${escapeHTML(product.name)}</h2>
      <p class="description">${escapeHTML(product.description)}</p>
      <div class="card-footer">
        <div>
          <div class="price">${formatPrice(product.price)}</div>
          <div class="stock">${outOfStock ? 'Sin stock' : product.stock + ' disponibles'}</div>
        </div>
        <button
          class="add-to-cart-btn"
          data-id="${product.id}"
          ${outOfStock ? 'disabled' : ''}
          aria-label="Agregar ${escapeHTML(product.name)} al carrito"
        >
          🛒 Agregar
        </button>
      </div>
    </div>
  `;

  return card;
}

function renderProducts() {
  const filtered = getFilteredProducts();

  productsGrid.innerHTML = '';

  if (filtered.length === 0) {
    productsGrid.innerHTML = '<p style="grid-column:1/-1;text-align:center;color:var(--muted);padding:3rem">No se encontraron productos.</p>';
    return;
  }

  const fragment = document.createDocumentFragment();
  filtered.forEach(p => fragment.appendChild(createProductCard(p)));
  productsGrid.appendChild(fragment);
}

function populateCategoryFilter() {
  const categories = [...new Set(state.products.map(p => p.category))];
  categories.forEach(cat => {
    const option = document.createElement('option');
    option.value = cat;
    option.textContent = cat.charAt(0).toUpperCase() + cat.slice(1);
    categoryFilter.appendChild(option);
  });
}

// ─── Carrito ──────────────────────────────────────────────────────────────────

function getCartItem(productId) {
  return state.cart.find(item => item.product.id === productId);
}

function addToCart(productId) {
  const product = state.products.find(p => p.id === productId);
  if (!product) return;

  const existing = getCartItem(productId);
  if (existing) {
    if (existing.qty < product.stock) {
      existing.qty++;
    } else {
      showToast('No hay más unidades disponibles.');
      return;
    }
  } else {
    state.cart.push({ product, qty: 1 });
  }

  updateCartUI();
  showToast(`"${product.name}" agregado al carrito ✓`);
}

function removeFromCart(productId) {
  state.cart = state.cart.filter(item => item.product.id !== productId);
  updateCartUI();
}

function changeQty(productId, delta) {
  const item = getCartItem(productId);
  if (!item) return;

  item.qty += delta;
  if (item.qty <= 0) {
    removeFromCart(productId);
    return;
  }
  if (item.qty > item.product.stock) {
    item.qty = item.product.stock;
    showToast('No hay más unidades disponibles.');
  }
  updateCartUI();
}

function getTotalItems() {
  return state.cart.reduce((sum, item) => sum + item.qty, 0);
}

function getTotalPrice() {
  return state.cart.reduce((sum, item) => sum + item.product.price * item.qty, 0);
}

function renderCartItems() {
  cartItemsEl.innerHTML = '';

  if (state.cart.length === 0) {
    cartEmptyEl.style.display = 'block';
    checkoutBtn.disabled = true;
    return;
  }

  cartEmptyEl.style.display = 'none';
  checkoutBtn.disabled = false;

  const fragment = document.createDocumentFragment();
  state.cart.forEach(({ product, qty }) => {
    const div = document.createElement('div');
    div.className = 'cart-item';
    div.innerHTML = `
      <img src="${product.image}" alt="${escapeHTML(product.name)}">
      <div class="cart-item-info">
        <strong>${escapeHTML(product.name)}</strong>
        <span>${formatPrice(product.price)} c/u</span>
      </div>
      <div class="cart-item-controls">
        <button class="qty-btn" data-id="${product.id}" data-delta="-1" aria-label="Disminuir cantidad">−</button>
        <span class="qty-value">${qty}</span>
        <button class="qty-btn" data-id="${product.id}" data-delta="1" aria-label="Aumentar cantidad">+</button>
        <button class="remove-btn" data-id="${product.id}" aria-label="Eliminar del carrito">🗑</button>
      </div>
    `;
    fragment.appendChild(div);
  });

  cartItemsEl.appendChild(fragment);
}

function updateCartUI() {
  const total = getTotalItems();
  cartCount.textContent = total;
  cartCount.style.display = total > 0 ? 'inline' : 'none';
  cartTotalEl.textContent = formatPrice(getTotalPrice());
  renderCartItems();
}

// ─── Sidebar del carrito ──────────────────────────────────────────────────────

function openCart() {
  cartSidebar.classList.add('open');
  cartOverlay.classList.add('visible');
  document.body.style.overflow = 'hidden';
}

function closeCart() {
  cartSidebar.classList.remove('open');
  cartOverlay.classList.remove('visible');
  document.body.style.overflow = '';
}

// ─── Toast ────────────────────────────────────────────────────────────────────

let toastTimer = null;

function showToast(message) {
  toastEl.textContent = message;
  toastEl.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toastEl.classList.remove('show'), 2500);
}

// ─── Seguridad: escape de HTML ────────────────────────────────────────────────

function escapeHTML(str) {
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;');
}

// ─── Listeners ────────────────────────────────────────────────────────────────

searchInput.addEventListener('input', e => {
  state.filter.search = e.target.value.trim();
  renderProducts();
});

categoryFilter.addEventListener('change', e => {
  state.filter.category = e.target.value;
  renderProducts();
});

cartBtn.addEventListener('click', openCart);
closeCartBtn.addEventListener('click', closeCart);
cartOverlay.addEventListener('click', closeCart);

// Delegación de eventos en la grilla (botones "Agregar")
productsGrid.addEventListener('click', e => {
  const btn = e.target.closest('.add-to-cart-btn');
  if (btn && !btn.disabled) {
    addToCart(Number(btn.dataset.id));
  }
});

// Delegación de eventos en el carrito (qty y eliminar)
cartItemsEl.addEventListener('click', e => {
  const qtyBtn    = e.target.closest('.qty-btn');
  const removeBtn = e.target.closest('.remove-btn');

  if (qtyBtn) {
    changeQty(Number(qtyBtn.dataset.id), Number(qtyBtn.dataset.delta));
  } else if (removeBtn) {
    removeFromCart(Number(removeBtn.dataset.id));
  }
});

checkoutBtn.addEventListener('click', () => {
  if (state.cart.length === 0) return;
  state.cart = [];
  updateCartUI();
  closeCart();
  showToast('¡Compra realizada con éxito! 🎉');
});

// ─── Inicialización ───────────────────────────────────────────────────────────

async function init() {
  // Mostrar spinner de carga
  statusEl.innerHTML = '<div class="spinner"></div><p>Cargando productos…</p>';
  statusEl.style.display = 'block';
  productsGrid.style.display = 'none';

  try {
    // Intentar con XMLHttpRequest primero (técnica clásica de AJAX)
    state.products = await loadProductsXHR('data/products.json');
  } catch (xhrError) {
    console.warn('XHR falló, intentando con Fetch API…', xhrError);
    try {
      state.products = await loadProductsFetch('data/products.json');
    } catch (fetchError) {
      statusEl.innerHTML = `<p style="color:var(--danger)">⚠️ No se pudieron cargar los productos.<br><small>${escapeHTML(fetchError.message)}</small></p>`;
      return;
    }
  }

  // Ocultar estado y mostrar grilla
  statusEl.style.display = 'none';
  productsGrid.style.display = 'grid';

  populateCategoryFilter();
  renderProducts();
  updateCartUI();
}

document.addEventListener('DOMContentLoaded', init);
