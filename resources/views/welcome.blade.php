<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSE Project Hub - BD</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Tiro+Bangla&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <style>
        :root {
            --primary-bg: #0b1a2a; 
            --accent-color: #00e5ff; 
            --card-bg: #162a3d;
            --text-white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: var(--primary-bg); color: var(--text-white); overflow-x: hidden; }

        header { 
            background: linear-gradient(135deg, #0b1a2a 0%, #162a3d 100%);
            padding: 80px 20px; text-align: center; border-bottom: 2px solid var(--accent-color);
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
        .section-title { text-align: center; font-size: 2rem; color: var(--accent-color); margin-bottom: 30px; text-transform: uppercase; }

        /* --- Chat Animation (Tiro Bangla) --- */
        .chat-section { margin-bottom: 60px; display: flex; flex-direction: column; gap: 30px; }
        .chat-row { display: flex; align-items: center; gap: 15px; opacity: 0; transform: translateY(30px); animation: fadeInUp 1s forwards; }
        .owner-row { flex-direction: row-reverse; animation-delay: 0.5s; }
        .client-row { animation-delay: 1.5s; }
        .chat-img { width: 70px; height: 70px; border-radius: 50%; border: 2px solid var(--accent-color); object-fit: cover; }
        .chat-bubble { padding: 15px 20px; border-radius: 20px; max-width: 70%; line-height: 1.6; font-size: 1.1rem; font-family: 'Tiro Bangla', serif; }
        .owner-bubble { background: var(--accent-color); color: var(--primary-bg); font-weight: 500; border-bottom-right-radius: 2px; }
        .client-bubble { background: var(--card-bg); color: white; border: 1px solid rgba(0, 229, 255, 0.3); border-bottom-left-radius: 2px; }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }

        /* --- Snackbar Style --- */
        #snackbar {
            visibility: hidden;
            min-width: 320px;
            background-color: var(--card-bg);
            color: #fff;
            border-radius: 12px;
            padding: 25px;
            position: fixed;
            z-index: 1000;
            left: 50%;
            bottom: 30px;
            transform: translateX(-50%);
            border: 2px solid var(--accent-color);
            box-shadow: 0 0 30px rgba(0, 229, 255, 0.4);
            font-family: 'Tiro Bangla', serif;
            transition: visibility 0s, opacity 0.4s ease-in-out;
            opacity: 0;
        }

        #snackbar.show { visibility: visible; opacity: 1; }
        .close-snackbar { position: absolute; top: 10px; right: 12px; cursor: pointer; color: var(--accent-color); font-weight: bold; font-family: 'Poppins', sans-serif; font-size: 1.2rem; transition: 0.3s; }
        .close-snackbar:hover { color: white; transform: rotate(90deg); }

        /* --- All Carousel & Scroll Systems --- */
        .carousel-wrapper { position: relative; display: flex; align-items: center; }
        .scroll-container { display: flex; overflow-x: auto; gap: 20px; padding: 20px 5px; scroll-behavior: smooth; scrollbar-width: none; }
        .scroll-container::-webkit-scrollbar { display: none; }

        .card, .scroll-card { 
            min-width: 300px; background: var(--card-bg); border-radius: 12px; border: 1px solid rgba(0, 229, 255, 0.1);
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); padding: 30px; text-align: center;
        }
        .card:hover, .scroll-card:hover { border-color: var(--accent-color); transform: translateY(-10px); box-shadow: 0 10px 30px rgba(0, 229, 255, 0.2); cursor: pointer; }

        .nav-btn { background: var(--accent-color); color: var(--primary-bg); border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; position: absolute; z-index: 10; font-weight: bold; box-shadow: 0 0 15px var(--accent-color); transition: 0.3s; }
        .nav-btn:hover { transform: scale(1.2); background: white; }
        .prev-btn { left: -20px; } .next-btn { right: -20px; }

        /* --- Routine Maker & Footer --- */
        .routine-box { background: var(--card-bg); padding: 30px; border-radius: 15px; border: 1px solid var(--accent-color); margin-top: 50px; display: none; text-align: left; }
        .day-input-group { background: rgba(255,255,255,0.05); padding: 15px; border-radius: 8px; border: 1px solid rgba(0,229,255,0.2); margin-bottom: 15px; }
        .add-class-btn { background: var(--accent-color); color: var(--primary-bg); border: none; width: 25px; height: 25px; border-radius: 50%; cursor: pointer; font-weight: bold; transition: 0.3s; }
        .add-class-btn:hover { transform: rotate(90deg) scale(1.2); }
        .input-row { display: flex; gap: 10px; margin-bottom: 8px; }
        .input-row input { flex: 1; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 10px; border-radius: 5px; outline: none; }
        
        #routine-output { margin-top: 30px; background: white; color: black; padding: 30px; border-radius: 10px; display: none; border: 5px solid var(--primary-bg); font-family: 'Tiro Bangla', serif; }
        .routine-table { width: 100%; border-collapse: collapse; }
        .routine-table th, .routine-table td { border: 1px solid #333; padding: 12px; }

        /* --- Animated Buttons --- */
        .btn-container { text-align: center; margin-top: 50px; display: flex; flex-direction: column; align-items: center; gap: 15px; }
        .main-btn { padding: 15px 40px; border-radius: 50px; font-weight: 700; text-transform: uppercase; transition: 0.4s; cursor: pointer; border: none; }
        .routine-trigger { background: transparent; color: var(--accent-color); border: 2px solid var(--accent-color); }
        .routine-trigger:hover { background: var(--accent-color); color: var(--primary-bg); box-shadow: 0 0 20px var(--accent-color); transform: scale(1.05); }
        .contact-btn { background: var(--accent-color); color: var(--primary-bg); text-decoration: none; }
        .contact-btn:hover { box-shadow: 0 0 25px var(--accent-color); transform: scale(1.1); background: white; }

        footer { text-align: center; padding: 40px; background: #07121d; font-size: 0.8rem; color: #546e7a; }
    </style>
</head>
<body>
    <header>
        <div class="logo-container"><img src="/images/Logo.png" alt="Logo" style="width: 120px;"></div>
        <h1>CSE Project Hub - Bangladesh</h1>
    </header>

    <div class="container">
        <div class="chat-section">
            <div class="chat-row owner-row">
                <img src="/images/owner.png" class="chat-img" alt="Owner">
                <div class="chat-bubble owner-bubble">আপনার প্রোজেক্ট বা থিসিস নিয়ে কি ভাবছেন? আমরা দিচ্ছি কাস্টম হার্ডওয়্যার ও সফটওয়্যার সাপোর্ট।</div>
            </div>
            <div class="chat-row client-row">
                <img src="/images/client1.png" class="chat-img" alt="Client">
                <div class="chat-bubble client-bubble">আমার একটি FPGA বেসড ডিপফেক ডিটেকশন সিস্টেম দরকার। আপনারা কি সাহায্য করতে পারবেন?</div>
            </div>
        </div>

        <h2 class="section-title">Our Services</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollBtn('s-scroll', -1)">&#10094;</button>
            <div class="scroll-container" id="s-scroll">
                <div class="card" onclick="showSnackbar('আপনার সিএসই প্রোজেক্টের জন্য ওয়েব ও মোবাইল অ্যাপের সেরা কাস্টম সলিউশন আমরা নিশ্চিত করি।')"><h3>Software</h3><p>Web & Mobile Apps.</p></div>
                <div class="card" onclick="showSnackbar('আর্ডুইনো থেকে রোবোটিক্স—যেকোনো জটিল হার্ডওয়্যার প্রোজেক্টে আমরা আপনাকে পূর্ণ সহায়তা দিই।')"><h3>Hardware</h3><p>Arduino & Robotics.</p></div>
                <div class="card" onclick="showSnackbar('ডিপ লার্নিং ও কম্পিউটার ভিশনের আধুনিক প্রযুক্তি ব্যবহার করে আমরা স্মার্ট এআই প্রোজেক্ট তৈরি করি।')"><h3>AI & ML</h3><p>AI Solutions.</p></div>
                <div class="card" onclick="showSnackbar('আপনার থিসিস রিপোর্টের ১০০% অরিজিনালিটি এবং টার্নিটিন রিপোর্ট পেতে সাহায্য করি।')"><h3>Plagiarism</h3><p>Report Checking.</p></div>
                <div class="card" onclick="showSnackbar('যেকোনো একাডেমিক রিসার্চের প্রশ্নের সঠিক এবং দ্রুত সমাধান আমাদের মাধ্যমে সংগ্রহ করুন।')"><h3>Question Unlock</h3><p>Research Support.</p></div>
                <div class="card" onclick="showSnackbar('ডেভেলপার এবং রিসার্চারদের জন্য প্রয়োজনীয় সব টুলসের প্রিমিয়াম মেম্বারশিপ।')"><h3>ToolBox</h3><p>Premium Resources.</p></div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollBtn('s-scroll', 1)">&#10095;</button>
        </div>

        <h2 class="section-title">Our Projects</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollBtn('p-scroll', -1)">&#10094;</button>
            <div class="scroll-container" id="p-scroll">
                <div class="scroll-card"><div class="project-img">🖥️</div><h3>FPGA Deepfake Detection</h3><p>Real-time system using noise analysis.</p></div>
                <div class="scroll-card"><div class="project-img">🤖</div><h3>AI Face Recognition</h3><p>Security solutions.</p></div>
                <div class="scroll-card"><div class="project-img">🌐</div><h3>Project Hub Portal</h3><p>Resource management.</p></div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollBtn('p-scroll', 1)">&#10095;</button>
        </div>

        <h2 class="section-title">Client Reviews</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollBtn('r-scroll', -1)">&#10094;</button>
            <div class="scroll-container" id="r-scroll">
                <div class="scroll-card"><div class="client-info"><img src="/images/client1.png" class="client-avatar" alt="C1"><span style="color:var(--accent-color);font-weight:600">BRACU Student</span></div><p>"Amazing hardware support!"</p></div>
                <div class="scroll-card"><div class="client-info"><img src="/images/client2.png" class="client-avatar" alt="C2"><span style="color:var(--accent-color);font-weight:600">CSE Learner</span></div><p>"Best thesis guide."</p></div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollBtn('r-scroll', 1)">&#10095;</button>
        </div>

        <div class="btn-container">
            <button class="main-btn routine-trigger" onclick="toggleRoutineBox()">📅 Academic Routine Maker</button>
            <div class="routine-box" id="routine-ui">
                <div id="day-inputs-container"></div>
                <button class="main-btn" style="background:#4CAF50;color:white;margin-top:20px;" onclick="generateRoutine()">Generate Routine</button>
                <div id="routine-output">
                    <h2 style="text-align:center;margin-bottom:20px;border-bottom: 2px solid #333;">Academic Routine</h2>
                    <table class="routine-table"><tbody id="table-body"></tbody></table>
                    <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-top:20px;">
                        <div style="display:flex; align-items:center; gap:10px; font-weight:600; font-size:12px;">
                            <img src="/images/Logo.png" style="width:40px; border-radius:50%;">
                            <span>Made by CSE Project Hub BD</span>
                        </div>
                        <div id="qrcode"></div>
                    </div>
                </div>
                <button id="dl-btn" class="main-btn" style="background:#ff9100;color:white;margin-top:15px;display:none;" onclick="downloadRoutine()">📥 Download Image</button>
            </div>
            <a href="https://www.facebook.com/profile.php?id=61585433384743" class="main-btn contact-btn" target="_blank">DM Us Now</a>
        </div>
    </div>

    <div id="snackbar">
        <span class="close-snackbar" onclick="hideSnackbar()">✕</span>
        <div id="snackbar-text"></div>
    </div>

    <footer><p>&copy; 2026 CSE Project Hub - BD. All rights reserved.</p></footer>

    <script>
        // Snackbar ফাংশন
        function showSnackbar(text) {
            var x = document.getElementById("snackbar");
            document.getElementById("snackbar-text").innerText = text;
            x.className = "show";
        }
        function hideSnackbar() {
            var x = document.getElementById("snackbar");
            x.className = " ";
        }

        // রিসাইকেল স্ক্রল লজিক (অক্ষুণ্ণ)
        function scrollBtn(id, dir) {
            const el = document.getElementById(id);
            if (dir === 1) { if (el.scrollLeft + el.clientWidth >= el.scrollWidth - 10) el.scrollLeft = 0; else el.scrollBy({ left: 320, behavior: 'smooth' }); }
            else { if (el.scrollLeft <= 0) el.scrollLeft = el.scrollWidth; else el.scrollBy({ left: -320, behavior: 'smooth' }); }
        }

        // রুটিন মেকার লজিক (অক্ষুণ্ণ)
        const days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        const container = document.getElementById('day-inputs-container');
        days.forEach(day => {
            const div = document.createElement('div');
            div.className = 'day-input-group';
            div.innerHTML = `<div class="day-header"><span style="color:var(--accent-color);font-weight:600">${day}</span><button class="add-class-btn" onclick="addNewRow('${day}')">+</button></div>
                <div id="rows-${day}"><div class="input-row"><input type="text" class="course-${day}" placeholder="Course"><input type="text" class="time-${day}" placeholder="Time"></div></div>`;
            container.appendChild(div);
        });

        function addNewRow(day) {
            const row = document.createElement('div'); row.className = 'input-row';
            row.innerHTML = `<input type="text" class="course-${day}" placeholder="Course"><input type="text" class="time-${day}" placeholder="Time">`;
            document.getElementById(`rows-${day}`).appendChild(row);
        }

        function toggleRoutineBox() { const b = document.getElementById('routine-ui'); b.style.display = b.style.display === 'block' ? 'none' : 'block'; }
        
        function generateRoutine() {
            const tbody = document.getElementById('table-body'); tbody.innerHTML = '<tr><th style="background:#eee">Day</th><th style="background:#eee">Schedule</th></tr>';
            let hasData = false;
            days.forEach(day => {
                const courses = document.getElementsByClassName(`course-${day}`), times = document.getElementsByClassName(`time-${day}`);
                let content = '';
                for (let i = 0; i < courses.length; i++) { if (courses[i].value) { hasData = true; content += `<div>• <strong>${courses[i].value}</strong>: ${times[i].value}</div>`; } }
                if (content) tbody.innerHTML += `<tr><td><strong>${day}</strong></td><td>${content}</td></tr>`;
            });
            if (!hasData) return alert("Enter schedule!");
            
            document.getElementById("qrcode").innerHTML = "";
            new QRCode(document.getElementById("qrcode"), { text: window.location.href, width: 60, height: 60 });
            document.getElementById('routine-output').style.display = 'block'; document.getElementById('dl-btn').style.display = 'inline-block';
        }

        function downloadRoutine() { html2canvas(document.getElementById('routine-output'), {scale: 2}).then(c => { const a = document.createElement('a'); a.download = 'Routine.png'; a.href = c.toDataURL(); a.click(); }); }
    </script>
</body>
</html>
