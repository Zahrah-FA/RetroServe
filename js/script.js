document.addEventListener('DOMContentLoaded', function() {
    const message = localStorage.getItem('snackbarMessage');


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
