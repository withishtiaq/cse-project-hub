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
            --success-green: #00c853;
            --warning-orange: #ffab00;
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

        /* --- Updated Chat Section: Body-hugging Stroke & Large Transparent Image --- */
        .chat-section { margin-bottom: 80px; display: flex; flex-direction: column; gap: 40px; }
        .chat-row { display: flex; align-items: flex-end; gap: 15px; opacity: 0; transform: translateY(30px); animation: fadeInUp 1s forwards; }
        .owner-row { flex-direction: row-reverse; animation-delay: 0.5s; }
        .client-row { animation-delay: 1.5s; }

        /* এই ক্লাসটি ছবির শরীরের ধার ঘেঁষে স্ট্রোক তৈরি করবে */
        .chat-img-body { 
            width: 320px; /* ছবি বড় করা হয়েছে */
            height: auto;
            background: transparent;
            /* ড্রপ শ্যাডো দিয়ে বডি-লাইনের চারদিকে স্ট্রোক তৈরি */
            filter: drop-shadow(2px 0 0 var(--accent-color)) 
                    drop-shadow(-2px 0 0 var(--accent-color)) 
                    drop-shadow(0 2px 0 var(--accent-color)) 
                    drop-shadow(0 -2px 0 var(--accent-color));
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
        }

        .chat-img-body:hover { 
            transform: scale(1.08) translateY(-10px);
            filter: drop-shadow(0 0 10px var(--accent-color)) 
                    drop-shadow(0 0 20px var(--accent-color));
        }

        .chat-bubble { padding: 18px 22px; border-radius: 20px; max-width: 60%; line-height: 1.6; font-size: 1.1rem; font-family: 'Tiro Bangla', serif; }
        .owner-bubble { background: var(--accent-color); color: var(--primary-bg); font-weight: 500; border-bottom-right-radius: 2px; }
        .client-bubble { background: var(--card-bg); color: white; border: 1px solid rgba(0, 229, 255, 0.3); border-bottom-left-radius: 2px; }
        
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }

        /* --- All Carousel, Modals & Snackbar (অক্ষুণ্ণ) --- */
        .carousel-wrapper { position: relative; display: flex; align-items: center; }
        .scroll-container { display: flex; overflow-x: auto; gap: 20px; padding: 20px 5px; scroll-behavior: smooth; scrollbar-width: none; }
        .scroll-container::-webkit-scrollbar { display: none; }
        .card, .scroll-card { min-width: 300px; background: var(--card-bg); border-radius: 12px; border: 1px solid rgba(0, 229, 255, 0.1); transition: 0.4s; padding: 30px; text-align: center; }
        .card:hover, .scroll-card:hover { border-color: var(--accent-color); transform: translateY(-10px); box-shadow: 0 10px 30px rgba(0, 229, 255, 0.2); cursor: pointer; }
        .nav-btn { background: var(--accent-color); color: var(--primary-bg); border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; position: absolute; z-index: 10; font-weight: bold; transition: 0.3s; }
        .nav-btn:hover { transform: scale(1.2); background: white; }
        .prev-btn { left: -20px; } .next-btn { right: -20px; }

        /* --- Animated Buttons --- */
        .btn-container { text-align: center; margin-top: 50px; display: flex; flex-direction: column; align-items: center; gap: 20px; }
        .main-btn { padding: 16px 45px; border-radius: 50px; font-weight: 700; text-transform: uppercase; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer; border: none; letter-spacing: 1px; display: inline-block; }
        .routine-trigger { background: transparent; color: var(--accent-color); border: 2px solid var(--accent-color); }
        .routine-trigger:hover { background: rgba(0, 229, 255, 0.1); box-shadow: 0 0 25px var(--accent-color); transform: scale(1.08) translateY(-3px); }
        .gen-btn { background: linear-gradient(45deg, #00c853, #64dd17); color: white; box-shadow: 0 4px 15px rgba(0, 200, 83, 0.3); }
        .gen-btn:hover { box-shadow: 0 0 30px rgba(0, 200, 83, 0.6); transform: scale(1.08) translateY(-3px); }
        .dl-main-btn { background: linear-gradient(45deg, #ffab00, #ff6d00); color: white; box-shadow: 0 4px 15px rgba(255, 171, 0, 0.3); }
        .dl-main-btn:hover { box-shadow: 0 0 30px rgba(255, 171, 0, 0.6); transform: scale(1.08) translateY(-3px); }
        .contact-btn { background: var(--accent-color); color: var(--primary-bg); text-decoration: none; box-shadow: 0 4px 15px rgba(0, 229, 255, 0.3); }
        .contact-btn:hover { box-shadow: 0 0 30px var(--accent-color); transform: scale(1.1) translateY(-5px); background: white; }

        /* Routine Output (অক্ষুণ্ণ) */
        .routine-box { background: var(--card-bg); padding: 30px; border-radius: 15px; border: 1px solid var(--accent-color); margin-top: 50px; display: none; text-align: left; }
        .day-input-group { background: rgba(255,255,255,0.05); padding: 15px; border-radius: 8px; border: 1px solid rgba(0,229,255,0.2); margin-bottom: 15px; }
        .input-row input { flex: 1; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 10px; border-radius: 5px; outline: none; margin: 4px; }
        #routine-output { margin-top: 30px; background: #ffffff; color: #1a1a1a; padding: 40px; border-radius: 5px; display: none; border: 12px solid #0b1a2a; position: relative; font-family: 'Tiro Bangla', serif; }
        .watermark { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-30deg); font-size: 70px; color: rgba(0,0,0,0.03); font-weight: bold; pointer-events: none; z-index: 0; }
        .routine-table { width: 100%; border-collapse: collapse; position: relative; z-index: 1; }
        .routine-table th { background: #0b1a2a; color: white; padding: 12px; border: 1px solid #333; }
        .routine-table td { padding: 12px; border: 1px solid #ddd; }

        /* Partners Section (অক্ষুণ্ণ) */
        .partners-static { margin: 80px 0; text-align: center; }
        .partners-grid { display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 40px; padding: 20px; }
        .partner-img { width: 130px; height: auto; filter: grayscale(100%) opacity(0.6); transition: 0.4s ease; cursor: pointer; }
        .partner-img:hover { filter: grayscale(0%) opacity(1); transform: scale(1.1); filter: drop-shadow(0 0 10px var(--accent-color)); }

        .project-img { width: 100%; height: 160px; background: #0b1a2a; border-radius: 10px; margin-bottom: 15px; display: flex; align-items: center; justify-content: center; font-size: 3rem; border: 1px solid rgba(0, 229, 255, 0.2); }
        .client-avatar { width: 55px; height: 55px; border-radius: 50%; border: 2px solid var(--accent-color); object-fit: cover; }
        footer { text-align: center; padding: 40px; background: #07121d; font-size: 0.8rem; color: #546e7a; }

        /* Modals & SnackBar (অক্ষুণ্ণ) */
        .modal { display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.9); overflow: auto; }
        .modal-content { background-color: var(--card-bg); margin: 5% auto; padding: 35px; border: 2px solid var(--accent-color); width: 90%; max-width: 550px; border-radius: 20px; position: relative; text-align: center; box-shadow: 0 0 40px var(--accent-color); animation: modalZoom 0.4s; }
        .close-modal { position: absolute; top: 15px; right: 20px; color: var(--accent-color); font-size: 2rem; cursor: pointer; }
        #snackbar { visibility: hidden; min-width: 320px; background-color: var(--card-bg); color: #fff; border-radius: 12px; padding: 25px; position: fixed; z-index: 1000; left: 50%; bottom: 30px; transform: translateX(-50%); border: 2px solid var(--accent-color); opacity: 0; transition: 0.4s; font-family: 'Tiro Bangla', serif; }
        #snackbar.show { visibility: visible; opacity: 1; }
    </style>
</head>
<body>

    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true; s1.src='https://embed.tawk.to/679a953a825083258e0811e5/1iipuipvt';
    s1.charset='UTF-8'; s1.setAttribute('crossorigin','*'); s0.parentNode.insertBefore(s1,s0);
    })();
    </script>

    <header>
        <div class="logo-container"><img src="/images/Logo.png" alt="Logo" style="width: 120px;"></div>
        <h1>CSE Project Hub - Bangladesh</h1>
    </header>

    <div class="container">
        <div class="chat-section">
            <div class="chat-row owner-row">
                <img src="/images/owner.png" class="chat-img-body" alt="Owner">
                <div class="chat-bubble owner-bubble">আপনার প্রোজেক্ট বা থিসিস নিয়ে কি ভাবছেন? আমরা দিচ্ছি কাস্টম হার্ডওয়্যার ও সফটওয়্যার সাপোর্ট।</div>
            </div>
            <div class="chat-row client-row">
                <img src="/images/client1.png" class="chat-img-body" alt="Client">
                <div class="chat-bubble client-bubble">আমার একটি FPGA বেসড ডিপফেক ডিটেকশন সিস্টেম দরকার। আপনারা কি সাহায্য করতে পারবেন?</div>
            </div>
        </div>

        <h2 class="section-title">Our Services</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollBtn('s-scroll', -1)">&#10094;</button>
            <div class="scroll-container" id="s-scroll">
                <div class="card" onclick="showSnackbar('আপনার প্রোজেক্টের জন্য ওয়েব ও মোবাইল অ্যাপের সেরা সলিউশন আমরা নিশ্চিত করি।')"><h3>Software</h3><p>Web & Mobile Apps.</p></div>
                <div class="card" onclick="showSnackbar('আর্ডুইনো থেকে রোবোটিক্স—যেকোনো জটিল হার্ডওয়্যার প্রোজেক্টে আমরা আপনাকে পূর্ণ সহায়তা দিই।')"><h3>Hardware</h3><p>Arduino & Robotics.</p></div>
                <div class="card" onclick="showSnackbar('আধুনিক এআই এবং মেশিন লার্নিং প্রোজেক্ট তৈরি করতে আমাদের টিম আপনার পাশে।')"><h3>AI & ML</h3><p>AI Solutions.</p></div>
                <div class="card" onclick="showSnackbar('আপনার থিসিস রিপোর্টের ১০০% অরিজিনালিটি নিশ্চিত করুন আমাদের মাধ্যমে।')"><h3>Plagiarism</h3><p>Report Checking.</p></div>
                <div class="card" onclick="showSnackbar('যেকোনো জটিল একাডেমিক প্রশ্নের সমাধান পাবেন এখানে।')"><h3>Question Unlock</h3><p>Research Support.</p></div>
                <div class="card" onclick="showSnackbar('প্রয়োজনীয় সব প্রিমিয়াম ডেভেলপার রিসোর্সের অ্যাক্সেস।')"><h3>ToolBox</h3><p>Premium Tools.</p></div>
                <div class="card" onclick="showSnackbar('প্রিমিয়াম রিসোর্সের টিপস এন্ড ট্রিকস।')"><h3>GiveWay</h3><p>Tips & Trick.</p></div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollBtn('s-scroll', 1)">&#10095;</button>
        </div>

        <h2 class="section-title">Our Projects</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollBtn('p-scroll', -1)">&#10094;</button>
            <div class="scroll-container" id="p-scroll">
                <div class="scroll-card" onclick="openModal('FPGA Deepfake Detection', '/images/Logo.png', 'রিয়েল-টাইম ডিপফেক ডিটেকশন সিস্টেম যা FPGA ব্যবহার করে নয়েজ অ্যানালাইসিস করে।', false)">
                    <div class="project-img">🖥️</div><h3>FPGA Deepfake Detection</h3><p>Real-time noise analysis.</p>
                </div>
                <div class="scroll-card" onclick="openModal('AI Face Recognition', '/images/Logo.png', 'হাই একুরেসি ফেস রিকগনিশন সিকিউরিটি সলিউশন।', false)">
                    <div class="project-img">🤖</div><h3>AI Face Recognition</h3><p>Security solutions.</p>
                </div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollBtn('p-scroll', 1)">&#10095;</button>
        </div>

        <h2 class="section-title">Client Reviews</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollBtn('r-scroll', -1)">&#10094;</button>
            <div class="scroll-container" id="r-scroll">
                <div class="scroll-card" onclick="openModal('BRACU Student', '/images/client1.png', 'তাঁদের সার্ভিস অসাধারণ! হার্ডওয়্যার ইমপ্লিমেন্টেশন ছিল নিখুঁত।', true)">
                    <div style="display:flex;align-items:center;gap:15px;margin-bottom:15px"><img src="/images/client1.png" class="client-avatar" alt="C1"><span style="color:var(--accent-color);font-weight:600">BRACU Student</span></div><p>"Amazing hardware support!"</p>
                </div>
                <div class="scroll-card" onclick="openModal('CSE Learner', '/images/client2.png', 'কোড কোয়ালিটি এবং ডকুমেন্টেশন ছিল অত্যন্ত উন্নত।', true)">
                    <div style="display:flex;align-items:center;gap:15px;margin-bottom:15px"><img src="/images/client2.png" class="client-avatar" alt="C2"><span style="color:var(--accent-color);font-weight:600">CSE Learner</span></div><p>"Best thesis guide."</p>
                </div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollBtn('r-scroll', 1)">&#10095;</button>
        </div>
    </div>

    <div class="partners-static">
        <h2 class="section-title" style="font-size: 1.2rem; opacity: 0.8;">Our Trusted Partners</h2>
        <div class="partners-grid">
            <img src="/images/partner1.png" alt="P1" class="partner-img">
            <img src="/images/partner2.png" alt="P2" class="partner-img">
            <img src="/images/partner3.png" alt="P3" class="partner-img">
            <img src="/images/partner4.png" alt="P4" class="partner-img">
            <img src="/images/partner5.png" alt="P5" class="partner-img">
        </div>
    </div>

    <div class="container">
        <div class="btn-container">
            <button class="main-btn routine-trigger" onclick="toggleRoutineBox()">📅 Academic Routine Maker</button>
            <div class="routine-box" id="routine-ui">
                <div id="day-inputs-container"></div>
                <button class="main-btn gen-btn" onclick="generateRoutine()">Generate Branded Routine</button>
                <div id="routine-output">
                    <div class="watermark">CSE PROJECT HUB</div>
                    <div style="display:flex;justify-content:space-between;align-items:center;border-bottom:3px solid #0b1a2a;padding-bottom:15px;margin-bottom:20px;">
                        <div><h2 style="color:#0b1a2a;font-size:22px;">CSE Project Hub - BD</h2><p style="font-size:12px;color:#555;">Official Branded Academic Routine</p></div>
                        <img src="/images/Logo.png" style="width:70px;height:70px;border-radius:50%;border:2px solid #0b1a2a;">
                    </div>
                    <table class="routine-table"><tbody id="table-body"></tbody></table>
                    <div id="qrcode-box" style="margin-top:20px;"></div>
                </div>
                <button id="dl-btn" class="main-btn dl-main-btn" style="display:none;" onclick="downloadRoutine()">📥 Download Branded Image</button>
            </div>
            <a href="https://wa.me/8801642839956" class="main-btn contact-btn" target="_blank">DM Us Now</a>
        </div>
    </div>

    <div id="universalModal" class="modal"><div class="modal-content"><span class="close-modal" onclick="closeModal()">&times;</span><img id="modalImg" src="" style="width:100%;border-radius:10px;"><h2 id="modalTitle" style="color:var(--accent-color);margin-top:15px;"></h2><p id="modalDesc" style="font-family:'Tiro Bangla',serif;margin-top:10px;"></p></div></div>
    <div id="snackbar"><span style="float:right;cursor:pointer" onclick="hideSnackbar()">✕</span><div id="snackbar-text"></div></div>

    <footer><p>&copy; 2026 CSE Project Hub - BD. All rights reserved.</p></footer>

    <script>
        // Modal, Snackbar, Scroll, Routine Maker ফাংশনগুলো হুবহু আগের মতোই আছে
        function openModal(t, i, d, r) {
            document.getElementById("modalTitle").innerText = t; document.getElementById("modalImg").src = i; document.getElementById("modalDesc").innerText = d;
            const img = document.getElementById("modalImg");
            if(r) { img.style.borderRadius = "50%"; img.style.width = "150px"; img.style.height = "150px"; }
            else { img.style.borderRadius = "10px"; img.style.width = "100%"; img.style.height = "250px"; }
            document.getElementById("universalModal").style.display = "block";
        }
        function closeModal() { document.getElementById("universalModal").style.display = "none"; }
        window.onclick = function(e) { if (e.target == document.getElementById("universalModal")) closeModal(); }

        function showSnackbar(t) { document.getElementById("snackbar-text").innerText = t; document.getElementById("snackbar").className = "show"; }
        function hideSnackbar() { document.getElementById("snackbar").className = ""; }
        function scrollBtn(id, dir) { const el = document.getElementById(id); if (dir === 1) el.scrollBy({ left: 320, behavior: 'smooth' }); else el.scrollBy({ left: -320, behavior: 'smooth' }); }
        function toggleRoutineBox() { const b = document.getElementById('routine-ui'); b.style.display = b.style.display === 'block' ? 'none' : 'block'; }

        const days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        const cont = document.getElementById('day-inputs-container');
        days.forEach(day => {
            const div = document.createElement('div'); div.className = 'day-input-group';
            div.innerHTML = `<div class="day-header"><span style="color:var(--accent-color);font-weight:600">${day}</span><button class="add-class-btn" onclick="addNewRow('${day}')">+</button></div>
                <div id="rows-${day}"><div class="input-row"><input type="text" class="course-${day}" placeholder="Course"><input type="text" class="time-${day}" placeholder="Time"></div></div>`;
            cont.appendChild(div);
        });
        function addNewRow(day) {
            const row = document.createElement('div'); row.className = 'input-row';
            row.innerHTML = `<input type="text" class="course-${day}" placeholder="Course"><input type="text" class="time-${day}" placeholder="Time">`;
            document.getElementById(`rows-${day}`).appendChild(row);
        }
        function generateRoutine() {
            const tbody = document.getElementById('table-body'); tbody.innerHTML = '<tr><th style="width:25%">Day</th><th>Schedule</th></tr>';
            let hasData = false;
            days.forEach(day => {
                const cs = document.getElementsByClassName(`course-${day}`), ts = document.getElementsByClassName(`time-${day}`);
                let content = '';
                for (let i = 0; i < cs.length; i++) { if (cs[i].value) { hasData = true; content += `<div style="margin-bottom:5px;">• <strong>${cs[i].value}</strong>: ${ts[i].value}</div>`; } }
                if (content) tbody.innerHTML += `<tr><td style="font-weight:bold;color:#0b1a2a;background:#f9f9f9;">${day}</td><td>${content}</td></tr>`;
            });
            if (!hasData) return alert("Enter schedule!");
            document.getElementById("qrcode-box").innerHTML = "";
            new QRCode(document.getElementById("qrcode-box"), { text: window.location.href, width: 60, height: 60 });
            document.getElementById('routine-output').style.display = 'block'; document.getElementById('dl-btn').style.display = 'inline-block';
        }
        function downloadRoutine() { html2canvas(document.getElementById('routine-output'), {scale: 3}).then(c => { const a = document.createElement('a'); a.download = 'Routine_Branded.png'; a.href = c.toDataURL(); a.click(); }); }
    </script>
</body>
</html>
