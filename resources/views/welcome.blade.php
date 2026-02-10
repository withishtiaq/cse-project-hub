<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSE Project Hub - BD</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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

        /* লোগো অ্যানিমেশন */
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

        /* ক্যারোসেল ও কার্ড */
        .scroll-container { display: flex; overflow-x: auto; gap: 20px; padding: 20px 5px; scroll-behavior: smooth; scrollbar-width: none; }
        .scroll-container::-webkit-scrollbar { display: none; }

        .card, .scroll-card { 
            min-width: 300px; background: var(--card-bg); border-radius: 12px; 
            border: 1px solid rgba(0, 229, 255, 0.1); padding: 30px; text-align: center;
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .card:hover, .scroll-card:hover { 
            border-color: var(--accent-color); transform: translateY(-10px); 
            box-shadow: 0 10px 30px rgba(0, 229, 255, 0.2); cursor: pointer;
        }

        /* অ্যানিমেটেড বাটন হোভার */
        .main-btn, .nav-btn, .add-class-btn { transition: all 0.3s ease; position: relative; overflow: hidden; }
        .main-btn:hover { transform: scale(1.05); box-shadow: 0 0 20px var(--accent-color); }
        .main-btn:active { transform: scale(0.95); }

        .nav-btn { background: var(--accent-color); border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; position: absolute; z-index: 10; font-weight: bold; box-shadow: 0 0 15px var(--accent-color); }
        .prev-btn { left: -20px; } .next-btn { right: -20px; }

        /* Routine Maker */
        .routine-box { background: var(--card-bg); padding: 30px; border-radius: 15px; border: 1px solid var(--accent-color); margin-top: 50px; display: none; }
        .day-input-group { background: rgba(255,255,255,0.05); padding: 15px; border-radius: 8px; border: 1px solid rgba(0,229,255,0.2); margin-bottom: 15px; }
        .add-class-btn { background: var(--accent-color); color: var(--primary-bg); border: none; width: 25px; height: 25px; border-radius: 50%; cursor: pointer; font-weight: bold; }
        
        .input-row { display: flex; gap: 10px; margin-bottom: 8px; }
        .input-row input { flex: 1; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 10px; border-radius: 5px; outline: none; }

        /* রুটিন আউটপুট ডিজাইন */
        #routine-output { 
            margin-top: 30px; background: white; color: black; padding: 40px; border-radius: 10px; display: none; 
            position: relative; border: 5px solid #0b1a2a;
        }
        .routine-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .routine-table th, .routine-table td { border: 1px solid #333; padding: 12px; text-align: left; }

        /* রুটিন ব্র্যান্ডিং ও QR */
        .routine-footer { display: flex; justify-content: space-between; align-items: flex-end; margin-top: 20px; border-top: 2px solid #eee; padding-top: 15px; }
        .footer-brand { display: flex; align-items: center; gap: 10px; }
        .small-logo { width: 40px; height: 40px; border-radius: 50%; border: 1px solid #0b1a2a; }
        #qrcode { padding: 5px; background: white; }

        .btn-container { text-align: center; margin-top: 50px; display: flex; flex-direction: column; align-items: center; gap: 15px; }
        .main-btn { padding: 15px 40px; border-radius: 50px; font-weight: 700; text-transform: uppercase; cursor: pointer; border: none; }
        .routine-trigger { background: transparent; color: var(--accent-color); border: 2px solid var(--accent-color); }
        .contact-btn { background: var(--accent-color); color: var(--primary-bg); text-decoration: none; }
    </style>
</head>
<body>
    <header>
        <div class="logo-container"><img src="/images/Logo.png" alt="Logo" style="width: 120px;"></div>
        <h1>CSE Project Hub - Bangladesh</h1>
    </header>

    <div class="container">
        <div class="btn-container">
            <button class="main-btn routine-trigger" onclick="toggleRoutineBox()">📅 Academic Routine Maker</button>
            <div class="routine-box" id="routine-ui">
                <div id="day-inputs-container"></div>
                <button class="main-btn" style="background:#4CAF50;color:white;margin-top:20px;" onclick="generateRoutine()">Generate Routine</button>
                
                <div id="routine-output">
                    <h2 style="text-align:center;margin-bottom:20px;">Academic Routine</h2>
                    <table class="routine-table"><tbody id="table-body"></tbody></table>
                    
                    <div class="routine-footer">
                        <div class="footer-brand">
                            <img src="/images/Logo.png" class="small-logo" alt="Logo">
                            <span style="font-size: 14px; font-weight: 600;">Made by CSE Project Hub BD</span>
                        </div>
                        <div id="qrcode"></div>
                    </div>
                </div>
                
                <button id="dl-btn" class="main-btn" style="background:#ff9100;color:white;margin-top:15px;display:none;" onclick="downloadRoutine()">📥 Download Image</button>
            </div>
            <a href="https://www.facebook.com/profile.php?id=61585433384743" class="main-btn contact-btn" target="_blank">DM Us Now</a>
        </div>
    </div>

    <script>
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
            const tbody = document.getElementById('table-body'); tbody.innerHTML = '<tr><th>Day</th><th>Schedule</th></tr>';
            let hasData = false;
            days.forEach(day => {
                const courses = document.getElementsByClassName(`course-${day}`), times = document.getElementsByClassName(`time-${day}`);
                let content = '';
                for (let i = 0; i < courses.length; i++) { if (courses[i].value) { hasData = true; content += `<div>• <strong>${courses[i].value}</strong>: ${times[i].value}</div>`; } }
                if (content) tbody.innerHTML += `<tr><td><strong>${day}</strong></td><td>${content}</td></tr>`;
            });

            if (!hasData) return alert("Enter schedule!");

            // QR Code জেনারেট করা
            document.getElementById("qrcode").innerHTML = "";
            new QRCode(document.getElementById("qrcode"), {
                text: window.location.href, // আপনার সাইটের লিঙ্ক
                width: 60,
                height: 60
            });

            document.getElementById('routine-output').style.display = 'block';
            document.getElementById('dl-btn').style.display = 'inline-block';
        }

        function downloadRoutine() { 
            html2canvas(document.getElementById('routine-output'), { scale: 2 }).then(c => { 
                const a = document.createElement('a'); a.download = 'Routine_CSEProjectHub.png'; a.href = c.toDataURL(); a.click(); 
            }); 
        }
    </script>
</body>
</html>
