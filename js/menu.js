document.addEventListener('DOMContentLoaded', function() {
    const menuItems = JSON.parse(localStorage.getItem('menuItems')) || [];
    const menuTable = document.getElementById('menu-items');
    const menuForm = document.getElementById('menu-form');
    const menuItemForm = document.getElementById('menu-item-form');
    const addItemBtn = document.getElementById('add-item-btn');
    const cancelBtn = document.getElementById('cancel-btn');

    function renderMenuItems() {
        menuTable.innerHTML = '';
        menuItems.forEach((item, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.name}</td>
                <td>Rp ${item.price.toLocaleString('id-ID')}</td>
                <td>${item.category}</td>
                <td>
                    <button onclick="editMenuItem(${index})" class="btn-secondary">Edit</button>
                    <button onclick="deleteMenuItem(${index})" class="btn-secondary">Delete</button>
                </td>
            `;
            menuTable.appendChild(row);
        });
        localStorage.setItem('menuItems', JSON.stringify(menuItems));
    }

    function addMenuItem(item) {
        menuItems.push(item);
        renderMenuItems();
    }

    function updateMenuItem(index, updatedItem) {
        menuItems[index] = updatedItem;
        renderMenuItems();
    }

    function deleteMenuItem(index) {
        menuItems.splice(index, 1);
        renderMenuItems();
    }

    addItemBtn.addEventListener('click', () => {
        document.getElementById('form-title').textContent = 'Add New Menu Item';
        menuForm.style.display = 'block';
        menuItemForm.reset();
    });

    cancelBtn.addEventListener('click', () => {
        menuForm.style.display = 'none';
    });

    menuItemForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const id = document.getElementById('item-id').value;
        const name = document.getElementById('item-name').value;
        const price = parseFloat(document.getElementById('item-price').value);
        const category = document.getElementById('item-category').value;

        if (id) {
            updateMenuItem(parseInt(id), { name, price, category });
        } else {
            addMenuItem({ name, price, category });
        }

        menuForm.style.display = 'none';
        menuItemForm.reset();
    });

    // Expose these functions globally for the onclick attributes
    window.editMenuItem = function(index) {
        const item = menuItems[index];
        document.getElementById('form-title').textContent = 'Edit Menu Item';
        document.getElementById('item-id').value = index;
        document.getElementById('item-name').value = item.name;
        document.getElementById('item-price').value = item.price;
        document.getElementById('item-category').value = item.category;
        menuForm.style.display = 'block';
    };

    window.deleteMenuItem = function(index) {
        if (confirm('Are you sure you want to delete this item?')) {
            deleteMenuItem(index);
        }
    };

    // Initial render
    renderMenuItems();
});