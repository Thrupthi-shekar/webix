# WebixApp Test Cases

This document outlines comprehensive test cases for verifying the functionality, security, and user experience of the WebixApp authentication system.

## 🧪 Test Environment Setup

### Prerequisites
- XAMPP running with Apache and MySQL
- Modern web browser (Chrome, Firefox, Safari, Edge)
- JavaScript enabled
- Network connection (for Webix CDN)

### Test Data
- Use the sample users provided in `database/schema.sql`
- Test password for all sample accounts: `TestPass123!`

## 📋 Test Categories

### 1. User Registration (Signup) Tests

#### 1.1 Valid Registration
**Test Case**: TC-SIGNUP-001
- **Objective**: Verify successful user registration with valid data
- **Steps**:
  1. Navigate to `/webixapp/pages/signup.php`
  2. Fill form with valid data:
     - Name: "Test User"
     - Username: "testuser123"
     - Mobile: "9876543210"
     - DOB: "1995-01-01"
     - Email: "test@example.com"
     - Password: "TestPass123!"
     - Graduation: "BS Computer Science"
     - Masters: "No"
  3. Click "Submit"
- **Expected Result**: Success message, redirect to login page
- **Status**: ✅ Pass / ❌ Fail

#### 1.2 Field Validation Tests

**Test Case**: TC-SIGNUP-002 - Name Validation
- **Objective**: Verify name field validation
- **Steps**:
  1. Enter invalid names: "", "A", "123", "Test@User"
  2. Submit form
- **Expected Result**: Validation error messages
- **Status**: ✅ Pass / ❌ Fail

**Test Case**: TC-SIGNUP-003 - Username Validation
- **Objective**: Verify username field validation
- **Steps**:
  1. Enter invalid usernames: "", "ab", "user@name", "user name"
  2. Submit form
- **Expected Result**: Validation error messages
- **Status**: ✅ Pass / ❌ Fail

**Test Case**: TC-SIGNUP-004 - Mobile Validation
- **Objective**: Verify mobile number validation
- **Steps**:
  1. Enter invalid mobile: "", "123", "123456789", "12345678901", "abc1234567"
  2. Submit form
- **Expected Result**: Validation error messages
- **Status**: ✅ Pass / ❌ Fail

**Test Case**: TC-SIGNUP-005 - Email Validation
- **Objective**: Verify email format validation
- **Steps**:
  1. Enter invalid emails: "", "test", "test@", "@example.com", "test@.com"
  2. Submit form
- **Expected Result**: Validation error messages
- **Status**: ✅ Pass / ❌ Fail

**Test Case**: TC-SIGNUP-006 - Password Validation
- **Objective**: Verify password strength validation
- **Steps**:
  1. Enter weak passwords: "", "123", "password", "Password", "Password123"
  2. Submit form
- **Expected Result**: Validation error messages
- **Status**: ✅ Pass / ❌ Fail

**Test Case**: TC-SIGNUP-007 - DOB Validation
- **Objective**: Verify date of birth validation
- **Steps**:
  1. Enter future dates: tomorrow, next year
  2. Submit form
- **Expected Result**: Validation error messages
- **Status**: ✅ Pass / ❌ Fail

#### 1.3 Conditional Field Tests

**Test Case**: TC-SIGNUP-008 - Masters Dropdown
- **Objective**: Verify masters dropdown appears when "Yes" selected
- **Steps**:
  1. Select "Yes" for masters question
  2. Verify masters dropdown appears
  3. Select "No" for masters question
  4. Verify masters dropdown hides
- **Expected Result**: Conditional field behavior works correctly
- **Status**: ✅ Pass / ❌ Fail

**Test Case**: TC-SIGNUP-009 - Age Auto-calculation
- **Objective**: Verify age auto-calculation from DOB
- **Steps**:
  1. Enter DOB: "1990-01-01"
  2. Verify age field updates automatically
- **Expected Result**: Age calculated correctly
- **Status**: ✅ Pass / ❌ Fail

#### 1.4 Duplicate Data Tests

**Test Case**: TC-SIGNUP-010 - Duplicate Username
- **Objective**: Verify duplicate username prevention
- **Steps**:
  1. Try to register with existing username: "johndoe"
  2. Submit form
- **Expected Result**: Error message about username already exists
- **Status**: ✅ Pass / ❌ Fail

**Test Case**: TC-SIGNUP-011 - Duplicate Email
- **Objective**: Verify duplicate email prevention
- **Steps**:
  1. Try to register with existing email: "john.doe@example.com"
  2. Submit form
- **Expected Result**: Error message about email already exists
- **Status**: ✅ Pass / ❌ Fail

### 2. User Authentication (Login) Tests

