@extends('layouts.candidate')

@section('page_content')
		<h3>Blog</h3>
@endsection

@section('content')
<section>
  <div class="block">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 column">
          <div class="job-single-sec">
            <div class="job-single-head">
              <div class="job-thumb"> <img src="{{ asset('EdgeJobPortal/sj.png') }}" alt="" /> </div>
              <div class="job-head-info">
                <h4>Tix Dog</h4>
                <span>274 Seven Sisters Road, London, N4 2HY</span>
                <p><i class="la la-unlink"></i> www.jobhunt.com</p>
                <p><i class="la la-phone"></i> +90 538 963 54 87</p>
                <p><i class="la la-envelope-o"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5a3b3633742e2f3c3b341a303538322f342e74393537">[email&#160;protected]</a></p>
              </div>
            </div><!-- Job Head -->
            <div class="job-details">
              <h3>Job Description</h3>
              <p>Company is a 2016 Iowa City-born start-up that develops consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
              <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien</p>
              <h3>Required Knowledge, Skills, and Abilities</h3>
              <ul>
                <li>Ability to write code – HTML & CSS (SCSS flavor of SASS preferred when writing CSS)</li>
                <li>Proficient in Photoshop, Illustrator, bonus points for familiarity with Sketch (Sketch is our preferred concepting)</li>
                <li>Cross-browser and platform testing as standard practice</li>
                <li>Experience using Invision a plus</li>
                <li>Experience in video production a plus or, at a minimum, a willingness to learn</li>
              </ul>
              <h3>Education + Experience</h3>
              <ul>
                <li>Advanced degree or equivalent experience in graphic and web design</li>
                <li>3 or more years of professional design experience</li>
                <li>Direct response email experience</li>
                <li>Ecommerce website design experience</li>
                <li>Familiarity with mobile and web apps preferred</li>
                <li>Excellent communication skills, most notably a demonstrated ability to solicit and address creative and design feedback</li>
                <li>Must be able to work under pressure and meet deadlines while maintaining a positive attitude and providing exemplary customer service</li>
                <li>Ability to work independently and to carry out assignments to completion within parameters of instructions given, prescribed routines, and standard accepted practices</li>
              </ul>
            </div>
            <div class="share-bar">
              <span>Share</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
            </div>
            <div class="recent-jobs">
              <h3>Recent Jobs</h3>
              <div class="job-list-modern">
                <div class="job-listings-sec no-border">
                  <div class="job-listing wtabs">
                    <div class="job-title-sec">
                      <div class="c-logo"> <img src="{{ asset('EdgeJobPortal/l1.png') }}" alt="" /> </div>
                      <h3><a href="#" title="">Web Designer / Developer</a></h3>
                      <span>Massimo Artemisis</span>
                      <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                    </div>
                    <div class="job-style-bx">
                      <span class="job-is ft">Full time</span>
                      <span class="fav-job"><i class="la la-heart-o"></i></span>
                      <i>5 months ago</i>
                    </div>
                  </div>
                  <div class="job-listing wtabs">
                    <div class="job-title-sec">
                      <div class="c-logo"> <img src="{{ asset('EdgeJobPortal/l2.png') }}" alt="" /> </div>
                      <h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
                      <span>Massimo Artemisis</span>
                      <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                    </div>
                    <div class="job-style-bx">
                      <span class="job-is pt ">Part time</span>
                      <span class="fav-job"><i class="la la-heart-o"></i></span>
                      <i>5 months ago</i>
                    </div>
                  </div><!-- Job -->
                  <div class="job-listing wtabs">
                    <div class="job-title-sec">
                      <div class="c-logo"> <img src="{{ asset('EdgeJobPortal/l3.png') }}" alt="" /> </div>
                      <h3><a href="#" title="">Regional Sales Manager South</a></h3>
                      <span>Massimo Artemisis</span>
                      <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                    </div>
                    <div class="job-style-bx">
                      <span class="job-is ft ">Full time</span>
                      <span class="fav-job"><i class="la la-heart-o"></i></span>
                      <i>5 months ago</i>
                    </div>
                  </div><!-- Job -->
                  <div class="job-listing wtabs">
                    <div class="job-title-sec">
                      <div class="c-logo"> <img src="{{ asset('EdgeJobPortal/l4.png') }}" alt="" /> </div>
                      <h3><a href="#" title="">Marketing Dairector</a></h3>
                      <span>Massimo Artemisis</span>
                      <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                    </div>
                    <div class="job-style-bx">
                      <span class="job-is ft ">Full time</span>
                      <span class="fav-job"><i class="la la-heart-o"></i></span>
                      <i>5 months ago</i>
                    </div>
                  </div><!-- Job -->
                </div>
               </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 column">
          <a class="apply-thisjob" href="#" title=""><i class="la la-paper-plane"></i>Apply for job</a>
          <div class="apply-alternative">
            <a href="#" title=""><i class="fa fa-linkedin"></i> Apply with Linkedin</a>
            <span><i class="la la-heart-o"></i> Shortlist</span>
          </div>
          <div class="job-overview">
            <h3>Job Overview</h3>
            <ul>
              <li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li>
              <li><i class="la la-mars-double"></i><h3>Gender</h3><span>Female</span></li>
              <li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>Executive</span></li>
              <li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>Management</span></li>
              <li><i class="la la-shield"></i><h3>Experience</h3><span>2 Years</span></li>
              <li><i class="la la-line-chart "></i><h3>Qualification</h3><span>Bachelor Degree</span></li>
            </ul>
          </div><!-- Job Overview -->
          <div class="job-location">
            <h3>Job Location</h3>
            <div class="job-lctn-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d926917.0482572999!2d-104.57738594649922!3d40.26036964524562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2s!4v1513784737244"></iframe>
            </div>
          </div>
          <div class="extra-job-info">
            <span><i class="la la-clock-o"></i><strong>35</strong> Days</span>
            <span><i class="la la-search-plus"></i><strong>35697</strong> Displayed</span>
            <span><i class="la la-file-text"></i><strong>300-500</strong> Application</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
