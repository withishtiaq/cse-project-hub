<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSE Project Hub - BD</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-bg: #0b1a2a; 
            --accent-color: #00e5ff; 
            --card-bg: #162a3d;
            --text-white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        
        body { 
            background-color: var(--primary-bg); 
            color: var(--text-white); 
            overflow-x: hidden;
        }

        header { 
            background: linear-gradient(135deg, #0b1a2a 0%, #162a3d 100%);
            padding: 80px 20px; 
            text-align: center;
            border-bottom: 2px solid var(--accent-color);
        }

        .logo-container img {
            border-radius: 50%;
            border: 3px solid var(--accent-color);
            animation: logoPulse 3s infinite ease-in-out;
        }

        @keyframes logoPulse {
            0% { transform: scale(1); box-shadow: 0 0 15px var(--accent-color); }
            50% { transform: scale(1.05); box-shadow: 0 0 30px var(--accent-color); }
            100% { transform: scale(1); box-shadow: 0 0 15px var(--accent-color); }
        }

        .container { max-width: 1100px; margin: 50px auto; padding: 20px; position: relative; }
        
        .section-title {
            text-align: center;
            font-size: 2rem;
            color: var(--accent-color);
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        /* ক্যারোসেল কন্টেইনার */
        .carousel-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .scroll-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 20px 5px;
            scroll-behavior: smooth;
            scrollbar-width: none;
        }

        .scroll-container::-webkit-scrollbar { display: none; }

        .card, .scroll-card { 
            min-width: 300px;
            background: var(--card-bg); 
            border-radius: 12px; 
            border: 1px solid rgba(0, 229, 255, 0.1);
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
            padding: 30px;
            text-align: center;
        }

        .card:hover, .scroll-card:hover { 
            border-color: var(--accent-color); 
            transform: translateY(-10px); 
            box-shadow: 0 10px 30px rgba(0, 229, 255, 0.2);
        }

        .card h3 { color: var(--accent-color); margin-bottom: 12px; }

        /* নেভিগেশন অ্যারো */
        .nav-btn {
            background: var(--accent-color);
            color: var(--primary-bg);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            position: absolute;
            z-index: 10;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 0 15px var(--accent-color);
            transition: 0.3s;
        }

        .nav-btn:hover { background: #ffffff; transform: scale(1.1); }
        .prev-btn { left: -20px; }
        .next-btn { right: -20px; }

        /* প্রজেক্ট ইমেজ ও রিভিউ স্টাইল */
        .project-img { width: 100%; height: 160px; background: #0b1a2a; border-radius: 10px; margin-bottom: 15px; display: flex; align-items: center; justify-content: center; font-size: 3rem; border: 1px solid rgba(0, 229, 255, 0.2); }
        .client-info { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; }
        .client-avatar { width: 55px; height: 55px; border-radius: 50%; border: 2px solid var(--accent-color); object-fit: cover; }
        .client-name { font-weight: 600; color: var(--accent-color); }

        .btn-container { text-align: center; margin-top: 50px; }
        .contact-btn { display: inline-block; padding: 15px 40px; background: var(--accent-color); color: var(--primary-bg); text-decoration: none; border-radius: 50px; font-weight: 700; text-transform: uppercase; transition: 0.3s; }
        .contact-btn:hover { box-shadow: 0 0 20px var(--accent-color); background: #ffffff; transform: scale(1.1); }

        footer { text-align: center; padding: 40px; background: #07121d; font-size: 0.8rem; color: #546e7a; }
    </style>
</head>
<body>

    <header>
        <div class="logo-container">
            <img src="/images/Logo.png" alt="Logo" style="width: 120px; height: auto;">
        </div>
        <h1>CSE Project Hub - Bangladesh</h1>
        <p>Complete project support for undergraduate CSE students</p>
    </header>

    <div class="container">
        <h2 class="section-title">Our Services</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollLeftBtn('services-scroll')">&#10094;</button>
            <div class="scroll-container" id="services-scroll">
                <div class="card"><h3>Software</h3><p>Web apps, Mobile apps, and Custom Solutions.</p></div>
                <div class="card"><h3>Hardware</h3><p>Arduino, Robotics, and Embedded Systems.</p></div>
                <div class="card"><h3>AI & ML</h3><p>Deep Learning and Computer Vision.</p></div>
                <div class="card"><h3>IoT</h3><p>Smart Home and Industrial IoT Solutions.</p></div>
                <div class="card"><h3>Plagiarism Checker</h3><p>Ensure your thesis or report is 100% original.</p></div>
                <div class="card"><h3>Question Unlock</h3><p>Unlock solutions for complex academic research.</p></div>
                <div class="card"><h3>ToolBox Subscription</h3><p>Premium access to developer tools.</p></div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollRightBtn('services-scroll')">&#10095;</button>
        </div>
    </div>

    <div class="container">
        <h2 class="section-title">Our Projects</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollLeftBtn('project-scroll')">&#10094;</button>
            <div class="scroll-container" id="project-scroll">
                <div class="scroll-card"><div class="project-img">🖥️</div><h3>FPGA Deepfake Detection</h3><p>Real-time system using noise analysis.</p></div>
                <div class="scroll-card"><div class="project-img">🤖</div><h3>AI Face Recognition</h3><p>High-accuracy security solutions.</p></div>
                <div class="scroll-card"><div class="project-img">🌐</div><h3>Project Hub Portal</h3><p>Resource system for CSE students.</p></div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollRightBtn('project-scroll')">&#10095;</button>
        </div>
    </div>

    <div class="container">
        <h2 class="section-title">Client Reviews</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollLeftBtn('review-scroll')">&#10094;</button>
            <div class="scroll-container" id="review-scroll">
                <div class="scroll-card"><div class="client-info"><img src="/images/client1.png" class="client-avatar" alt="C1"><span class="client-name">BRACU Student</span></div><p>"Flawless hardware implementation."</p></div>
                <div class="scroll-card"><div class="client-info"><img src="/images/client2.png" class="client-avatar" alt="C2"><span class="client-name">CSE Learner</span></div><p>"Excellent AI and thesis support."</p></div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollRightBtn('review-scroll')">&#10095;</button>
        </div>
    </div>

    <div class="btn-container">
        <a href="https://www.facebook.com/profile.php?id=61585433384743" class="contact-btn" target="_blank">DM Us Now</a>
    </div>

    <footer>
        <p>&copy; 2026 CSE Project Hub - BD. All rights reserved.</p>
    </footer>

    <script>
        function scrollLeftBtn(id) {
            const container = document.getElementById(id);
            if (container.scrollLeft === 0) {
                container.scrollLeft = container.scrollWidth; // রিসাইকেল ইফেক্ট
            } else {
                container.scrollBy({ left: -320, behavior: 'smooth' });
            }
        }

        function scrollRightBtn(id) {
            const container = document.getElementById(id);
            if (container.scrollLeft + container.clientWidth >= container.scrollWidth - 10) {
                container.scrollLeft = 0; // রিসাইকেল ইফেক্ট
            } else {
                container.scrollBy({ left: 320, behavior: 'smooth' });
            }
        }
    </script>
</body>
</html>
