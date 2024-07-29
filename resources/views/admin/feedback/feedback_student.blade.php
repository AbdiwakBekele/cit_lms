<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Feedback Page</title>
        <link rel="stylesheet" href="{{ asset('feedback_assets/css/feedback.css') }}">
    </head>

    <body>
        <div class="container">
            <div class="header">
                <h1>GIVE US YOUR FEEDBACK</h1>
            </div>
            <div class="tabs">
                <div class="tab active" onclick="openTab('problem')">PROBLEM</div>
                <div class="tab" onclick="openTab('solution')">SOLUTION</div>
                <div class="tab" onclick="openTab('new-idea')">NEW IDEA</div>
                <div class="tab" onclick="openTab('improvement')">IMPROVEMENT</div>
            </div>
            <div id="problem" class="tab-content active">
                <div class="content-wrapper">
                    <img src=" {{ asset('feedback_assets/images/problem_image.png') }} " alt="Problem Image"
                        class="tab-image">
                    <form class="feedback-form">
                        <div class="form-group">
                            <label for="issue">what is the issue related to</label>
                            <select id="issue" name="issue">
                                <option value=""></option>
                                <option value="technical">Technical</option>
                                <option value="course">Course</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="programs">Course/Program</label>
                            <select id="programs" name="programs">
                                <option value=""></option>
                                <option>Digital Marketing</option>
                                <option>Web Development</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="problem-subject">Subject/Title</label>
                            <input type="text" id="problem-subject" name="problem-subject">
                        </div>
                        <div class="form-group">
                            <label for="problem-description">Description</label>
                            <textarea id="problem-description" name="problem-description" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="button-group"><button type="submit">Submit</button></div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="solution" class="tab-content">
                <div class="content-wrapper">
                    <img src="{{ asset('feedback_assets/images/solution_image.png') }}" alt="Solution Image"
                        class="tab-image">
                    <div class="issue-box">
                        <ul>
                            <li>
                                <h3 aria-expanded="false" onclick="toggleContent(this)">Issue#14-Keyword Research Tool
                                    Malfunction</h3>
                                <div class="hidden-content">
                                    <div class="hashtags">
                                        <span class="hashtag">Issue:</span>
                                    </div>
                                    <p><strong>Program related</strong></p>
                                    <hr>
                                    <div class="hashtags">
                                        <span class="hashtag">Course:</span>
                                    </div>
                                    <p><strong>Advanced Digital Marketing</strong></p>
                                    <hr>
                                    <div class="hashtags">
                                        <span class="hashtag">Problem Subject:</span>
                                    </div>
                                    <p><strong>Keyword Research Tool Malfunction</strong></p>
                                    <hr>
                                    <div class="hashtags">
                                        <span class="hashtag">Problem Description</span>
                                    </div>
                                    <p><strong>The keyword research tool in Module 2 is not displaying search volume
                                            data correctly. it shows '0' for all keywords, which is not accurate. This
                                            issue is hindering our ability to complete the assignment."</strong></p>
                                    <hr>
                                    <div class="hashtags">
                                        <span class="hashtag">Solution Provided</span>
                                    </div>
                                    <p><strong>The issue was due to an API update that was not reflected in the tool's
                                            code. We have updated the API calls and the tool is now displaying the
                                            correct search volume data. We also added a manual refresh button for
                                            real-time data fetching.</strong></p>
                                </div>
                                <hr>
                            </li>
                            <li>
                                <h3 aria-expanded="false" onclick="toggleContent(this)">Issue#15-Unable to Access
                                    Enrollment Form for Advanced Digital Marketing</h3>
                                <div class="hidden-content"></div>
                                <hr>
                            </li>
                            <li>
                                <h3 aria-expanded="false" onclick="toggleContent(this)">Issue#16-Missing Lecture Videos
                                    in Digital Content</h3>
                                <div class="hidden-content"></div>
                                <hr>
                            </li>
                            <li>
                                <h3 aria-expanded="false" onclick="toggleContent(this)">Issue#17-Error in Submitting
                                    Final Project for Website Design and Development</h3>
                                <div class="hidden-content"></div>
                                <hr>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="new-idea" class="tab-content">
                <div class="content-wrapper">
                    <img src=" {{ asset('feedback_assets/images/new_idea_image.png') }} " alt="New Idea Image"
                        class="tab-image">
                    <form class="feedback-form">
                        <div class="form-group">
                            <label for="about">About / Related to</label>
                            <select id="about" name="about">
                                <option value=""></option>
                                <option value="program">Program</option>
                                <option value="course">Course</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course">Course</label>
                            <select id="course" name="course">
                                <option value=""></option>
                                <option value="digital-marketing">Digital Marketing</option>
                                <option value="web-design">Web Design</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject / Title</label>
                            <input type="text" id="subject" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="button-group"><button type="submit">Submit</button></div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="improvement" class="tab-content">
                <div class="content-wrapper">
                    <img src=" {{ asset('feedback_assets/images/improvement_image.png') }} " alt="Improvement Image"
                        class="tab-image">
                    <div class="issue-box">
                        <ul>
                            <li>
                                <h3>Updated Curriculum for Advanced Digital Marketing</h3>
                                <div class="hashtags">
                                    <span class="hashtag">#courseupdate</span>
                                    <span class="hashtag">#AdvancedDigitalMarketing</span>
                                    <span class="hashtag">#newcontent</span>
                                </div>
                                <hr>
                                <p>The curriculum for our Advanced Digital Marketing course has been updated to include
                                    the latest trends and strategies in the industry. This update includes new modules
                                    on influencer marketing, advanced analytics, and the use of AI in digital marketing.
                                    These changes ensure that our students receive the most current and comprehensive
                                    education in digital marketing.</p>
                            </li>
                            <li>
                                <h3>New Interactive Labs for IT Support and Cybersecurity</h3>
                                <div class="hashtags">
                                    <span class="hashtag">#newfeature</span>
                                    <span class="hashtag">#ITSupport</span>
                                    <span class="hashtag">#Cybersecurity</span>
                                    <span class="hashtag">#InteractiveLabs</span>
                                </div>
                                <hr>
                                <p>We have introduced new interactive labs for our IT Support and Cybersecurity courses.
                                    These labs provide hands-on experience in real world scenarios, allowing students to
                                    practice their skills in a controlled environment. The labs cover various topics
                                    including network security, ethical hacking, and incident response. This addition
                                    aims to enhance practical learning and better prepare our students for the job
                                    market.</p>
                            </li>
                            <li>
                                <h3>Summer Coding Camps for Kids - CTI Junior</h3>
                                <div class="hashtags">
                                    <span class="hashtag">#courseupdate</span>
                                    <span class="hashtag">#newprogram</span>
                                    <span class="hashtag">#CTIJunior</span>
                                </div>
                                <hr>
                                <p>We are excited to announce the launch of our new program, CTI Junior, a series of
                                    summer coding camps designed specifically for kids. These camps will cover the
                                    basics of coding and web development, providing a fun and engaging way for children
                                    to start their journey in the world of technology. The camps will be held throughout
                                    the summer and are open to children aged 8-14. Enroll now to secure a spot for your
                                    child in this exciting new program!</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openTab(tabId) {
                const tabs = document.querySelectorAll('.tab');
                const contents = document.querySelectorAll('.tab-content');
                tabs.forEach(tab => {
                    tab.classList.remove('active');
                });
                contents.forEach(content => {
                    content.classList.remove('active');
                });
                document.querySelector(`[onclick="openTab('${tabId}')"]`).classList.add('active');
                document.getElementById(tabId).classList.add('active');
            }

            function toggleContent(header) {
                const content = header.nextElementSibling;
                const isExpanded = header.getAttribute('aria-expanded') === 'true';
                header.setAttribute('aria-expanded', !isExpanded);
                if (isExpanded) {
                    content.style.display = 'none';
                } else {
                    content.style.display = 'block';
                }
            }
        </script>
    </body>

</html>