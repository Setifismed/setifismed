document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const menuItems = document.querySelectorAll('.menu-item');
    const pages = document.querySelectorAll('.page');
    const productForm = document.getElementById('product-form');
    const productList = document.getElementById('product-list');
    const recentProducts = document.getElementById('recent-products');
    const historyList = document.getElementById('history-list');
    const modal = document.getElementById('product-modal');
    const closeBtn = document.querySelector('.close-btn');
    const modalContent = document.getElementById('modal-product-content');

    // State
    let products = JSON.parse(localStorage.getItem('products')) || [];
    let recentlyViewed = JSON.parse(localStorage.getItem('recentlyViewed')) || [];
    let viewHistory = JSON.parse(localStorage.getItem('viewHistory')) || [];

    // Initialize
    renderProducts();
    renderRecentlyViewed();
    renderViewHistory();

    // Handle initial page load based on hash
    const initialHash = window.location.hash || '#home';
    showPage(initialHash);
    setActiveMenuItem(initialHash);

    // Menu item click handlers
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const pageId = this.getAttribute('href');
            window.location.hash = pageId;
            showPage(pageId);
            setActiveMenuItem(pageId);
        });
    });

    // Browser back/forward navigation
    window.addEventListener('hashchange', function() {
        const pageId = window.location.hash;
        showPage(pageId);
        setActiveMenuItem(pageId);
    });

    // Product form submission
    productForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const newProduct = {
            id: Date.now().toString(),
            name: document.getElementById('product-name').value,
            price: parseFloat(document.getElementById('product-price').value),
            description: document.getElementById('product-description').value,
            image: document.getElementById('product-image').value || 'https://via.placeholder.com/300',
            createdAt: new Date().toISOString()
        };

        products.push(newProduct);
        saveProducts();
        renderProducts();

        // Reset form
        productForm.reset();

        // Show success message
        alert('Product added successfully!');
    });

    // Modal close button
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Functions
    function showPage(pageId) {
        const validIds = ['#home', '#products', '#add-product', '#recent', '#history'];

        if (!validIds.includes(pageId)) {
            pageId = '#home';
            window.location.hash = pageId;
        }

        pages.forEach(page => {
            page.classList.remove('active');
        });

        const pageToShow = document.getElementById(pageId.substring(1) + '-page');
        if (pageToShow) {
            pageToShow.classList.add('active');

            // Refresh data when specific pages are shown
            if (pageId === '#products') {
                renderProducts();
            } else if (pageId === '#recent') {
                renderRecentlyViewed();
            } else if (pageId === '#history') {
                renderViewHistory();
            }
        }
    }

    function setActiveMenuItem(pageId) {
        menuItems.forEach(item => {
            item.classList.remove('active');
            if (item.getAttribute('href') === pageId) {
                item.classList.add('active');
            }
        });
    }

    function renderProducts() {
        productList.innerHTML = '';

        if (products.length === 0) {
            productList.innerHTML = '<p>No products available. Add some products to get started.</p>';
            return;
        }

        products.forEach(product => {
            const productCard = document.createElement('div');
            productCard.className = 'product-card';
            productCard.innerHTML = `
                ${product.image ? `<img src="${product.image}" alt="${product.name}" class="product-image">` : ''}
                <div class="product-info">
                    <h3 class="product-name">${product.name}</h3>
                    <p class="product-price">$${product.price.toFixed(2)}</p>
                    <p class="product-description">${product.description.substring(0, 100)}${product.description.length > 100 ? '...' : ''}</p>
                </div>
            `;

            productCard.addEventListener('click', () => showProductDetail(product.id));
            productList.appendChild(productCard);
        });
    }

    function renderRecentlyViewed() {
        recentProducts.innerHTML = '';

        if (recentlyViewed.length === 0) {
            recentProducts.innerHTML = '<p>No recently viewed products.</p>';
            return;
        }

        // Display only the last 5 recently viewed
        const recentToShow = [...recentlyViewed].reverse().slice(0, 5);

        recentToShow.forEach(productId => {
            const product = products.find(p => p.id === productId);
            if (product) {
                const productCard = document.createElement('div');
                productCard.className = 'product-card';
                productCard.innerHTML = `
                    ${product.image ? `<img src="${product.image}" alt="${product.name}" class="product-image">` : ''}
                    <div class="product-info">
                        <h3 class="product-name">${product.name}</h3>
                        <p class="product-price">$${product.price.toFixed(2)}</p>
                    </div>
                `;

                productCard.addEventListener('click', () => showProductDetail(product.id));
                recentProducts.appendChild(productCard);
            }
        });
    }

    function renderViewHistory() {
        historyList.innerHTML = '';

        if (viewHistory.length === 0) {
            historyList.innerHTML = '<p>No product view history.</p>';
            return;
        }

        // Display history in reverse chronological order
        [...viewHistory].reverse().forEach(entry => {
            const product = products.find(p => p.id === entry.productId);
            if (product) {
                const historyItem = document.createElement('div');
                historyItem.className = 'history-item';

                const viewedAt = new Date(entry.viewedAt);
                const timeString = viewedAt.toLocaleString();

                historyItem.innerHTML = `
                    <span class="history-product-name">${product.name}</span>
                    <span class="history-view-time">Viewed: ${timeString}</span>
                `;

                historyItem.addEventListener('click', () => showProductDetail(product.id));
                historyList.appendChild(historyItem);
            }
        });
    }

    function showProductDetail(productId) {
        const product = products.find(p => p.id === productId);
        if (!product) return;

        // Add to recently viewed
        if (!recentlyViewed.includes(productId)) {
            recentlyViewed.push(productId);
        } else {
            // Move to end if already exists
            recentlyViewed = recentlyViewed.filter(id => id !== productId);
            recentlyViewed.push(productId);
        }

        // Keep only the last 10 items
        if (recentlyViewed.length > 10) {
            recentlyViewed = recentlyViewed.slice(-10);
        }

        // Add to view history
        viewHistory.push({
            productId,
            viewedAt: new Date().toISOString()
        });

        // Save to localStorage
        localStorage.setItem('recentlyViewed', JSON.stringify(recentlyViewed));
        localStorage.setItem('viewHistory', JSON.stringify(viewHistory));

        // Display product in modal
        modalContent.innerHTML = `
            ${product.image ? `<img src="${product.image}" alt="${product.name}" class="product-image" style="margin-bottom: 20px;">` : ''}
            <h2>${product.name}</h2>
            <p class="product-price" style="font-size: 1.5rem; margin: 10px 0;">$${product.price.toFixed(2)}</p>
            <p>${product.description}</p>
            <p style="margin-top: 20px; color: #7f8c8d; font-size: 0.9rem;">
                Added on ${new Date(product.createdAt).toLocaleDateString()}
            </p>
        `;

        modal.style.display = 'flex';
    }

    function saveProducts() {
        localStorage.setItem('products', JSON.stringify(products));
    }
});
const products = [
    {
        id: 1,
        name: "Product 1",
        batchNumber: "B123",
        quantity: 100,
        ppa: "10.00",
        shp: "12.00",
        expirationDate: "2025-12-31",
        zone: "Zone A",
        emplacement: "Location 1",
        description: "Description of product 1"
    },
    {
        id: 2,
        name: "Product 2",
        batchNumber: "B456",
        quantity: 50,
        ppa: "15.00",
        shp: "18.00",
        expirationDate: "2026-06-30",
        zone: "Zone B",
        emplacement: "Location 2",
        description: "Description of product 2"
    },
    // Add more products as needed
];

