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
