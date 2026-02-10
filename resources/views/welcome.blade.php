<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSE Project Hub - BD</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
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
            padding: 60px 20px; text-align: center; border-bottom: 2px solid var(--accent-color);
        }

        .container { max-width: 1100px; margin: 40px auto; padding: 20px; position: relative; }
        .section-title { text-align: center; font-size: 2rem; color: var(--accent-color); margin-bottom: 30px; text-transform: uppercase; }

        /* ক্যারোসেল স্টাইল */
        .carousel-wrapper { position: relative; display: flex; align-items: center; margin-bottom: 40px; }
        .scroll-container { display: flex; overflow-x: auto; gap: 20px; padding: 20px 5px; scroll-behavior: smooth; scrollbar-width: none; }
        .scroll-container::-webkit-scrollbar { display: none; }
        .card, .scroll-card { min-width: 300px; background: var(--card-bg); border-radius: 12px; border: 1px solid rgba(0, 229, 255, 0.1); transition: 0.4s; padding: 25px; text-align: center; }
        .card:hover, .scroll-card:hover { border-color: var(--accent-color); transform: translateY(-10px); box-shadow: 0 10px 30px rgba(0, 229, 255, 0.2); }
        .card h3 { color: var(--accent-color); margin-bottom: 10px; }

        .nav-btn { background: var(--accent-color); color: var(--primary-bg); border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; position: absolute; z-index: 10; font-weight: bold; }
        .prev-btn { left: -20px; } .next-btn { right: -20px; }

        /* Routine Maker Section */
        .routine-box { background: var(--card-bg); padding: 30px; border-radius: 15px; border: 1px solid var(--accent-color); margin-top: 50px; display: none; }
        .day-input-group { background: rgba(255,255,255,0.05); padding: 15px; border-radius: 8px; border: 1px solid rgba(0,229,255,0.2); margin-bottom: 15px; }
        .day-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .day-label { color: var(--accent-color); font-weight: 600; font-size: 1.1rem; }
        .add-class-btn { background: var(--accent-color); color: var(--primary-bg); border: none; width: 25px; height: 25px; border-radius: 50%; cursor: pointer; font-weight: bold; }
        
        .input-row { display: flex; gap: 10px; margin-bottom: 8px; }
        .input-row input { flex: 1; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 10px; border-radius: 5px; outline: none; }

        /* Output Routine Table Design */
        #routine-output { margin-top: 30px; background: white; color: black; padding: 30px; border-radius: 10px; display: none; }
        .routine-table { width: 100%; border-collapse: collapse; background: white; }
        .routine-table th, .routine-table td { border: 1px solid #333; padding: 12px; text-align: left; }
        .routine-table th { background: #f2f2f2; font-weight: bold; text-align: center; }

        /* Buttons */
        .btn-container { text-align: center; margin-top: 30px; display: flex; flex-direction: column; align-items: center; gap: 15px; }
        .main-btn { padding: 15px 40px; border-radius: 50px; font-weight: 700; text-transform: uppercase; text-decoration: none; transition: 0.3s; cursor: pointer; border: none; }
        .routine-trigger { background: transparent; color: var(--accent-color); border: 2px solid var(--accent-color); }
        .gen-btn { background: #4CAF50; color: white; margin-top: 20px; }
        .download-btn { background: #ff9100; color: white; margin-top: 15px; }
        .contact-btn { background: var(--accent-color); color: var(--primary-bg); }
    </style>
</head>
<body>

    <header>
        <h1>CSE Project Hub - Bangladesh</h1>
        <p>Your Ultimate Academic Support Partner</p>
    </header>

    <div class="container">
        <h2 class="section-title">Our Services</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollBtn('s-scroll', -1)">&#10094;</button>
            <div class="scroll-container" id="s-scroll">
                <div class="card"><h3>Software</h3><p>Custom Web & Mobile Apps.</p></div>
                <div class="card"><h3>Hardware</h3><p>Arduino & Robotics.</p></div>
                <div class="card"><h3>AI & ML</h3><p>Deep Learning Solutions.</p></div>
                <div class="card"><h3>Plagiarism</h3><p>Report Checking.</p></div>
                <div class="card"><h3>Question Unlock</h3><p>Academic Research.</p></div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollBtn('s-scroll', 1)">&#10095;</button>
        </div>

        <h2 class="section-title">Client Reviews</h2>
        <div class="carousel-wrapper">
            <button class="nav-btn prev-btn" onclick="scrollBtn('r-scroll', -1)">&#10094;</button>
            <div class="scroll-container" id="r-scroll">
                <div class="scroll-card"><h3>BRACU Student</h3><p>"Amazing hardware support!"</p></div>
                <div class="scroll-card"><h3>CSE Learner</h3><p>"The best thesis guide."</p></div>
                <div class="scroll-card"><h3>Research Scholar</h3><p>"Top-notch AI implementation."</p></div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollBtn('r-scroll', 1)">&#10095;</button>
        </div>

        <div class="btn-container">
            <button class="main-btn routine-trigger" onclick="toggleRoutineBox()">📅 Academic Routine Maker</button>
            
            <div class="routine-box" id="routine-ui">
                <h3 style="margin-bottom: 20px; color: var(--accent-color);">Create Your Dynamic Schedule</h3>
                <div id="day-inputs-container">
                    </div>
                
                <button class="main-btn gen-btn" onclick="generateRoutine()">Generate Routine Image</button>

                <div id="routine-output">
                    <h2 style="text-align:center; margin-bottom:20px; color: #0b1a2a; border-bottom: 2px solid #333; padding-bottom: 10px;">Weekly Academic Routine</h2>
                    <table class="routine-table">
                        <thead>
                            <tr>
                                <th style="width: 25%;">Day</th>
                                <th>Courses & Time Schedule</th>
                            </tr>
                        </thead>
                        <tbody id="table-body"></tbody>
                    </table>
                </div>
                <button id="dl-btn" class="main-btn download-btn" style="display:none;" onclick="downloadRoutine()">📥 Download Image</button>
            </div>

            <a href="https://www.facebook.com/profile.php?id=61585433384743" class="main-btn contact-btn" target="_blank">DM Us Now</a>
        </div>
    </div>

    <script>
        const days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        const container = document.getElementById('day-inputs-container');

        // জেনারেট ইনপুট ফিল্ডস
        days.forEach(day => {
            const div = document.createElement('div');
            div.className = 'day-input-group';
            div.innerHTML = `
                <div class="day-header">
                    <span class="day-label">${day}</span>
                    <button class="add-class-btn" onclick="addNewRow('${day}')">+</button>
                </div>
                <div id="rows-${day}">
                    <div class="input-row">
                        <input type="text" class="course-${day}" placeholder="Course (e.g. CSE301)">
                        <input type="text" class="time-${day}" placeholder="Time (e.g. 11:00 AM)">
                    </div>
                </div>
            `;
            container.appendChild(div);
        });

        function addNewRow(day) {
            const rowContainer = document.getElementById(`rows-${day}`);
            const newRow = document.createElement('div');
            newRow.className = 'input-row';
            newRow.innerHTML = `
                <input type="text" class="course-${day}" placeholder="Course">
                <input type="text" class="time-${day}" placeholder="Time">
            `;
            rowContainer.appendChild(newRow);
        }

        // রিসাইকেল স্ক্রল লজিক
        function scrollBtn(id, direction) {
            const el = document.getElementById(id);
            const scrollAmount = 320;
            if (direction === 1) {
                if (el.scrollLeft + el.clientWidth >= el.scrollWidth - 10) el.scrollLeft = 0;
                else el.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            } else {
                if (el.scrollLeft <= 0) el.scrollLeft = el.scrollWidth;
                else el.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            }
        }

        function toggleRoutineBox() {
            const box = document.getElementById('routine-ui');
            box.style.display = box.style.display === 'block' ? 'none' : 'block';
        }

        function generateRoutine() {
            const tbody = document.getElementById('table-body');
            tbody.innerHTML = '';
            let hasData = false;

            days.forEach(day => {
                const courses = document.getElementsByClassName(`course-${day}`);
                const times = document.getElementsByClassName(`time-${day}`);
                let dayContent = '';

                for (let i = 0; i < courses.length; i++) {
                    if (courses[i].value || times[i].value) {
                        hasData = true;
                        dayContent += `<div style="margin-bottom:5px;">• <strong>${courses[i].value || 'N/A'}</strong>: ${times[i].value || 'TBA'}</div>`;
                    }
                }

                if (dayContent) {
                    tbody.innerHTML += `<tr><td style="font-weight:bold; background:#f9f9f9;">${day}</td><td>${dayContent}</td></tr>`;
                }
            });

            if (!hasData) { alert("Please enter at least one class schedule!"); return; }

            document.getElementById('routine-output').style.display = 'block';
            document.getElementById('dl-btn').style.display = 'inline-block';
        }

        function downloadRoutine() {
            const routineElement = document.getElementById('routine-output');
            html2canvas(routineElement).then(canvas => {
                const link = document.createElement('a');
                link.download = 'My_Academic_Routine.png';
                link.href = canvas.toDataURL();
                link.click();
            });
        }
    </script>
</body>
</html>