const productList = document.getElementById("product-list");
const searchInput = document.getElementById("search-input");
const filterSelect = document.getElementById("filter-select");

// Function to display products
function displayProducts(filteredProducts) {
    productList.innerHTML = "";
    filteredProducts.forEach(product => {
        const productRow = document.createElement("tr");
        productRow.innerHTML = `
            <td>${product.name}</td>
            <td>${product.batchNumber}</td>
            <td>${product.quantity}</td>
            <td>${product.ppa}</td>
            <td>${product.shp}</td>
            <td>${product.expirationDate}</td>
            <td>${product.zone}</td>
            <td>${product.emplacement}</td>
            <td>${product.description}</td>
        `;
        productList.appendChild(productRow);
    });
}

// Function to filter products
function filterProducts() {
    const searchTerm = searchInput.value.toLowerCase();
    const selectedZone = filterSelect.value;

    const filteredProducts = products.filter(product => {
        const matchesSearch = product.name.toLowerCase().includes(searchTerm);
        const matchesZone = selectedZone === "" || product.zone === selectedZone;
        return matchesSearch && matchesZone;
    });

    displayProducts(filteredProducts);
}

// Event listeners
searchInput.addEventListener("input", filterProducts);
filterSelect.addEventListener("change", filterProducts);

// Initial display
displayProducts(products);