#### 2.1 Valid Login
**Test Case**: TC-LOGIN-001
- **Objective**: Verify successful login with valid credentials
- **Steps**:
  1. Navigate to `/webixapp/pages/login.php`
  2. Enter valid credentials: username "johndoe", password "TestPass123!"
  3. Click "Login"
- **Expected Result**: Success message, redirect to home page
- **Status**: ✅ Pass / ❌ Fail

#### 2.2 Invalid Login Tests

**Test Case**: TC-LOGIN-002 - Invalid Username
- **Objective**: Verify login failure with invalid username
- **Steps**:
  1. Enter invalid username: "nonexistent"
  2. Enter valid password: "TestPass123!"
  3. Click "Login"
- **Expected Result**: Error message about invalid credentials
- **Status**: ✅ Pass / ❌ Fail

**Test Case**: TC-LOGIN-003 - Invalid Password
- **Objective**: Verify login failure with invalid password
- **Steps**:
  1. Enter valid username: "johndoe"
  2. Enter invalid password: "wrongpassword"
  3. Click "Login"
- **Expected Result**: Error message about invalid credentials
- **Status**: ✅ Pass / ❌ Fail

**Test Case**: TC-LOGIN-004 - Empty Fields
- **Objective**: Verify validation for empty fields
- **Steps**:
  1. Leave username empty, enter password
  2. Leave password empty, enter username
  3. Leave both fields empty
  4. Submit form
- **Expected Result**: Validation error messages
- **Status**: ✅ Pass / ❌ Fail

### 3. Session Management Tests

#### 3.1 Session Creation
**Test Case**: TC-SESSION-001
- **Objective**: Verify session creation on successful login
- **Steps**:
  1. Login with valid credentials
  2. Check browser developer tools for session cookie
  3. Verify user data is stored in session
- **Expected Result**: Session cookie created, user data accessible
- **Status**: ✅ Pass / ❌ Fail

#### 3.2 Session Persistence
**Test Case**: TC-SESSION-002
- **Objective**: Verify session persists across page navigation
- **Steps**:
  1. Login successfully
  2. Navigate between different pages (Home, About, User Details, Contact)
  3. Verify user remains logged in
- **Expected Result**: User stays logged in across all pages
- **Status**: ✅ Pass / ❌ Fail

#### 3.3 Session Protection
**Test Case**: TC-SESSION-003
- **Objective**: Verify protected pages redirect when not logged in
- **Steps**:
  1. Open new browser window/incognito mode
  2. Try to access protected pages directly:
     - `/webixapp/pages/home.php`
     - `/webixapp/pages/user_details.php`
  3. Verify redirect to login page
- **Expected Result**: Automatic redirect to login page
- **Status**: ✅ Pass / ❌ Fail

### 4. Logout Tests

#### 4.1 Logout Functionality
**Test Case**: TC-LOGOUT-001
- **Objective**: Verify successful logout
- **Steps**:
  1. Login with valid credentials
  2. Click logout button in header
  3. Confirm logout in dialog
- **Expected Result**: Redirect to login page, session destroyed
- **Status**: ✅ Pass / ❌ Fail

#### 4.2 Logout Confirmation
**Test Case**: TC-LOGOUT-002
- **Objective**: Verify logout confirmation dialog
- **Steps**:
  1. Click logout button
  2. Click "Cancel" in confirmation dialog
- **Expected Result**: User remains logged in
- **Status**: ✅ Pass / ❌ Fail

### 5. Dashboard Navigation Tests

#### 5.1 Sidebar Toggle
**Test Case**: TC-NAV-001
- **Objective**: Verify sidebar toggle functionality
- **Steps**:
  1. Login and access home page
  2. Click hamburger menu button
  3. Verify sidebar collapses/expands
- **Expected Result**: Sidebar toggles smoothly with animation
- **Status**: ✅ Pass / ❌ Fail

#### 5.2 Navigation Links
**Test Case**: TC-NAV-002
- **Objective**: Verify navigation between pages
- **Steps**:
  1. Click each navigation link: Home, About, User Details, Contact
  2. Verify correct page loads
  3. Verify active link highlighting
- **Expected Result**: All navigation works correctly
- **Status**: ✅ Pass / ❌ Fail

#### 5.3 User Details Display
**Test Case**: TC-NAV-003
- **Objective**: Verify user details page displays correct information
- **Steps**:
  1. Navigate to User Details page
  2. Verify all user information is displayed correctly
  3. Check data formatting (dates, etc.)
- **Expected Result**: Complete and accurate user information displayed
- **Status**: ✅ Pass / ❌ Fail

### 6. Responsive Design Tests

#### 6.1 Mobile Responsiveness
**Test Case**: TC-RESP-001
- **Objective**: Verify mobile responsiveness
- **Steps**:
  1. Resize browser to mobile width (320px-768px)
  2. Test all pages and forms
  3. Verify sidebar behavior on mobile
