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
    <title>About - WebixApp</title>
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
                    <a href="#" class="nav-link active">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                        About
                    </a>
                    <a href="contact.php" class="nav-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        Contact
                    </a>
      </nav>
    </aside>

            <!-- Main Content -->
            <main class="content about-bg">
                <div class="section">
                    <h2 style="margin-top: 0; color: var(--primary);">About ShopSphere (Demo)</h2>
                    <p>ShopSphere is a demo e‑commerce platform concept. It highlights a clean admin UX for managing products, orders, promotions and analytics so merchants can grow with confidence.</p>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 30px;">
                        <div class="section" style="margin: 0;">
                            <h3 style="color: var(--accent); margin-top: 0;">What You Can Manage</h3>
                            <div style="display: flex; flex-direction: column; gap: 15px;">
                                <div style="display: flex; align-items: center; padding: 10px; background: rgba(34,211,238,0.1); border-radius: 8px; border-left: 4px solid var(--primary);">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary), var(--accent)); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                        <span style="color: white; font-weight: bold;">CAT</span>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600;">Catalog</div>
                                        <div style="font-size: 0.9rem; color: var(--muted);">Products, variants, categories, collections, inventory</div>
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-items: center; padding: 10px; background: rgba(167,139,250,0.1); border-radius: 8px; border-left: 4px solid var(--accent);">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--accent), var(--primary)); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                        <span style="color: white; font-weight: bold;">ORD</span>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600;">Orders</div>
                                        <div style="font-size: 0.9rem; color: var(--muted);">Checkout, payments, shipping, returns</div>
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-items: center; padding: 10px; background: rgba(16,185,129,0.1); border-radius: 8px; border-left: 4px solid var(--success);">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--success), var(--primary)); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                        <span style="color: white; font-weight: bold;">MKT</span>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600;">Marketing</div>
                                        <div style="font-size: 0.9rem; color: var(--muted);">Coupons, email campaigns, cross‑sell widgets</div>
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-items: center; padding: 10px; background: rgba(245,158,11,0.1); border-radius: 8px; border-left: 4px solid var(--warning);">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--warning), var(--primary)); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                        <span style="color: white; font-weight: bold;">ANL</span>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600;">Analytics</div>
                                        <div style="font-size: 0.9rem; color: var(--muted);">Sales dashboards, funnels, cohort insights</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="section" style="margin: 0;">
                            <h3 style="color: var(--accent); margin-top: 0;">Demo Features</h3>
                            <div style="display: flex; flex-direction: column; gap: 12px;">
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 8px; height: 8px; background: var(--success); border-radius: 50%; margin-right: 12px;"></div>
                                    <span>Product import/export (CSV)</span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 8px; height: 8px; background: var(--success); border-radius: 50%; margin-right: 12px;"></div>
                                    <span>Order timeline and activity tracking</span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 8px; height: 8px; background: var(--success); border-radius: 50%; margin-right: 12px;"></div>
                                    <span>Promotion engine and discount rules</span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 8px; height: 8px; background: var(--success); border-radius: 50%; margin-right: 12px;"></div>
                                    <span>Analytics with KPIs and trending charts</span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 8px; height: 8px; background: var(--success); border-radius: 50%; margin-right: 12px;"></div>
                                    <span>Password Security (Hashed)</span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 8px; height: 8px; background: var(--success); border-radius: 50%; margin-right: 12px;"></div>
                                    <span>SQL Injection Protection</span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 8px; height: 8px; background: var(--success); border-radius: 50%; margin-right: 12px;"></div>
                                    <span>Interactive Dashboard</span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 8px; height: 8px; background: var(--success); border-radius: 50%; margin-right: 12px;"></div>
                                    <span>Animated UI Components</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="section" style="margin-top: 30px;">
                        <h3 style="color: var(--accent); margin-top: 0;">Application Architecture</h3>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                            <div style="text-align: center; padding: 20px; background: rgba(34,211,238,0.05); border-radius: 12px; border: 1px solid rgba(34,211,238,0.2);">
                                <div style="font-size: 2rem; margin-bottom: 10px;">🎨</div>
                                <h4 style="margin: 0 0 10px; color: var(--primary);">Frontend</h4>
                                <p style="margin: 0; font-size: 0.9rem; color: var(--muted);">Webix UI components with responsive CSS and JavaScript validation</p>
                            </div>
                            
                            <div style="text-align: center; padding: 20px; background: rgba(167,139,250,0.05); border-radius: 12px; border: 1px solid rgba(167,139,250,0.2);">
                                <div style="font-size: 2rem; margin-bottom: 10px;">⚙️</div>
                                <h4 style="margin: 0 0 10px; color: var(--accent);">Backend</h4>
                                <p style="margin: 0; font-size: 0.9rem; color: var(--muted);">PHP with secure authentication, validation, and database operations</p>
                            </div>
                            
                            <div style="text-align: center; padding: 20px; background: rgba(16,185,129,0.05); border-radius: 12px; border: 1px solid rgba(16,185,129,0.2);">
                                <div style="font-size: 2rem; margin-bottom: 10px;">🗄️</div>
                                <h4 style="margin: 0 0 10px; color: var(--success);">Database</h4>
                                <p style="margin: 0; font-size: 0.9rem; color: var(--muted);">MySQL with prepared statements and secure data storage</p>
                            </div>
                        </div>
                    </div>
                    
                    <div style="margin-top: 30px; text-align: center; padding: 20px; background: linear-gradient(135deg, rgba(34,211,238,0.1), rgba(167,139,250,0.1)); border-radius: 12px;">
                        <h3 style="color: var(--primary); margin-top: 0;">Demo Only</h3>
                        <p style="margin: 0; color: var(--muted);">ShopSphere is a sample concept to demonstrate how an e‑commerce admin could look and feel.</p>
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