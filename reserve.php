<?php
require ('SinglePage.php');

$homepage = new SinglePage();

$homepage -> setImageLink("https://www.thelocal.de/userdata/images/article/ae56fc05831d6ab26b82dc0840dab79182b8c0e70b44416c7228e4f9c8f45931.jpg");
$homepage -> setPageTitle("Ticket Reservation");
$homepage -> setPageSubtitle("Buy Ticket for Europe Trips!");
$homepage -> setContent(
"<div class='main--content col-md-8 pb--60' data-trigger='stickyScroll'>
                        <div class='main--content-inner drop--shadow'>
						<form action='action.php' method='post'>
                                <div class='row gutter--20'>
                                    

                                    <div class='col-xs-12'>
                                        <div class='form-group'>
                                            <textarea name='message' placeholder='Message *' class='form-control' required></textarea>
                                        </div>
                                    </div>

                                    <div class='col-xs-12'>
                                        <button name='submit' type='submit' class='btn btn-primary mt--10'>Send Message</button>
                                    </div>
                                </div>

                                <div class='status'></div>
                            </form>
							<br>
                            <!-- Topics List Start -->
                            <div class='topics--list'>
                                <table class='table'>
                                    <thead class='ff--primary fs--14 text-darkest'>
                                        <tr>
                                            <th>Forum</th>
                                            <th>Topics</th>
                                            <th>Post</th>
                                            <th>Frieshness</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                <h4 class='h6 fw--500 text-darkest'><a href='sub-forums.html' class='btn-link'>User Interface Design</a></h4>

                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry standard dummy text.</p>
                                            </td>
                                            <td>
                                                <p class='ff--primary fw--500 fs--14 text-darkest'>12</p>
                                            </td>
                                            <td>
                                                <p class='ff--primary fw--500 fs--14 text-darkest'>49</p>
                                            </td>
                                            <td>
                                                <p>2 days, 5 hours ago</p>

                                                <a href='member-activity-personal.html' class='topic--author'>
                                                    <span class='name'>David J. Kleiner</span>
                                                    <span class='avatar'><img src='img/topics-img/avatar-01.jpg' alt=''></span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4 class='h6 fw--500 text-darkest'><a href='sub-forums.html' class='btn-link'>Front-End Engineering</a></h4>

                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry standard dummy text.</p>

                                                <ul class='subforums nav mt--10 text-darkest'>
                                                    <li><i class='fa fa-circle-thin mr--10 text-primary'></i></li>
                                                    <li><a href='topics.html'>HTML (12, 245)</a></li>
                                                    <li><a href='topics.html'>CSS (21, 108)</a></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <p class='ff--primary fw--500 fs--14 text-darkest'>07</p>
                                            </td>
                                            <td>
                                                <p class='ff--primary fw--500 fs--14 text-darkest'>12</p>
                                            </td>
                                            <td>
                                                <p>2 days, 5 hours ago</p>

                                                <a href='member-activity-personal.html' class='topic--author'>
                                                    <span class='name'>Karen S. Barker</span>
                                                    <span class='avatar'><img src='img/topics-img/avatar-02.jpg' alt=''></span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4 class='h6 fw--500 text-darkest'><a href='sub-forums.html' class='btn-link'>Web Development</a></h4>

                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry standard dummy text.</p>
                                            </td>
                                            <td>
                                                <p class='ff--primary fw--500 fs--14 text-darkest'>05</p>
                                            </td>
                                            <td>
                                                <p class='ff--primary fw--500 fs--14 text-darkest'>42</p>
                                            </td>
                                            <td>
                                                <p>2 days, 5 hours ago</p>

                                                <a href='member-activity-personal.html' class='topic--author'>
                                                    <span class='name'>Stuart B. Figueroa</span>
                                                    <span class='avatar'><img src='img/topics-img/avatar-03.jpg' alt=''></span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4 class='h6 fw--500 text-darkest'><a href='sub-forums.html' class='btn-link'>Social Media Marketing</a></h4>

                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry standard dummy text.</p>
                                            </td>
                                            <td>
                                                <p class='ff--primary fw--500 fs--14 text-darkest'>10</p>
                                            </td>
                                            <td>
                                                <p class='ff--primary fw--500 fs--14 text-darkest'>50</p>
                                            </td>
                                            <td>
                                                <p>2 days, 5 hours ago</p>

                                                <a href='member-activity-personal.html' class='topic--author'>
                                                    <span class='name'>Cathy T. Frazier</span>
                                                    <span class='avatar'><img src='img/topics-img/avatar-04.jpg' alt=''></span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4 class='h6 fw--500 text-darkest'><a href='sub-forums.html' class='btn-link'>Content Marketing</a></h4>

                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry standard dummy text.</p>
                                            </td>
                                            <td>
                                                <p class='ff--primary fw--500 fs--14 text-darkest'>10</p>
                                            </td>
                                            <td>
                                                <p class='ff--primary fw--500 fs--14 text-darkest'>50</p>
                                            </td>
                                            <td>
                                                <p>2 days, 5 hours ago</p>

                                                <a href='member-activity-personal.html' class='topic--author'>
                                                    <span class='name'>Jane Doe</span>
                                                    <span class='avatar'><img src='img/topics-img/avatar-05.jpg' alt=''></span>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Topics List End -->
                        </div>
                    </div>");
$homepage -> renderAll();