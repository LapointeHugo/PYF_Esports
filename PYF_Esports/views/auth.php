<div class="container row justify-content-around">
    <div class="col-5 d-none d-lg-block d-xl-block d-xxl-block">
        <h2 class="centerLoginRight">Admin Login</h2>
        <p style="text-align: justify">Welcome to the admin login page. We're currently working on implementing a login
            system for regular users, but it's not available yet. Stay tuned for updates!
            Meanwhile, if you're an admin, please proceed with your credentials.</p>
            <br>
        <div class="row justify-content-around">
            <img src="/../images/Cypher.webp" class="col-5">
            <img src="/../images/Kj.webp" class="col-5">
        </div>
    </div>
    <div class="col-12 col-lg-5 col-xl-5 col-xxl-5 centerLoginRight">
        <h2 class="centerLoginRight">Login</h2>
        <p>Welcome!</p>
        <br>
        <form id="form-login">
            <div class="group">
                <input name="username" id="admin-username" type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="username">Username</label>
            </div>
            <div class="group">
                <input name="password" id="admin-pass" type="password" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="password">Password</label>
            </div>
            <button id="button-signin" type="submit" class="button-blue-action">Log In</button>
        </form>
    </div>
</div>
