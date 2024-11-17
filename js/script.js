document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const registerContainer = document.getElementById('registerContainer');
    const showRegisterLink = document.getElementById('showRegister');
    const showLoginLink = document.getElementById('showLogin');
    const message = localStorage.getItem('snackbarMessage');

    // Toggle between Login and Register Forms
    if (showRegisterLink && showLoginLink) {
        showRegisterLink.addEventListener('click', function(e) {
            e.preventDefault();
            loginForm.closest('.auth-container').style.display = 'none';
            registerContainer.style.display = 'block';
        });

        showLoginLink.addEventListener('click', function(e) {
            e.preventDefault();
            registerContainer.style.display = 'none';
            loginForm.closest('.auth-container').style.display = 'block';
        });
    }

    // Show snackbar
    function showSnackbar(message) {
        const snackbar = document.getElementById('snackbar');
        snackbar.textContent = message;
        snackbar.className = "show";

        setTimeout(function() {
            snackbar.className = snackbar.className.replace("show", "");
        }, 3000); // Hide after 3 seconds
    }
    // Snackbar dari pesan login atau registrasi berhasil
    if (message) {
        showSnackbar(message);
        localStorage.removeItem('snackbarMessage'); // Hapus setelah ditampilkan
    }


    // Handle Login Form Submission
    // if (loginForm) {
    //     loginForm.addEventListener('submit', function(e) {
    //         e.preventDefault();
    //         const name = document.getElementById('loginName').value;
    //         const password = document.getElementById('loginPassword').value;

    //         // Simulate login check (you would replace this with actual server-side validation)
    //         if (name === "admin" && password === "1234") {
    //             // Save success message in localStorage
    //             localStorage.setItem('snackbarMessage', 'Login successful!');
    //             window.location.href = 'dashboard.php'; // Redirect to dashboard
    //         } else {
    //             showSnackbar('Login failed! Please check your credentials.');
    //         }
    //     });
    // }

    // Handle Register Form Submission
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('registerName').value;
            const password = document.getElementById('registerPassword').value;
            const email = document.getElementById('registerEmail').value;

            if (name && password && email) {
                // Save success message in localStorage
                localStorage.setItem('snackbarMessage', 'Registration successful! Please log in.');
                registerForm.style.display = 'none';
                loginForm.closest('.auth-container').style.display = 'block'; // Show login form after registration
            } else {
                showSnackbar('Registration failed! Please fill in all fields.');
            }
        });
    }

    // Show snackbar message on dashboard or any other page after redirect
    if (message) {
        showSnackbar(message);
        localStorage.removeItem('snackbarMessage'); // Clear message after displaying
    }

    // Dashboard functionality (if on the dashboard page)
    if (document.querySelector('.dashboard')) {
        // Update current date
        const dateElement = document.querySelector('.date');
        if (dateElement) {
            const currentDate = new Date();
            dateElement.textContent = currentDate.toLocaleDateString('id-ID', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
        }

        // Simulate updating dashboard data (this would normally come from the server)
        function updateDashboardData() {
            const totalSales = Math.floor(Math.random() * 1000000);
            document.querySelector('.stat-value').textContent = `Rp ${totalSales.toLocaleString('id-ID')}`;
        }

        // Call updateDashboardData every 5 seconds to simulate real-time updates
        updateDashboardData();
        setInterval(updateDashboardData, 5000);
    }

    // Add active class to current nav item (dashboard sidebar)
    const navItems = document.querySelectorAll('.sidebar nav ul li a');
    navItems.forEach(item => {
        item.addEventListener('click', function() {
            navItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
