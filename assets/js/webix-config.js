// Webix Configuration and Common UI Functions
webix.ready(function() {
    // Set global Webix theme
    webix.ui.theme = "material";
    
    // Common form validation patterns
    window.validationPatterns = {
        email: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
        mobile: /^\d{10}$/,
        password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
    };
    
    // Common form elements
    window.commonElements = {
        // Graduation options
        graduationOptions: [
            { id: "bs_cs", value: "BS Computer Science" },
            { id: "bs_it", value: "BS Information Technology" },
            { id: "bba", value: "BBA" },
            { id: "bs_eng", value: "BS Engineering" },
            { id: "ba", value: "BA" },
            { id: "b_com", value: "B.Com" },
            { id: "other", value: "Other" }
        ],
        
        // Masters options
        mastersOptions: [
            { id: "ms_cs", value: "MS Computer Science" },
            { id: "ms_it", value: "MS Information Technology" },
            { id: "mba", value: "MBA" },
            { id: "ms_ds", value: "MS Data Science" },
            { id: "ms_eng", value: "MS Engineering" }
        ]
    };
    
    // Utility functions
    window.utils = {
        // Calculate age from date of birth
        calculateAge: function(dob) {
            if (!dob) return 0;
            const today = new Date();
            const birthDate = new Date(dob);
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        },
        
        // Format date for display
        formatDate: function(date) {
            if (!date) return '';
            return new Date(date).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        },
        
        // Show notification
        showNotification: function(message, type = 'info') {
            webix.message({
                text: message,
                type: type,
                expire: 3000
            });
        }
    };
});

// Common form validation functions
window.validateForm = {
    email: function(value) {
        return validationPatterns.email.test(value);
    },
    
    mobile: function(value) {
        return validationPatterns.mobile.test(value);
    },
    
    password: function(value) {
        return validationPatterns.password.test(value);
    },
    
    dob: function(value) {
        if (!value) return false;
        const dob = new Date(value);
        const today = new Date();
        return dob <= today;
    },
    
    required: function(value) {
        return value && value.trim().length > 0;
    }
};
