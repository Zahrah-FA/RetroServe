document.addEventListener('DOMContentLoaded', function() {
    const menuItems = JSON.parse(localStorage.getItem('menuItems')) || [];
    const orders = JSON.parse(localStorage.getItem('orders')) || [];
    const orderTable = document.getElementById('order-items');
    const orderForm = document.getElementById('order-form');
    const orderItemForm = document.getElementById('order-item-form');
    const addOrderBtn = document.getElementById('add-order-btn');
    const cancelOrderBtn = document.getElementById('cancel-order-btn');
    const orderItemsSelect = document.getElementById('order-items');

    function updateOrderItemsSelect() {
        orderItemsSelect.innerHTML = '';
        menuItems.forEach((item, index) => {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = `${item.name} - Rp ${item.price.toLocaleString('id-ID')}`;
            orderItemsSelect.appendChild(option);
        });
    }

    function renderOrders() {
        orderTable.innerHTML = '';
        orders.forEach((order, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${order.id}</td>
                <td>${order.customer}</td>
                <td>${order.items.map(itemIndex => menuItems[itemIndex].name).join(', ')}</td>
                <td>Rp ${order.total.toLocaleString('id-ID')}</td>
                <td>${order.status}</td>
                <td>
                    <button onclick="editOrder(${index})" class="btn-secondary">Edit</button>
                    <button onclick="deleteOrder(${index})" class="btn-secondary">Delete</button>
                </td>
            `;
            orderTable.appendChild(row);
        });
        localStorage.setItem('orders', JSON.stringify(orders));
    }

    function addOrder(order) {
        order.id = orders.length + 1;
        orders.push(order);
        renderOrders();
    }

    function updateOrder(index, updatedOrder) {
        orders[index] = { ...orders[index], ...updatedOrder };
        renderOrders();
    }

    function deleteOrder(index) {
        orders.splice(index, 1);
        renderOrders();
    }

    addOrderBtn.addEventListener('click', () => {
        document.getElementById('order-form-title').textContent = 'Add New Order';
        orderForm.style.display = 'block';
        orderItemForm.reset();
        updateOrderItemsSelect();
    });

    cancelOrderBtn.addEventListener('click', () => {
        orderForm.style.display = 'none';
    });

    orderItemForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const id = document.getElementById('order-id').value;
        const customer = document.getElementById('order-customer').value;
        const items = Array.from(orderItemsSelect.selectedOptions).map(option => parseInt(option.value));
        const total = items.reduce((sum, itemIndex) => sum + menuItems[itemIndex].price, 0);
        const status = document.getElementById('order-status').value;

        if (id) {
            updateOrder(parseInt(id), { customer, items, total, status });
        } else {
            addOrder({ customer, items, total, status });
        }

        orderForm.style.display = 'none';
        orderItemForm.reset();
    });

    // Expose these functions globally for the onclick attributes
    window.editOrder = function(index) {
        const order = orders[index];
        document.getElementById('order-form-title').textContent = 'Edit Order';
        document.getElementById('order-id').value = index;
        document.getElementById('order-customer').value = order.customer;
        updateOrderItemsSelect();
        Array.from(orderItemsSelect.options).forEach(option => {
            option.selected = order.items.includes(parseInt(option.value));
        });
        document.getElementById('order-total').value = order.total;
        document.getElementById('order-status').value = order.status;
        orderForm.style.display = 'block';
    };

    window.deleteOrder = function(index) {
        if (confirm('Are you sure you want to delete this order?')) {
            deleteOrder(index);
        }
    };

    // Initial render
    updateOrderItemsSelect();
    renderOrders();
});