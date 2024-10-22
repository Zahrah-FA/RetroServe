document.addEventListener('DOMContentLoaded', function() {
    const generateReportBtn = document.getElementById('generate-report');
    const reportType = document.getElementById('report-type');
    const dateFrom = document.getElementById('date-from');
    const dateTo = document.getElementById('date-to');
    const reportResult = document.getElementById('report-result');

    generateReportBtn.addEventListener('click', function() {
        const type = reportType.value;
        const from = new Date(dateFrom.value);
        const to = new Date(dateTo.value);

        if (type === 'menu') {
            generateMenuReport(from, to);
        } else if (type === 'order') {
            generateOrderReport(from, to);
        }
    });

    function generateMenuReport(from, to) {
        const menuItems = JSON.parse(localStorage.getItem('menuItems')) || [];
        const orders = JSON.parse(localStorage.getItem('orders')) || [];

        const filteredOrders = orders.filter(order => {
            const orderDate = new Date(order.date);
            return orderDate >= from && orderDate <= to;
        });

        const itemSales = {};
        menuItems.forEach(item => {
            itemSales[item.name] = 0;
        });

        filteredOrders.forEach(order => {
            order.items.forEach(itemIndex => {
                const item = menuItems[itemIndex];
                itemSales[item.name] += 1;
            });
        });

        let reportHTML = `
            <h2>Menu Report (${from.toDateString()} - ${to.toDateString()})</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity Sold</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>
        `;

        menuItems.forEach(item => {
            const quantitySold = itemSales[item.name];
            const totalSales = quantitySold * item.price;
            reportHTML += `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.category}</td>
                    <td>Rp ${item.price.toLocaleString('id-ID')}</td>
                    <td>${quantitySold}</td>
                    <td>Rp ${totalSales.toLocaleString('id-ID')}</td>
                </tr>
            `;
        });

        reportHTML += '</tbody></table>';
        reportResult.innerHTML = reportHTML;
    }

    function generateOrderReport(from, to) {
        const orders = JSON.parse(localStorage.getItem('orders')) || [];
        const menuItems = JSON.parse(localStorage.getItem('menuItems')) || [];

        const filteredOrders = orders.filter(order => {
            const orderDate = new Date(order.date);
            return orderDate >= from && orderDate <= to;
        });

        let reportHTML = `
            <h2>Order Report (${from.toDateString()} - ${to.toDateString()})</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
        `;

        filteredOrders.forEach(order => {
            reportHTML += `
                <tr>
                    <td>${order.id}</td>
                    <td>${order.customer}</td>
                    <td>${order.items.map(itemIndex => menuItems[itemIndex].name).join(', <br>')}</td>
                    <td>Rp ${order.total.toLocaleString('id-ID')}</td>
                    <td>${order.status}</td>
                    <td>${new Date(order.date).toLocaleString('id-ID')}</td>
                </tr>
            `;
        });

        reportHTML += '</tbody></table>';
        reportResult.innerHTML = reportHTML;
    }
});