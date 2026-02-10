<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSE Project Hub - BD</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-bg: #0b1a2a; /* ব্যানার থেকে নেওয়া ডার্ক নেভি */
            --accent-color: #00e5ff; /* ব্যানার থেকে নেওয়া সায়ান কালার */
            --card-bg: #162a3d;
            --text-white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        
        body { 
            background-color: var(--primary-bg); 
            color: var(--text-white); 
            overflow-x: hidden;
        }

        /* Hero Section with Circuit Background Vibe */
        header { 
            background: linear-gradient(135deg, #0b1a2a 0%, #162a3d 100%);
            padding: 80px 20px; 
            text-align: center;
            border-bottom: 2px solid var(--accent-color);
        }

        .logo-placeholder {
            width: 100px;
            height: 100px;
            background: var(--accent-color);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px var(--accent-color);
        }

        header h1 { font-size: 2.5rem; color: var(--accent-color); letter-spacing: 2px; }
        header p { font-size: 1.1rem; margin-top: 10px; opacity: 0.8; }

        /* Project Cards */
        .container { max-width: 1100px; margin: 50px auto; padding: 20px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 25px; }
        
        .card { 
            background: var(--card-bg); 
            padding: 25px; 
            border-radius: 12px; 
            text-align: center; 
            border: 1px solid rgba(0, 229, 255, 0.1);
            transition: 0.4s; 
        }

        .card:hover { 
            border-color: var(--accent-color);
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 229, 255, 0.2);
        }

        .card h3 { color: var(--accent-color); margin-bottom: 12px; font-size: 1.3rem; }
        .card p { font-size: 0.9rem; color: #b0bec5; line-height: 1.6; }

        /* Action Button */
        .btn-container { text-align: center; margin-top: 50px; }
        .contact-btn { 
            display: inline-block; 
            padding: 15px 40px; 
            background: var(--accent-color); 
            color: var(--primary-bg); 
            text-decoration: none; 
            border-radius: 50px; 
            font-weight: 700; 
            text-transform: uppercase;
            box-shadow: 0 5px 15px rgba(0, 229, 255, 0.4);
            transition: 0.3s; 
        }
        .contact-btn:hover { 
            background: #ffffff;
            transform: scale(1.05);
        }

        footer { 
            text-align: center; 
            padding: 40px; 
            background: #07121d; 
            font-size: 0.8rem; 
            color: #546e7a;
            margin-top: 60px;
        }
        .logo-container {
            margin-bottom: 20px;
        }
        .logo-container img {
            border-radius: 50%;
            border: 3px solid var(--accent-color);
            box-shadow: 0 0 15px var(--accent-color);
        }
        @keyframes logoPulse {
            0% { transform: scale(1); box-shadow: 0 0 15px var(--accent-color); }
            50% { transform: scale(1.05); box-shadow: 0 0 30px var(--accent-color); }
            100% { transform: scale(1); box-shadow: 0 0 15px var(--accent-color); }
        }
        .animate-logo {
            animation: logoPulse 3s infinite ease-in-out;
        }     
        .contact-btn:hover {
            box-shadow: 0 0 20px var(--accent-color);
            background: #ffffff;
            transform: scale(1.1);
        }    
        .section-title {
            text-align: center;
            font-size: 2rem;
            color: var(--accent-color);
            margin-bottom: 40px;
            text-transform: uppercase;
        }
        .project-img {
            width: 100%;
            height: 180px;
            background: #0b1a2a;
            border-radius: 8px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(0, 229, 255, 0.2);
        }
        .review-card {
            background: rgba(255, 255, 255, 0.05);
            border-left: 4px solid var(--accent-color);
            padding: 20px;
            font-style: italic;
            margin-bottom: 20px;
        }
        .client-name {
            display: block;
            margin-top: 10px;
            font-weight: 600;
            color: var(--accent-color);
            font-style: normal;
        }     
    </style>
</head>
<body>

    <header>
        <div class="logo-container">
            <img src="/images/Logo.png" alt="Logo" class="animate-logo" style="width: 120px; height: auto;">
        </div>
        <h1>CSE Project Hub - Bangladesh</h1>
        <p>Complete project support for undergraduate CSE students</p>
    </header>

    <div class="container">
        <div class="grid">
            <div class="card">
                <h3>Software</h3>
                <p>Web apps, Mobile apps, and Custom Software Solutions.</p>
            </div>
            <div class="card">
                <h3>Hardware</h3>
                <p>Arduino, Raspberry Pi, Robotics, and Embedded Systems.</p>
            </div>
            <div class="card">
                <h3>AI & ML</h3>
                <p>Deep Learning, Computer Vision, and Predictive Analysis.</p>
            </div>
            <div class="card">
                <h3>IoT</h3>
                <p>Smart Home Automation and Industrial IoT Solutions.</p>
            </div>
        </div>
        
         
        <div class="container">
            <h2 class="section-title">Our Projects</h2>
            <div class="grid">
                <div class="card">
                    <div class="project-img">🚀</div>
                    <h3>FPGA Deepfake Detector</h3>
                    <p>FPGA-Based Real-Time Deepfake Detection System.</p>
                </div>
                <div class="card">
                    <div class="project-img">🤖</div>
                    <h3>AI Research Assistant</h3>
                    <p>Automated tool for CSE academic research and noise analysis.</p>
                </div>
            </div>
        </div>

        <div class="container">
            <h2 class="section-title">Client Reviews</h2>
            <div class="review-card">
                "The project support I received for my final year thesis was exceptional. Highly recommended for CSE students!"
                <span class="client-name">- BRACU Student</span>
            </div>
            <div class="review-card">
                "Great quality hardware implementation and very clear documentation."
                <span class="client-name">- Research Scholar</span>
            </div>
        </div>


        
        <div class="btn-container">
            <a href="https://www.facebook.com/profile.php?id=61585433384743" class="contact-btn" target="_blank">DM Us Now</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 CSE Project Hub - BD. All rights reserved.</p>
    </footer>

</body>
</html>
