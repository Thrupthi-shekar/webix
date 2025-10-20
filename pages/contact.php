<?php
require_once '../includes/auth_check.php';
require_auth();

$user = current_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - WebixApp</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://cdn.webix.com/edge/webix.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.webix.com/edge/webix.css">
</head>
<body>
    <div class="app-shell">
        <!-- Header -->
        <header class="app-header">
            <div class="app-title">
                <div class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h1 style="margin: 0; font-size: 1.5rem;">WebixApp</h1>
            </div>
            <div class="userbox">
                <div class="avatar"></div>
                <div>
                    <div style="font-size: 0.9rem; font-weight: 600;"><?php echo htmlspecialchars($user['name']); ?></div>
                    <div style="font-size: 0.8rem; color: var(--muted);">@<?php echo htmlspecialchars($user['username']); ?></div>
                </div>
                <div class="logout" id="logoutBtn" title="Logout">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16,17 21,12 16,7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                </div>
            </div>
        </header>

        <!-- Main Body -->
        <div class="app-body">
            <!-- Sidebar -->
            <aside class="sidebar" id="sidebar">
                <nav>
                    <a href="home.php" class="nav-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9,22 9,12 15,12 15,22"></polyline>
                        </svg>
                        Home
                    </a>
                    <a href="about.php" class="nav-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                        About
                    </a>
                    <a href="#" class="nav-link active">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        Contact
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="content">
                <div class="section">
                    <h2 style="margin-top: 0; color: var(--primary);">Contact & Feedback</h2>
                    <p>We'd love to hear from you! Send us a message and we'll respond as soon as possible.</p>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 30px;" class="contact-grid">
                        <!-- Contact Form -->
                        <div>
                            <h3 style="color: var(--accent); margin-top: 0;">Send us a Message</h3>
                            <form style="display: flex; flex-direction: column; gap: 15px;">
                                <div>
                                    <label style="display: block; margin-bottom: 5px; color: var(--text); font-weight: 600;">Your Name</label>
                                    <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" readonly 
                                           style="width: 100%; padding: 12px; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; background: rgba(17,24,39,0.8); color: var(--text);">
                                </div>
                                <div>
                                    <label style="display: block; margin-bottom: 5px; color: var(--text); font-weight: 600;">Email</label>
                                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly 
                                           style="width: 100%; padding: 12px; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; background: rgba(17,24,39,0.8); color: var(--text);">
                                </div>
                                <div>
                                    <label style="display: block; margin-bottom: 5px; color: var(--text); font-weight: 600;">Subject</label>
                                    <select name="subject" required 
                                            style="width: 100%; padding: 12px; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; background: rgba(17,24,39,0.8); color: var(--text);">
                                        <option value="">Select a subject</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="support">Technical Support</option>
                                        <option value="feedback">Feedback</option>
                                        <option value="bug">Bug Report</option>
                                        <option value="feature">Feature Request</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display: block; margin-bottom: 5px; color: var(--text); font-weight: 600;">Priority</label>
                                    <select name="priority" style="width: 100%; padding: 12px; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; background: rgba(17,24,39,0.8); color: var(--text);">
                                        <option value="medium">Medium</option>
                                        <option value="low">Low</option>
                                        <option value="high">High</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display: block; margin-bottom: 5px; color: var(--text); font-weight: 600;">Message</label>
                                    <textarea name="message" required rows="5" placeholder="Enter your message here..." 
                                              style="width: 100%; padding: 12px; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; background: rgba(17,24,39,0.8); color: var(--text); resize: vertical;"></textarea>
                                </div>
                                <button type="button" onclick="handleContactSubmit()" class="btn" style="align-self: flex-start;">
                                    Send Message
                                </button>
                            </form>
                        </div>
                        
                        <!-- Contact Information -->
                        <div>
                            <h3 style="color: var(--accent); margin-top: 0;">Get in Touch</h3>
                            <div style="display: flex; flex-direction: column; gap: 20px;">
                                <div style="display: flex; align-items: center; padding: 15px; background: rgba(34,211,238,0.1); border-radius: 8px; border-left: 4px solid var(--primary);">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary), var(--accent)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600;">Email</div>
                                        <div style="font-size: 0.9rem; color: var(--muted);">contact@webixapp.com</div>
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-items: center; padding: 15px; background: rgba(167,139,250,0.1); border-radius: 8px; border-left: 4px solid var(--accent);">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--accent), var(--primary)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600;">Phone</div>
                                        <div style="font-size: 0.9rem; color: var(--muted);">+1 (555) 123-4567</div>
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-items: center; padding: 15px; background: rgba(16,185,129,0.1); border-radius: 8px; border-left: 4px solid var(--success);">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--success), var(--primary)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600;">Address</div>
                                        <div style="font-size: 0.9rem; color: var(--muted);">123 Web Street, Tech City, TC 12345</div>
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-items: center; padding: 15px; background: rgba(245,158,11,0.1); border-radius: 8px; border-left: 4px solid var(--warning);">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--warning), var(--primary)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12,6 12,12 16,14"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600;">Business Hours</div>
                                        <div style="font-size: 0.9rem; color: var(--muted);">Mon - Fri: 9:00 AM - 6:00 PM</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Social Media Links -->
                            <div style="margin-top: 30px;">
                                <h4 style="color: var(--accent); margin-bottom: 15px;">Follow Us</h4>
                                <div style="display: flex; gap: 15px;">
                                    <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: linear-gradient(135deg, #1877f2, #42a5f5); border-radius: 50%; color: white; text-decoration: none;" title="Facebook">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                    </a>
                                    <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: linear-gradient(135deg, #1da1f2, #42a5f5); border-radius: 50%; color: white; text-decoration: none;" title="Twitter">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                        </svg>
                                    </a>
                                    <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: linear-gradient(135deg, #0077b5, #42a5f5); border-radius: 50%; color: white; text-decoration: none;" title="LinkedIn">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                        </svg>
                                    </a>
                                    <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: linear-gradient(135deg, #e1306c, #fd1d1d); border-radius: 50%; color: white; text-decoration: none;" title="Instagram">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2024 WebixApp. Built with ❤️ using PHP, Webix, and modern CSS.</p>
        </footer>
    </div>

    <script src="../assets/js/webix-config.js"></script>
    <script>
        webix.ready(function() {
            // Sidebar toggle functionality
            const hamburger = document.getElementById('hamburger');
            const sidebar = document.getElementById('sidebar');

            let sidebarOpen = true;

            hamburger.addEventListener('click', function() {
                sidebarOpen = !sidebarOpen;
                if (sidebarOpen) {
                    sidebar.classList.remove('collapsed');
                } else {
                    sidebar.classList.add('collapsed');
                }
            });

            // Logout functionality
            document.getElementById('logoutBtn').addEventListener('click', function() {
                if (confirm('Are you sure you want to logout?')) {
                    window.location.href = '../auth/logout.php';
                }
            });

            // Contact form handler
            window.handleContactSubmit = function() {
                const form = document.querySelector('form');
                const formData = new FormData(form);
                
                // Basic validation
                if (!formData.get('subject') || !formData.get('message')) {
                    alert('Please fill in all required fields');
                    return;
                }
                
                // Show loading
                const button = document.querySelector('button[onclick="handleContactSubmit()"]');
                const originalText = button.textContent;
                button.textContent = 'Sending...';
                button.disabled = true;
                
                // Simulate sending message
                setTimeout(function() {
                    button.textContent = originalText;
                    button.disabled = false;
                    alert("Thank you for your message! We'll get back to you within 24 hours.");
                    form.reset();
                }, 2000);
            };

            // Responsive sidebar handling
            function handleResize() {
                if (window.innerWidth <= 768) {
                    sidebar.classList.add('collapsed');
                    sidebarOpen = false;
                } else {
                    sidebar.classList.remove('collapsed');
                    sidebarOpen = true;
                }
            }

            window.addEventListener('resize', handleResize);
            handleResize(); // Initial call
        });
    </script>
</body>
</html>