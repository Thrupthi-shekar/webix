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
    <title>Home - WebixApp</title>
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
                    <a href="#" class="nav-link active" data-page="home">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9,22 9,12 15,12 15,22"></polyline>
                        </svg>
                        Home
                    </a>
                    <a href="#" class="nav-link" data-page="about">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                        About
                    </a>
                    <a href="#" class="nav-link" data-page="contact">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        Contact
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="content" id="mainContent">
                <!-- Home Page Content -->
                <div id="homePage" class="page-content home-bg">
                    <div class="section">
                        <h2 style="margin-top: 0; color: var(--primary);">Welcome to ShopSphere Admin</h2>
                        <p>Hello <strong><?php echo htmlspecialchars($user['name']); ?></strong>, this dashboard gives you a quick overview of your e‑commerce store performance, catalog, and customer engagement.</p>
                        
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 30px;">
                            <div class="section" style="margin: 0;">
                                <h3 style="color: var(--accent); margin-top: 0;">Store Snapshot</h3>
                                <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                                    <span>Total Orders (30d):</span>
                                    <span style="color: var(--success);">1,248</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                                    <span>Revenue (30d):</span>
                                    <span style="color: var(--success);">$84,532</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                                    <span>Active Products:</span>
                                    <span>3,420</span>
                                </div>
                            </div>
                            
                            <div class="section" style="margin: 0;">
                                <h3 style="color: var(--accent); margin-top: 0;">Operational Feed</h3>
                                <div style="margin: 10px 0;">
                                    <div style="display: flex; align-items: center; margin: 8px 0;">
                                        <div style="width: 8px; height: 8px; background: var(--success); border-radius: 50%; margin-right: 10px;"></div>
                                        <span>New order #SO-11892 placed — $129.00</span>
                                    </div>
                                    <div style="display: flex; align-items: center; margin: 8px 0;">
                                        <div style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%; margin-right: 10px;"></div>
                                        <span>Inventory synced: 240 SKUs updated</span>
                                    </div>
                                    <div style="display: flex; align-items: center; margin: 8px 0;">
                                        <div style="width: 8px; height: 8px; background: var(--accent); border-radius: 50%; margin-right: 10px;"></div>
                                        <span>New review: “Great quality!” — 5★</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About Page Content -->
                <div id="aboutPage" class="page-content about-bg" style="display: none;">
                    <div class="section">
                        <h2 style="margin-top: 0; color: var(--primary);">About ShopSphere</h2>
                        <p>ShopSphere is a dummy e‑commerce admin built to showcase product management, order processing, promotions, and analytics in a clean, responsive interface.</p>
                        
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 30px;">
                            <div class="section" style="margin: 0;">
                                <h3 style="color: var(--accent); margin-top: 0;">Core Modules</h3>
                                <ul style="list-style: none; padding: 0;">
                                    <li style="margin: 10px 0; display: flex; align-items: center;">
                                        <span style="color: var(--primary); margin-right: 10px;">📦</span>
                                        Catalog — products, variants, collections, inventory
                                    </li>
                                    <li style="margin: 10px 0; display: flex; align-items: center;">
                                        <span style="color: var(--primary); margin-right: 10px;">🧾</span>
                                        Orders — checkout, payments, fulfillment, returns
                                    </li>
                                    <li style="margin: 10px 0; display: flex; align-items: center;">
                                        <span style="color: var(--primary); margin-right: 10px;">🏷️</span>
                                        Marketing — coupons, campaigns, recommendations
                                    </li>
                                    <li style="margin: 10px 0; display: flex; align-items: center;">
                                        <span style="color: var(--primary); margin-right: 10px;">📊</span>
                                        Analytics — sales trends, conversion, cohorts
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="section" style="margin: 0;">
                                <h3 style="color: var(--accent); margin-top: 0;">Sample Features</h3>
                                <ul style="list-style: none; padding: 0;">
                                    <li style="margin: 10px 0; display: flex; align-items: center;">
                                        <span style="color: var(--success); margin-right: 10px;">✓</span>
                                        Bulk product import via CSV/Excel
                                    </li>
                                    <li style="margin: 10px 0; display: flex; align-items: center;">
                                        <span style="color: var(--success); margin-right: 10px;">✓</span>
                                        Real‑time order status updates
                                    </li>
                                    <li style="margin: 10px 0; display: flex; align-items: center;">
                                        <span style="color: var(--success); margin-right: 10px;">✓</span>
                                        Discount rules and promotional banners
                                    </li>
                                    <li style="margin: 10px 0; display: flex; align-items: center;">
                                        <span style="color: var(--success); margin-right: 10px;">✓</span>
                                        Integrated reports & KPIs
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Contact Page Content -->
                <div id="contactPage" class="page-content" style="display: none;">
                    <div class="section">
                        <h2 style="margin-top: 0; color: var(--primary);">Contact & Feedback</h2>
                        <p>We'd love to hear from you! Send us a message and we'll respond as soon as possible.</p>
                        <div id="contactForm"></div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2024 WebixApp. Built with ❤️ using PHP, Webix, and modern CSS.</p>
        </footer>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay" style="display: none;">
        <div class="loading-spinner"></div>
    </div>

    <script src="../assets/js/webix-config.js"></script>
    <script>
        webix.ready(function() {
            // Sidebar toggle functionality
            const hamburger = document.getElementById('hamburger');
            const sidebar = document.getElementById('sidebar');
            const navLinks = document.querySelectorAll('.nav-link');
            const mainContent = document.getElementById('mainContent');
            const pages = document.querySelectorAll('.page-content');

            let sidebarOpen = true;

            hamburger.addEventListener('click', function() {
                sidebarOpen = !sidebarOpen;
                if (sidebarOpen) {
                    sidebar.classList.remove('collapsed');
                } else {
                    sidebar.classList.add('collapsed');
                }
            });

            // Navigation functionality
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    navLinks.forEach(l => l.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Hide all pages
                    pages.forEach(page => page.style.display = 'none');
                    
                    // Show selected page
                    const pageId = this.getAttribute('data-page') + 'Page';
                    const selectedPage = document.getElementById(pageId);
                    if (selectedPage) {
                        selectedPage.style.display = 'block';
                    }
                });
            });

            // Logout functionality
            document.getElementById('logoutBtn').addEventListener('click', function() {
                if (confirm('Are you sure you want to logout?')) {
                    window.location.href = '../auth/logout.php';
                }
            });

            // Create user details table
            const userData = <?php echo json_encode($user); ?>;
            
            webix.ui({
                container: "userDetailsTable",
                view: "datatable",
                columns: [
                    { id: "field", header: "Field", width: 200, css: "field_name" },
                    { id: "value", header: "Value", fillspace: true }
                ],
                data: [
                    { field: "Name", value: userData.name },
                    { field: "Username", value: userData.username },
                    { field: "Email", value: userData.email },
                    { field: "User ID", value: userData.id }
                ],
                css: "webix_dark",
                select: false,
                editable: false
            });

            // Create contact form
            webix.ui({
                container: "contactForm",
                view: "form",
                width: "100%",
                elements: [
                    {
                        view: "text",
                        name: "name",
                        label: "Your Name",
                        placeholder: "Enter your name",
                        required: true
                    },
                    {
                        view: "text",
                        name: "email",
                        label: "Email",
                        placeholder: "Enter your email",
                        required: true
                    },
                    {
                        view: "text",
                        name: "subject",
                        label: "Subject",
                        placeholder: "Enter subject",
                        required: true
                    },
                    {
                        view: "textarea",
                        name: "message",
                        label: "Message",
                        placeholder: "Enter your message",
                        required: true,
                        height: 120
                    },
                    {
                        view: "button",
                        value: "Send Message",
                        css: "webix_primary",
                        click: function() {
                            const form = this.getFormView();
                            const values = form.getValues();
                            
                            if (form.validate()) {
                                utils.showNotification("Thank you for your message! We'll get back to you soon.", "success");
                                form.clear();
                            }
                        }
                    }
                ],
                rules: {
                    name: webix.rules.isNotEmpty,
                    email: webix.rules.isEmail,
                    subject: webix.rules.isNotEmpty,
                    message: webix.rules.isNotEmpty
                }
            });

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