- **Expected Result**: All elements adapt to mobile screen
- **Status**: ✅ Pass / ❌ Fail

#### 6.2 Tablet Responsiveness
**Test Case**: TC-RESP-002
- **Objective**: Verify tablet responsiveness
- **Steps**:
  1. Resize browser to tablet width (768px-1024px)
  2. Test navigation and forms
- **Expected Result**: Optimal layout for tablet screens
- **Status**: ✅ Pass / ❌ Fail

### 7. Security Tests

#### 7.1 SQL Injection Protection
**Test Case**: TC-SEC-001
- **Objective**: Verify SQL injection protection
- **Steps**:
  1. Try SQL injection in login form: `'; DROP TABLE users; --`
  2. Try SQL injection in signup form fields
- **Expected Result**: No SQL injection possible, proper error handling
- **Status**: ✅ Pass / ❌ Fail

#### 7.2 XSS Protection
**Test Case**: TC-SEC-002
- **Objective**: Verify XSS protection
- **Steps**:
  1. Try XSS in form fields: `<script>alert('XSS')</script>`
  2. Check if script executes or is escaped
- **Expected Result**: Scripts are escaped, not executed
- **Status**: ✅ Pass / ❌ Fail

#### 7.3 Password Security
**Test Case**: TC-SEC-003
- **Objective**: Verify password hashing
- **Steps**:
  1. Register new user
  2. Check database for password storage
- **Expected Result**: Password is hashed, not stored in plain text
- **Status**: ✅ Pass / ❌ Fail

### 8. Performance Tests

#### 8.1 Page Load Times
**Test Case**: TC-PERF-001
- **Objective**: Verify acceptable page load times
- **Steps**:
  1. Measure load times for all pages
  2. Test with slow network connection
- **Expected Result**: Pages load within 3 seconds
- **Status**: ✅ Pass / ❌ Fail

#### 8.2 Form Submission Performance
**Test Case**: TC-PERF-002
- **Objective**: Verify form submission performance
- **Steps**:
  1. Submit signup and login forms
  2. Measure response times
- **Expected Result**: Form submissions complete within 2 seconds
- **Status**: ✅ Pass / ❌ Fail

### 9. Browser Compatibility Tests

#### 9.1 Cross-Browser Testing
**Test Case**: TC-BROWSER-001
- **Objective**: Verify compatibility across browsers
- **Steps**:
  1. Test in Chrome, Firefox, Safari, Edge
  2. Verify all functionality works
- **Expected Result**: Consistent behavior across browsers
- **Status**: ✅ Pass / ❌ Fail

### 10. Error Handling Tests

#### 10.1 Database Connection Error
**Test Case**: TC-ERROR-001
- **Objective**: Verify graceful handling of database errors
- **Steps**:
  1. Stop MySQL service
  2. Try to access application
- **Expected Result**: Graceful error message, no crashes
- **Status**: ✅ Pass / ❌ Fail

#### 10.2 Network Error Handling
**Test Case**: TC-ERROR-002
- **Objective**: Verify handling of network issues
- **Steps**:
  1. Disconnect internet (for Webix CDN)
  2. Try to access application
- **Expected Result**: Graceful degradation or error message
- **Status**: ✅ Pass / ❌ Fail

## 📊 Test Results Summary

| Test Category | Total Tests | Passed | Failed | Pass Rate |
|---------------|-------------|--------|--------|-----------|
| Registration | 11 | ___ | ___ | ___% |
| Authentication | 4 | ___ | ___ | ___% |
| Session Management | 3 | ___ | ___ | ___% |
| Logout | 2 | ___ | ___ | ___% |
| Navigation | 3 | ___ | ___ | ___% |
| Responsive Design | 2 | ___ | ___ | ___% |
| Security | 3 | ___ | ___ | ___% |
| Performance | 2 | ___ | ___ | ___% |
| Browser Compatibility | 1 | ___ | ___ | ___% |
| Error Handling | 2 | ___ | ___ | ___% |
| **TOTAL** | **33** | **___** | **___** | **___%** |

## 🐛 Bug Reporting

When reporting bugs, include:
1. Test case ID
2. Steps to reproduce
3. Expected vs actual results
4. Browser and version
5. Screenshots if applicable

## 📝 Test Notes

- All tests should be performed in a clean environment
- Clear browser cache between test sessions
- Use different browsers for cross-browser testing
- Document any environment-specific issues
- Update test results as bugs are fixed

---

**Last Updated**: December 2024  
**Test Environment**: XAMPP, PHP 8+, MySQL 5.7+  
**Browsers Tested**: Chrome, Firefox, Safari, Edge



