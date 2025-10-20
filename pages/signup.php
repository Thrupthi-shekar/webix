<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - WebixApp</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://cdn.webix.com/edge/webix.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.webix.com/edge/webix.css">
</head>
<body>
    <div class="auth-shell">
        <div class="auth-card">
            <div class="auth-visual">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; z-index: 1;">
                    <h1 style="color: white; font-size: 2.5rem; margin: 0; text-shadow: 0 2px 4px rgba(0,0,0,0.5);">Welcome!</h1>
                    <p style="color: rgba(255,255,255,0.9); font-size: 1.1rem; margin: 10px 0 0;">Join our community today</p>
                </div>
            </div>
            <div class="auth-content">
                <h2 class="auth-title">Create Account</h2>
                <p class="auth-subtitle">Fill in your details to get started</p>
                
                <div id="signupForm"></div>
                
                <div class="row-inline" style="margin-top: 20px; justify-content: center;">
                    <button type="button" id="submitBtn" class="btn">Submit</button>
                    <a href="login.php" class="link">Already have an account? Login</a>
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
            // Create the signup form
            webix.ui({
                container: "signupForm",
                view: "form",
                id: "signupForm",
                elements: [
                    {
                        view: "text",
                        name: "name",
                        label: "Full Name",
                        placeholder: "Enter your full name",
                        required: true
                    },
                    {
                        view: "text",
                        name: "username",
                        label: "Username",
                        placeholder: "Choose a username",
                        required: true
                    },
                    {
                        view: "text",
                        name: "mobile",
                        label: "Mobile Number",
                        placeholder: "Enter 10-digit mobile number",
                        required: true
                    },
                    {
                        view: "datepicker",
                        name: "dob",
                        label: "Date of Birth",
                        placeholder: "Select your date of birth",
                        required: true,
                        format: "%Y-%m-%d",
                        suggest: { type: "calendar", body: { maxDate: new Date() } }
                    },
                    {
                        view: "text",
                        name: "age",
                        label: "Age",
                        placeholder: "Enter your age",
                        required: true
                    },
                    {
                        view: "text",
                        name: "email",
                        label: "Email",
                        placeholder: "Enter your email address",
                        required: true
                    },
                    {
                        view: "text",
                        name: "password",
                        label: "Password",
                        type: "password",
                        placeholder: "Create a strong password",
                        required: true
                    },
                    {
                        view: "select",
                        name: "graduation",
                        label: "Graduation Qualification",
                        placeholder: "Select your graduation",
                        required: true,
                        options: [
                            { id: "bs_cs", value: "BS Computer Science" },
                            { id: "bs_it", value: "BS Information Technology" },
                            { id: "bba", value: "BBA" },
                            { id: "bs_eng", value: "BS Engineering" },
                            { id: "ba", value: "BA" },
                            { id: "b_com", value: "B.Com" },
                            { id: "other", value: "Other" }
                        ]
                    },
                    {
                        view: "radio",
                        name: "masters_done",
                        label: "Have you done Masters?",
                        value: "no",
                        id: "masters_radio",
                        options: [
                            { id: "no", value: "No" },
                            { id: "yes", value: "Yes" }
                        ]
                    },
                    {
                        view: "select",
                        name: "masters_degree",
                        label: "Masters Degree",
                        placeholder: "Select your masters degree",
                        id: "masters_degree_select",
                        options: [
                            { id: "ms_cs", value: "MS Computer Science" },
                            { id: "ms_it", value: "MS Information Technology" },
                            { id: "mba", value: "MBA" },
                            { id: "ms_ds", value: "MS Data Science" },
                            { id: "ms_eng", value: "MS Engineering" }
                        ],
                        hidden: true
                    }
                ],
                rules: {
                    name: webix.rules.isNotEmpty,
                    username: webix.rules.isNotEmpty,
                    mobile: webix.rules.isNotEmpty,
                    dob: webix.rules.isNotEmpty,
                    email: webix.rules.isEmail,
                    password: webix.rules.isNotEmpty,
                    graduation: webix.rules.isNotEmpty,
                    masters_degree: function(value, data) {
                        // Only require masters_degree if masters_done is "yes"
                        if (data.masters_done === "yes" && !value) {
                            return "Please select your masters degree";
                        }
                        return true;
                    }
                }
            });

            // Wait for form to be ready, then attach events
            setTimeout(function() {
                // Handle masters radio button change using direct DOM events
                const mastersRadio = $$("masters_radio");
                if (mastersRadio) {
                    mastersRadio.attachEvent("onChange", function(newValue, oldValue) {
                        console.log("Masters radio changed from", oldValue, "to", newValue);
                        const mastersSelect = $$("masters_degree_select");
                        
                        if (newValue === "yes") {
                            console.log("Showing masters dropdown");
                            if (mastersSelect) {
                                mastersSelect.show();
                            }
                        } else {
                            console.log("Hiding masters dropdown");
                            if (mastersSelect) {
                                mastersSelect.hide();
                                mastersSelect.setValue("");
                            }
                        }
                    });
                }
                
                // No auto age calculation; user enters age manually

                // Handle form submission
                document.getElementById("submitBtn").addEventListener("click", function() {
                    const formData = $$("signupForm").getValues();
                    
                    // Basic validation
                    if (!formData.name || !formData.username || !formData.mobile || !formData.dob || !formData.email || !formData.password || !formData.graduation) {
                        webix.message("Please fill in all required fields", "error");
                        return;
                    }

                    // Check if masters is required
                    if (formData.masters_done === "yes" && !formData.masters_degree) {
                        webix.message("Please select your masters degree", "error");
                        return;
                    }

                    // Show loading
                    document.getElementById("loadingOverlay").style.display = "flex";

                    // Submit form via AJAX
                    webix.ajax().post("../auth/signup.php", formData, {
                        success: function(text, data, xhr) {
                            document.getElementById("loadingOverlay").style.display = "none";
                            const response = JSON.parse(text);
                        if (response.success) {
                            webix.message(response.message, "success");
                            setTimeout(function() {
                                window.location.href = "home.php";
                            }, 1500);
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
            }, 100);
        });
    </script>
</body>
</html>