// Admin Login
if (document.getElementById('form-login')) {
    document.getElementById('form-login').addEventListener('submit', async (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);

        try {
            const response = await fetch('/auth', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();

            if (data.success) {
                window.location.href = '/admin';
            } else {
                alert('Invalid username or password');
            }

        } catch (error) {
            console.log(error);
        }
    });
}

// Admin Logout
if (document.getElementById('logout')) {
    document.getElementById('logout').addEventListener('click', async () => {
        try {
            const response = await fetch('/auth', {
                method: 'DELETE'
            });
            const data = await response.json();

            if (data.success) {
                window.location.href = '/home';
            }

        } catch (error) {
            console.log(error);
        }
    });
}
