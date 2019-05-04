<?php
include "https://klci.com.ng/header.php"; 
include "https://klci.com.ng/navbar.php"; 

if (isset($_GET['result'])) {

  echo '<div class="container jumbotron" style="margin-top: 70px; margin-bottom:100px; padding: 30px">
  <h3>We appreciate your request to join KLCI, we are currently reviewing your application and we will get back to you shortly. <br><br>Please watch out for a <strong>mail</strong> from us to know the next step.</h3>
  </div>' ;
  
}else{

echo '<div class="container" style="font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;">
  <h2 style="margin-top: 70px;" class="text-center">Join Our Team</h2>

  <p style="margin-top: 10px">
Welcome to the KLCI registration platform for volunteers. KLCI is a youth led non profit organization that uses three pronged approach, Education for Sustainable Development, Mentorship, and Advocacy to reduce inequalities by helping underserved young people to develop life skills and forge trajectory for their career. KLCI uses volunteer mobilization approach to providing mentorship, educational supports, practical leadership training for secondary school students in underserved communities.</p>
<h3 class="text-center">Our Mission Statement</h3>
<hr>
<p style="margin-top: 10px">
Our mission is to reduce inequalities by helping underserved young people to develop life skills and forge trajectory for their career through Education for Sustainable Development (ESD), Mentorship and Advocacy.
</p>

<h3 class="text-center">Eligibility requirements</h3>
<hr>
<ol style="margin-top: 10px">
<li> We are looking for committed volunteers passionate about Educaton of Children living in marginalized communities and are willing to pay it forward through their knowledge, time and resources.</li>

 <li>Volunteers must be willing to co-create, learn, share with others and serve as mentors to the students.</li>

<li>Volunteers must respect the values and ideals of organization and act responsibly at all times in the best interest of the organization.</li>
  </ol>
</div>

<div class="container jumbotron" style="margin-top: 40px; padding: 30px">
  <h4>You are expected to supply the information required accurately and sincerely, as integrity is one of our core values.</h4>
  <h5><b>Note that all questions are compulsory</b></h5>
  <form role="form" action="join_helper.php" method="post">
    <div class="form-group">
  <div class="row" style="margin-top: 30px;">
        <div class="col-md-6">
          <label for="email">Email Address</label>
          <input id="email" class="form-control" name="email" placeholder="Your email address" type="email" required>
        </div>
        <div class="col-md-6">
          <label for="name">Name </label>
          <input class="form-control" id="name" name="name" placeholder="Your full name" type="text" required>
        </div>
      </div>

<div class="row" style="margin-top: 30px;">
        <div class="col-md-3">
          <label>Gender </label><br>
          <div class="radio-inline">
  <label><input type="radio" name="gender" value="male" required>Male</label>
          </div>
          <div class="radio-inline">
  <label><input type="radio" name="gender" value="female">Female</label>
          </div>

          <div class="radio-inline">
  <label><input type="radio" name="gender" value="others">Others</label>
          </div>
        </div>
        <div class="col-md-3">
          <label for="age">Age</label>
          <input class="form-control" id="age" name="age" placeholder="How old are you?" type="number" required>
        </div>
        <div class="col-md-6">
          <label for="location">Location</label>
          <input class="form-control" id="location" name="location" placeholder="Where are you located?" type="text" required>
        </div>
      </div>
  


<div class="row" style="margin-top: 30px;">
        <div class="col-md-6">
          <label for="occupation">Occupation</label>
          <input id="occupation" class="form-control" name="occupation" placeholder="What is your occupation?" type="text" required>
        </div>
        <div class="col-md-6">
          <label for="number">Phone Number</label>
          <input class="form-control" id="number" name="number" placeholder="Your phone number?" type="number" >
        </div>
      </div>

      <div class="row" style="margin-top: 30px;">
        <div class="col-md-6 ">
          <label for="skills">What skills will you be bringing to the table? (100 words)</label>
          <textarea id="skills" class="form-control" name="skills" placeholder="Your answer" type="text" required ></textarea>
        </div>
        <div class="col-md-6 ">
          <label for="why">What does <strong>HOPE</strong> mean to you? (50 words)</label>
          <textarea id="hope" class="form-control" name="hope" placeholder="Your answer" type="text" required></textarea>
        </div>
        
      </div>

  <div class="row" style="margin-top: 30px;">
        <div class="col-md-6 ">
          <label for="do">Describe what you do (100 words)</label>
          <textarea id="do" class="form-control" name="do" placeholder="Your answer" type="text" required ></textarea>
        </div>
        <div class="col-md-6 ">
          <label for="change">How has it put you in a path to make a change? (100 words)</label>
          <textarea id="change" class="form-control" name="change" placeholder="Your answer" type="text" required></textarea>
        </div>
        
      </div>
      <div class="row" style="margin-top: 30px;">
        <div class="col-md-12 ">
         <label for="why">Why do you want to volunteer with KLCI? (100 words)</label>
          <textarea id="why" class="form-control" name="why" placeholder="Include how your personal work, passion and mission aligns with KLCI objectives and mission statement " type="text" required></textarea>
        </div>
        
        
      </div>
      
<div class="row" style="margin-top: 30px;">
        <div class="col-md-4 ">
           <label>How did you get to know about KLCI?</label><br>
          <div class="radio">
  <label><input type="radio" name="how" value="mouth" required>Word of mouth</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="how" value="social">Social media</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="how" value="events">Events</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="how" value="member">KLCI member</label>
          </div>
        </div>

        <div class="col-md-4 ">
           <label>How long do you want to stay with us? </label><br>
          <div class="radio">
  <label><input type="radio" name="duration"  value="sixmonths" required>6 months</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="duration" value="oneyear">1 year</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="duration" value="twoyears">2 years and above</label>
          </div>
        </div>
        
        <div class="col-md-4 ">
           <label>Date of birth? </label><br>
           <input id="dob" class="form-control" name="dob" placeholder="Format (02/06/1998)" type="text" required>
        </div>

      </div>

     

      <div class="row" style="margin-top: 30px;">
        <div class="col-md-4 ">
           <label>Which of these volunteering role would you prefer?</label><br>
          <div class="radio">
  <label><input type="radio"  name="role" value="online" required>Online</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="role" value="onsite">Onsite</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="role" value="both">Both</label>
          </div>
        </div>
        <div class="col-md-4 ">
           <label>How many hours can you dedicate to the volunteering work in a week?</label><br>
          <div class="radio">
  <label><input type="radio" name="dedicate" value="twohours" required>2 hours</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="dedicate" value="fourhours">4 hours</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="dedicate" value="sixhours">6 hours</label>
          </div>
        </div>
      
        <div class="col-md-4 ">
          <label for="degree">Degree</label><br>
          <div class="radio">
  <label><input type="radio" name="degree" value="masters" required>Masters</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="degree" value="bachelor">Bachelor</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="degree" value="undergraduate">Undergraduate</label>
          </div>
          <div class="radio">
  <label><input type="radio" name="degree" value="jambite">Jambite</label>
          </div>
        </div>
      
      
      </div>
      
</div>
<input type="submit"  class="btn  btn-lg pull-right carousel-btn" value="Submit">
</div>

  </form>

  <div class="container jumbotron confirm" > 
    <h2>Thank you for showing interest, we will get back to you shortly!</h2>
  </div>
';
}


include "https://klci.com.ng/footer.php"; ?>

<script type="text/javascript">
  var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
  (function () {
    var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src =\'https://embed.tawk.to/5c652e666c0a8d38ecc705b4/default\';
    s1.charset =\'UTF-8\';
    s1.setAttribute(\'crossorigin\',\'*\');
s0.parentNode.insertBefore(s1, s0);
  })();
</script>
<!--End of Tawk.to Script-->
</body>

</html>