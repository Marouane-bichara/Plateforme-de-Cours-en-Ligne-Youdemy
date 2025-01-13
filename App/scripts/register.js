function toggleForm() {
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const toggleLink = document.getElementById("toggle-link");
    let tite = document.querySelector(".tite");
    let signuptext = document.querySelector(".signuptext");

    if (loginForm.classList.contains("hidden")) {
    loginForm.classList.remove("hidden");
    registerForm.classList.add("hidden");
    tite.textContent = "Welcome Back!";
    signuptext.textContent = "Please sign in to continue.";
    toggleLink.textContent = "Don't have an account? Sign Up";
    } else {
    loginForm.classList.add("hidden");
    registerForm.classList.remove("hidden");
    tite.textContent = "Great to have you with us!";
    signuptext.textContent = "Please sign up to continue.";
    toggleLink.textContent = "Already have an account? Sign In";
    }
}