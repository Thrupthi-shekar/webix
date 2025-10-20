// Client-side Validation Functions
(function() {
    'use strict';
    
    // Validation rules
    const rules = {
        email: {
            pattern: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
            message: "Please enter a valid email address"
        },
        mobile: {
            pattern: /^\d{10}$/,
            message: "Mobile number must be exactly 10 digits"
        },
        password: {
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
            message: "Password must be at least 8 characters with uppercase, lowercase, number, and special character"
        },
        username: {
            pattern: /^[a-zA-Z0-9_]{3,20}$/,
            message: "Username must be 3-20 characters (letters, numbers, underscore only)"
        },
        name: {
            pattern: /^[a-zA-Z\s]{2,50}$/,
            message: "Name must be 2-50 characters (letters and spaces only)"
        }
    };
    
    // Validation functions
    window.clientValidation = {
        // Validate email format
        validateEmail: function(email) {
            if (!email) return { valid: false, message: "Email is required" };
            if (!rules.email.pattern.test(email)) {
                return { valid: false, message: rules.email.message };
            }
            return { valid: true };
        },
        
        // Validate mobile number
        validateMobile: function(mobile) {
            if (!mobile) return { valid: false, message: "Mobile number is required" };
            if (!rules.mobile.pattern.test(mobile)) {
                return { valid: false, message: rules.mobile.message };
            }
            return { valid: true };
        },
        
        // Validate password strength
        validatePassword: function(password) {
            if (!password) return { valid: false, message: "Password is required" };
            if (!rules.password.pattern.test(password)) {
                return { valid: false, message: rules.password.message };
            }
            return { valid: true };
        },
        
        // Validate username
        validateUsername: function(username) {
            if (!username) return { valid: false, message: "Username is required" };
            if (!rules.username.pattern.test(username)) {
                return { valid: false, message: rules.username.message };
            }
            return { valid: true };
        },
        
        // Validate name
        validateName: function(name) {
            if (!name) return { valid: false, message: "Name is required" };
            if (!rules.name.pattern.test(name)) {
                return { valid: false, message: rules.name.message };
            }
            return { valid: true };
        },
        
        // Validate date of birth
        validateDOB: function(dob) {
            if (!dob) return { valid: false, message: "Date of birth is required" };
            const birthDate = new Date(dob);
            const today = new Date();
            
            if (isNaN(birthDate.getTime())) {
                return { valid: false, message: "Please enter a valid date" };
            }
            
            if (birthDate > today) {
                return { valid: false, message: "Date of birth cannot be in the future" };
            }
            
            // Check if age is reasonable (not more than 120 years)
            const age = today.getFullYear() - birthDate.getFullYear();
            if (age > 120) {
                return { valid: false, message: "Please enter a valid date of birth" };
            }
            
            return { valid: true };
        },
        
        // Validate age (auto-calculated from DOB)
        validateAge: function(age) {
            if (!age || age < 0 || age > 120) {
                return { valid: false, message: "Age must be between 0 and 120" };
            }
            return { valid: true };
        },
        
        // Validate graduation selection
        validateGraduation: function(graduation) {
            if (!graduation) return { valid: false, message: "Please select your graduation qualification" };
            return { valid: true };
        },
        
        // Validate masters degree (if masters_done is yes)
        validateMasters: function(mastersDone, mastersDegree) {
            if (mastersDone === 'yes' && !mastersDegree) {
                return { valid: false, message: "Please select your masters degree" };
            }
            return { valid: true };
        },
        
        // Validate entire signup form
        validateSignupForm: function(formData) {
            const errors = [];
            
            // Validate all fields
            const nameValidation = this.validateName(formData.name);
            if (!nameValidation.valid) errors.push(nameValidation.message);
            
            const usernameValidation = this.validateUsername(formData.username);
            if (!usernameValidation.valid) errors.push(usernameValidation.message);
            
            const mobileValidation = this.validateMobile(formData.mobile);
            if (!mobileValidation.valid) errors.push(mobileValidation.message);
            
            const dobValidation = this.validateDOB(formData.dob);
            if (!dobValidation.valid) errors.push(dobValidation.message);
            
            const emailValidation = this.validateEmail(formData.email);
            if (!emailValidation.valid) errors.push(emailValidation.message);
            
            const passwordValidation = this.validatePassword(formData.password);
            if (!passwordValidation.valid) errors.push(passwordValidation.message);
            
            const graduationValidation = this.validateGraduation(formData.graduation);
            if (!graduationValidation.valid) errors.push(graduationValidation.message);
            
            const mastersValidation = this.validateMasters(formData.masters_done, formData.masters_degree);
            if (!mastersValidation.valid) errors.push(mastersValidation.message);
            
            return {
                valid: errors.length === 0,
                errors: errors
            };
        },
        
        // Validate login form
        validateLoginForm: function(formData) {
            const errors = [];
            
            if (!formData.username) errors.push("Username is required");
            if (!formData.password) errors.push("Password is required");
            
            return {
                valid: errors.length === 0,
                errors: errors
            };
        }
    };
    
    // Real-time validation for form fields
    window.setupRealTimeValidation = function(formId) {
        const form = $$(formId);
        if (!form) return;
        
        // Add validation on field change
        form.attachEvent("onChange", function(id, value) {
            let validation = { valid: true };
            
            switch(id) {
                case 'email':
                    validation = clientValidation.validateEmail(value);
                    break;
                case 'mobile':
                    validation = clientValidation.validateMobile(value);
                    break;
                case 'password':
                    validation = clientValidation.validatePassword(value);
                    break;
                case 'username':
                    validation = clientValidation.validateUsername(value);
                    break;
                case 'name':
                    validation = clientValidation.validateName(value);
                    break;
                case 'dob':
                    validation = clientValidation.validateDOB(value);
                    // Auto-calculate age when DOB changes
                    if (validation.valid && value) {
                        const age = utils.calculateAge(value);
                        form.setValues({ age: age });
                    }
                    break;
            }
            
            // Show validation message
            if (!validation.valid) {
                form.setInvalid(id, validation.message);
            } else {
                form.clearInvalid(id);
            }
        });
    };
})();



