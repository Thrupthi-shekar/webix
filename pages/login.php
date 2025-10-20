<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WebixApp</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://cdn.webix.com/edge/webix.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.webix.com/edge/webix.css">
</head>
<body>
    <div class="auth-shell">
        <div class="auth-card">
            <div class="auth-visual">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; z-index: 1;">
                    <h1 style="color: white; font-size: 2.5rem; margin: 0; text-shadow: 0 2px 4px rgba(0,0,0,0.5);">Welcome Back!</h1>
                    <p style="color: rgba(255,255,255,0.9); font-size: 1.1rem; margin: 10px 0 0;">Sign in to your account</p>
                </div>
            </div>
            <div class="auth-content">
                <h2 class="auth-title">Sign In</h2>
                <p class="auth-subtitle">Enter your credentials to access your account</p>
                
                <div id="loginForm"></div>
                
                <div class="row-inline" style="margin-top: 20px; justify-content: center;">
                    <button type="button" id="loginBtn" class="btn">Login</button>
                    <a href="signup.php" class="link">Don't have an account? Signup</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay" style="display: none;">
        <div class="loading-spinner"></div>
    </div>

    <script src="../assets/js/webix-config.js"></script>
    <script src="../assets/js/validation.js"></script>
    <script>
        webix.ready(function() {
            // Create the login form
            const loginForm = webix.ui({
                container: "loginForm",
                view: "form",
                id: "loginForm",
                elements: [
                    {
                        view: "text",
                        name: "username",
                        label: "Username",
                        placeholder: "Enter your username",
                        required: true
                    },
                    {
                        view: "text",
                        name: "password",
                        label: "Password",
                        type: "password",
                        placeholder: "Enter your password",
                        required: true
                    }
                ],
                rules: {
                    username: webix.rules.isNotEmpty,
                    password: webix.rules.isNotEmpty
                }
            });

            // Wait for form to be ready, then attach events
            setTimeout(function() {
                // Handle form submission
                document.getElementById("loginBtn").addEventListener("click", function() {
                    const formData = $$("loginForm").getValues();
                    
                    // Basic validation
                    if (!formData.username || !formData.password) {
                        webix.message("Please fill in all fields", "error");
                        return;
                    }

                    // Show loading
                    document.getElementById("loadingOverlay").style.display = "flex";

                    // Submit form via AJAX
                    webix.ajax().post("../auth/login.php", formData, {
                        success: function(text, data, xhr) {
                            document.getElementById("loadingOverlay").style.display = "none";
                            const response = JSON.parse(text);
                            if (response.success) {
                                webix.message("Login successful! Redirecting...", "success");
                                setTimeout(function() {
                                    window.location.href = "home.php";
                                }, 1000);
                            } else {
                                webix.message(response.message, "error");
                            }
                        },
                        error: function(text, data, xhr) {
                            document.getElementById("loadingOverlay").style.display = "none";
                            webix.message("An error occurred. Please try again.", "error");
                        }
                    });
                });

                // Allow Enter key to submit form
                $$("loginForm").attachEvent("onEnter", function() {
                    document.getElementById("loginBtn").click();
                });
            }, 100);
        });
    </script>
</body>
</html>