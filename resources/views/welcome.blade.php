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

        /* আগের ক্যারোসেল ও কার্ড স্টাইল */
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
        .routine-input-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 20px; }
        .day-input { background: rgba(255,255,255,0.05); padding: 15px; border-radius: 8px; border: 1px solid rgba(0,229,255,0.2); }
        .day-input label { display: block; color: var(--accent-color); margin-bottom: 5px; font-weight: 600; }
        .day-input input { width: 100%; background: transparent; border: 1px solid rgba(255,255,255,0.2); color: white; padding: 8px; border-radius: 4px; outline: none; margin-bottom: 5px; }

        /* Output Routine Table */
        #routine-output { margin-top: 30px; background: white; color: black; padding: 20px; border-radius: 10px; display: none; }
        .routine-table { width: 100%; border-collapse: collapse; background: white; }
        .routine-table th, .routine-table td { border: 2px solid #333; padding: 12px; text-align: center; }
        .routine-table th { background: #eee; }

        /* Buttons */
        .btn-container { text-align: center; margin-top: 30px; display: flex; flex-direction: column; align-items: center; gap: 15px; }
        .main-btn { padding: 15px 40px; border-radius: 50px; font-weight: 700; text-transform: uppercase; text-decoration: none; transition: 0.3s; cursor: pointer; border: none; }
        .routine-trigger { background: transparent; color: var(--accent-color); border: 2px solid var(--accent-color); }
        .routine-trigger:hover { background: var(--accent-color); color: var(--primary-bg); }
        .gen-btn { background: #4CAF50; color: white; }
        .download-btn { background: #ff9100; color: white; margin-top: 15px; }
        .contact-btn { background: var(--accent-color); color: var(--primary-bg); }
        .contact-btn:hover { box-shadow: 0 0 20px var(--accent-color); transform: scale(1.05); }

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
            <button class="nav-btn prev-btn" onclick="scrollLeftBtn('s-scroll')">&#10094;</button>
            <div class="scroll-container" id="s-scroll">
                <div class="card"><h3>Software</h3><p>Custom Web & Mobile Apps.</p></div>
                <div class="card"><h3>Hardware</h3><p>Arduino & Robotics.</p></div>
                <div class="card"><h3>AI & ML</h3><p>Deep Learning Solutions.</p></div>
                <div class="card"><h3>Plagiarism</h3><p>Report Checking.</p></div>
            </div>
            <button class="nav-btn next-btn" onclick="scrollRightBtn('s-scroll')">&#10095;</button>
        </div>

        <h2 class="section-title">Client Reviews</h2>
        <div class="carousel-wrapper">
            <div class="scroll-container" id="r-scroll">
                <div class="scroll-card"><h3>BRACU Student</h3><p>"Amazing hardware support!"</p></div>
                <div class="scroll-card"><h3>CSE Learner</h3><p>"The best thesis guide."</p></div>
            </div>
        </div>

        <div class="btn-container">
            <button class="main-btn routine-trigger" onclick="toggleRoutineBox()">📅 Academic Routine Maker</button>
            
            <div class="routine-box" id="routine-ui">
                <h3 style="margin-bottom: 20px; color: var(--accent-color);">Enter Your Weekly Schedule</h3>
                <div class="routine-input-grid">
                    <script>
                        const days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
                        days.forEach(day => {
                            document.write(`
                                <div class="day-input">
                                    <label>${day}</label>
                                    <input type="text" id="course-${day}" placeholder="Course Name">
                                    <input type="text" id="time-${day}" placeholder="Class Time (e.g. 10:00 AM)">
                                </div>
                            `);
                        });
                    </script>
                </div>
                <button class="main-btn gen-btn" onclick="generateRoutine()">Generate Routine Image</button>

                <div id="routine-output">
                    <h2 style="text-align:center; margin-bottom:10px;">Weekly Academic Routine</h2>
                    <table class="routine-table">
                        <thead>
                            <tr><th>Day</th><th>Course Name</th><th>Time</th></tr>
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
        function scrollLeftBtn(id) { document.getElementById(id).scrollBy({ left: -320, behavior: 'smooth' }); }
        function scrollRightBtn(id) { document.getElementById(id).scrollBy({ left: 320, behavior: 'smooth' }); }

        function toggleRoutineBox() {
            const box = document.getElementById('routine-ui');
            box.style.display = box.style.display === 'block' ? 'none' : 'block';
        }

        function generateRoutine() {
            const tbody = document.getElementById('table-body');
            tbody.innerHTML = '';
            let hasData = false;

            days.forEach(day => {
                const course = document.getElementById(`course-${day}`).value;
                const time = document.getElementById(`time-${day}`).value;
                if(course || time) {
                    hasData = true;
                    tbody.innerHTML += `<tr><td><strong>${day}</strong></td><td>${course || '-'}</td><td>${time || '-'}</td></tr>`;
                }
            });

            if(!hasData) { alert("Please enter at least one class!"); return; }

            document.getElementById('routine-output').style.display = 'block';
            document.getElementById('dl-btn').style.display = 'inline-block';
            window.scrollTo(0, document.body.scrollHeight);
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
