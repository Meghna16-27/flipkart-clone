//han
const categoriesBar = document.querySelector('.outline');
    const contentScroll = document.querySelector('.content-scroll');

    contentScroll.addEventListener('scroll', () => {
        categoriesBar.classList.toggle('hide-icons', contentScroll.scrollTop > 10);
    });


//  <!-- JS TO HANDLE UI CHANGES -->
 
        const heading = document.getElementById('panel-heading');
        const subtext = document.getElementById('panel-subtext');
        const submitBtn = document.getElementById('submit-btn');
        const actionType = document.getElementById('action_type');
        const toggleBtn = document.getElementById('toggle-auth-btn');
        const statusBanner = document.getElementById('status-banner');

        // Function to switch to Sign Up UI
        function switchToSignUp(message = '') {
            heading.innerText = "Looks like you're new here!";
            subtext.innerText = "Sign up with your email to get started";
            submitBtn.innerText = "Sign Up";
            actionType.value = "signup";
            toggleBtn.innerText = "Existing User? Log in";

            if (message) {
                statusBanner.style.backgroundColor = "#ff9800";
                statusBanner.innerText = message;
                statusBanner.style.display = "block";
            }
        }

        // Function to switch back to Login UI
        function switchToLogin() {
            heading.innerText = "Login";
            subtext.innerText = "Get access to your Orders, Wishlist and Recommendations";
            submitBtn.innerText = "Login";
            actionType.value = "login";
            toggleBtn.innerText = "New to Flipkart? Create an account";
            statusBanner.style.display = "none";
        }

        // 1. Check URL parameters on page load (when redirected from backend)
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('status') === 'not_registered') {
            switchToSignUp("You are not registered yet! Click Sign Up below to create an account.");
        }

        // 2. Toggle UI when user manually clicks footer link
        toggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (actionType.value === 'login') {
                switchToSignUp();
            } else {
                switchToLogin();
            }
        });
