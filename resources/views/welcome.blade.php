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

        .logo-container { margin-bottom: 20px; }
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

        header h1 { font-size: 2.5rem; color: var(--accent-color); letter-spacing: 2px; }
        header p { font-size: 1.1rem; margin-top: 10px; opacity: 0.8; }

        .container { max-width: 1100px; margin: 50px auto; padding: 20px; }
        
        .section-title {
            text-align: center;
            font-size: 2rem;
            color: var(--accent-color);
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        /* কার্ড হোভার ইফেক্ট */
        .card, .scroll-card { 
            background: var(--card-bg); 
            border-radius: 12px; 
            border: 1px solid rgba(0, 229, 255, 0.1);
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
        }

        .card:hover, .scroll-card:hover { 
            border-color: var(--accent-color); 
            transform: translateY(-10px); 
            box-shadow: 0 10px 30px rgba(0, 229, 255, 0.2);
            cursor: pointer;
        }

        /* সার্ভিস গ্রিড - ৭টি কার্ডের জন্য অপ্টিমাইজড */
        .grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); 
            gap: 25px; 
            margin-bottom: 60px;
        }
        
        .card { padding: 30px; text-align: center; }
        .card h3 { color: var(--accent-color); margin-bottom: 12px; font-size: 1.4rem; }
        .card p { font-size: 0.95rem; color: #b0bec5; line-height: 1.6; }

        /* স্ক্রলিং সিস্টেম */
        .scroll-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 20px 5px;
            scroll-behavior: smooth;
        }

        .scroll-container::-webkit-scrollbar { height: 6px; }
        .scroll-container::-webkit-scrollbar-thumb { background: var(--accent-color); border-radius: 10px; }

        .scroll-card { min-width: 320px; padding: 25px; }

        .project-img {
            width: 100%;
            height: 160px;
            background: #0b1a2a;
            border-radius: 10px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            border: 1px solid rgba(0, 229, 255, 0.2);
            transition: 0.4s;
        }

        .scroll-card:hover .project-img { transform: scale(1.02); border-color: var(--accent-color); }

        .client-info { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; }
        .client-avatar {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            border: 2px solid var(--accent-color);
            object-fit: cover;
        }
        .client-name { font-weight: 600; color: var(--accent-color); }
        .review-text { font-style: italic; font-size: 0.95rem; color: #b0bec5; line-height: 1.5; }

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
            transition: 0.3s; 
        }
        .contact-btn:hover { box-shadow: 0 0 20px var(--accent-color); background: #ffffff; transform: scale(1.1); }

        footer { text-align: center; padding: 40px; background: #07121d; font-size: 0.8rem; color: #546e7a; margin-top: 60px; }
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
        <div class="grid">
            <div class="card"><h3>Software</h3><p>Web apps, Mobile apps, and Custom Solutions.</p></div>
            <div class="card"><h3>Hardware</h3><p>Arduino, Robotics, and Embedded Systems.</p></div>
            <div class="card"><h3>AI & ML</h3><p>Deep Learning and Computer Vision.</p></div>
            <div class="card"><h3>IoT</h3><p>Smart Home and Industrial IoT Solutions.</p></div>
            
            <div class="card">
                <h3>Plagiarism Checker</h3>
                <p>Ensure your thesis or report is 100% original and academic-ready.</p>
            </div>
            <div class="card">
                <h3>Question Unlock</h3>
                <p>Unlock solutions for complex research and academic questions quickly.</p>
            </div>
            <div class="card">
                <h3>ToolBox Subscription</h3>
                <p>Get premium access to essential developer tools and student resources.</p>
            </div>
        </div>
        
        <h2 class="section-title">Our Projects</h2>
        <div class="scroll-container">
            <div class="scroll-card">
                <div class="project-img">🖥️</div>
                <h3>FPGA Deepfake Detection</h3>
                <p>Real-time deepfake detection system using FPGA and noise analysis.</p>
            </div>
            <div class="scroll-card">
                <div class="project-img">🤖</div>
                <h3>AI Face Recognition</h3>
                <p>High-accuracy face recognition system for security solutions.</p>
            </div>
            <div class="scroll-card">
                <div class="project-img">🌐</div>
                <h3>Project Hub Portal</h3>
                <p>Academic resource management system for CSE students.</p>
            </div>
        </div>

        <h2 class="section-title" style="margin-top: 60px;">Client Reviews</h2>
        <div class="scroll-container">
            <div class="scroll-card">
                <div class="client-info">
                    <img src="/images/client1.png" class="client-avatar" alt="Client 1">
                    <span class="client-name">BRACU Student</span>
                </div>
                <p class="review-text">"Highly professional service! The hardware implementation was flawless. Helped me a lot in my final thesis."</p>
            </div>
            <div class="scroll-card">
                <div class="client-info">
                    <img src="/images/client2.png" class="client-avatar" alt="Client 2">
                    <span class="client-name">CSE Learner</span>
                </div>
                <p class="review-text">"Excellent documentation and AI support. The team is very knowledgeable about current tech trends."</p>
            </div>
            <div class="scroll-card">
                <div class="client-info">
                    <img src="/images/client1.png" class="client-avatar" alt="Client 3">
                    <span class="client-name">Research Scholar</span>
                </div>
                <p class="review-text">"The FPGA implementation support was top-notch. Truly a lifesaver for complex hardware projects."</p>
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
