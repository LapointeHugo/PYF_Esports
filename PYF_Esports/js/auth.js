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
