@extends('layouts.master')

@section('page_content')
<section>
  <div class="block no-padding  gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner2">
            <div class="inner-title2">
              <h3>About Us</h3>
              <span>Let us introduce our expertise</span>
            </div>
            <div class="page-breacrumbs">
              <ul class="breadcrumbs">
                <li><a href="#" title="">Home</a></li>
                <li><a href="#" title="">Pages</a></li>
                <li><a href="#" title="">About Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<section>
  <div class="block">
    <div class="container">
       <div class="row">
        <div class="col-lg-12">
          <div class="about-us">
            <div class="row">
              <div class="job-grid-sec">
                <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{ asset('EdgeJobPortal/LOGO-GATE.png') }}" style="height: 180px;width: 220px;" alt="" />
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{ asset('EdgeJobPortal/LOGO-INSPIRE.png') }}" style="height: 180px;width: 220px;" alt="" />
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{ asset('EdgeJobPortal/LOGO-SPECTRUM.png') }}" style="height: 180px;width: 300px;" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <h2>EDGE</h2>
                <h5>Explore what our solution has to offer</h5>
              </div>
              <div class="col-lg-12">
                <p>EDGE Education is the pioneer needs based education solutions provider in Trivandrum. We are the first complete solutions provider, bringing a multitude of courses across the education spectrum under one roof, with offerings for school, college students as well as freshers and working professionals. Our technology courses are designed to meet the latest industry standards keeping with the latest trends in hiring across companies in India and outside.</p>
              </div>
              <div class="col-lg-12">
                <p>EDGE is the vision conceptualised by a team of young enterprising professionals working closely with industry experts to bridge the existing gaps in education at all levels through solutions meeting global standards.</p>
              </div>
              <div class="col-lg-12">
                <p>We aim to fill the gap in the availability of appropriate courses in the current market, which ensure employability and career growth. For school children, we aim to bring in a diversity of choices and inspire them to shift away from the unidirectional focus of engineering and medicine. At the college level, we aim to fix the lack of quality and conceptual understanding resulting in a generation of unemployable degree holders. We offer freshers and working professionals a plethora of high-value offerings that are in high demand in the industry.</p>
              </div>
              <div class="col-lg-12">
                <p>EDGE for the first time offers comprehensive solutions for each according to their needs. Courses for school, college, freshers and working professionals all under one roof. The level of exposure provided at each stage equips our students to make informed choices about their future. The industry education interface at edge helps students plan the career paths they desire and assists them in getting employed in the leading roles in the industry.</p>
              </div>
              <div class="col-lg-12">
                <p>EDGE is a first of its kind institute in Kerala offering classroom courses and training on Cloud Computing, Big Data Hadoop, Data Science and Cyber Security. Unlike online courses the students get opportunities to interact with industry experts and test real life scenarios. Working professionals also have the flexibility to join the weekend boot camp sessions to enhance their skill sets.</p>
              </div>
              <div class="col-lg-12">
                <p>EDGE envisages an innovative and different learning experience from the conventional options in the market. We make learning fun, fulfilling and rewarding.</p>
              </div>
            </div>
            <div class="tags-share">
              <div class="share-bar">
                <a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a><a href="#" title="" class="share-google"><i class="la la-google"></i></a><span>Share</span>
              </div>
            </div>
          </div>
        </div>
       </div>
    </div>
  </div>
</section>

<!-- <section>
  <div class="block remove-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="our-services">
            <div class="row">
              <div class="col-lg-12"><h2>Our Service</h2></div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="service">
                  <i class="la la-clock-o"></i><div class="service-info"><h3>Advertise A Job</h3><p>Duis a tristique lacus. Donec vehicula ante id lorem venenatis posuere. Morbi in lectus.</p></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="service">
                  <i class="la la-search"></i><div class="service-info"><h3>CV Search</h3><p>Duis a tristique lacus. Donec vehicula ante id lorem venenatis posuere. Morbi in lectus.</p></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="service">
                  <i class="la la-user"></i><div class="service-info"><h3>Recruiter Profiles</h3><p>Duis a tristique lacus. Donec vehicula ante id lorem venenatis posuere. Morbi in lectus.</p></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="service">
                  <i class="la la-codepen"></i><div class="service-info"><h3>Temp Search</h3><p>Duis a tristique lacus. Donec vehicula ante id lorem venenatis posuere. Morbi in lectus.</p></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="service">
                  <i class="la la-tv"></i><div class="service-info"><h3>Display Jobs</h3><p>Duis a tristique lacus. Donec vehicula ante id lorem venenatis posuere. Morbi in lectus.</p></div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="service">
                  <i class="la la-diamond"></i><div class="service-info"><h3>For Agencies</h3><p>Duis a tristique lacus. Donec vehicula ante id lorem venenatis posuere. Morbi in lectus.</p></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- <section>
  <div class="block">
    <div data-velocity="-.1" style="background: url(EdgeJobPortal/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading light">
            <h2>Kind Words From Happy Candidates</h2>
            <span>What other people thought about the service provided by JobHunt</span>
          </div>
          <div class="reviews-sec" id="reviews-carousel">
            <div class="col-lg-6">
              <div class="reviews">
                <img src="{{ asset('EdgeJobPortal/r1.jpg') }}" alt="" />
                <h3>Augusta Silva <span>Web designer</span></h3>
                <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="reviews">
                <img src="{{ asset('EdgeJobPortal/r2.jpg') }}" alt="" />
                <h3>Ali Tufan <span>Web designer</span></h3>
                <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="reviews">
                <img src="{{ asset('EdgeJobPortal/r1.jpg') }}" alt="" />
                <h3>Augusta Silva <span>Web designer</span></h3>
                <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="reviews">
                <img src="{{ asset('EdgeJobPortal/r2.jpg') }}" alt="" />
                <h3>Ali Tufan <span>Web designer</span></h3>
                <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- <section>
  <div class="block">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="stats-sec style2">
            <div class="row">
              <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
                <div class="stats">
                  <span>18</span>
                  <h5>Jobs Posted</h5>
                </div>
              </div>
              <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
                <div class="stats">
                  <span>38</span>
                  <h5>Jobs Filled</h5>
                </div>
              </div>
              <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
                <div class="stats">
                  <span>67</span>
                  <h5>Companies</h5>
                </div>
              </div>
              <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
                <div class="stats">
                  <span>92</span>
                  <h5>Members</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- <section>
  <div class="block">
    <div data-velocity="-.1" style="background: url(EdgeJobPortal/parallax3.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading">
            <h2>Quick Career Tips</h2>
            <span>Found by employers communicate directly with hiring managers and recruiters.</span>
          </div>
          <div class="blog-sec">
            <div class="row">
              <div class="col-lg-4">
                <div class="my-blog">
                  <div class="blog-thumb">
                    <a href="#" title=""><img src="{{ asset('EdgeJobPortal/b1.jpg') }}" alt="" /></a>
                    <div class="blog-metas">
                      <a href="#" title="">March 29, 2017</a>
                      <a href="#" title="">0 Comments</a>
                    </div>
                  </div>
                  <div class="blog-details">
                    <h3><a href="#" title="">Attract More Attention Sales And Profits</a></h3>
                    <p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
                    <a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="my-blog">
                  <div class="blog-thumb">
                    <a href="#" title=""><img src="{{ asset('EdgeJobPortal/b2.jpg') }}" alt="" /></a>
                    <div class="blog-metas">
                      <a href="#" title="">March 29, 2017</a>
                      <a href="#" title="">0 Comments</a>
                    </div>
                  </div>
                  <div class="blog-details">
                    <h3><a href="#" title="">11 Tips to Help You Get New Clients</a></h3>
                    <p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
                    <a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="my-blog">
                  <div class="blog-thumb">
                    <a href="#" title=""><img src="{{ asset('EdgeJobPortal/b3.jpg') }}" alt="" /></a>
                    <div class="blog-metas">
                      <a href="#" title="">March 29, 2017</a>
                      <a href="#" title="">0 Comments</a>
                    </div>
                  </div>
                  <div class="blog-details">
                    <h3><a href="#" title="">An Overworked Newspaper Editor</a></h3>
                    <p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
                    <a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- <section>
  <div class="block">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading">
            <h2>Companies We've Helped</h2>
            <span>Some of the companies we've helped recruit excellent applicants over the years.</span>
          </div>
          <div class="comp-sec">
            <div class="company-img">
              <a href="#" title=""><img src="{{ asset('EdgeJobPortal/cc1.jpg') }}" alt="" /></a>
            </div>
            <div class="company-img">
              <a href="#" title=""><img src="{{ asset('EdgeJobPortal/cc2.jpg') }}" alt="" /></a>
            </div>
            <div class="company-img">
              <a href="#" title=""><img src="{{ asset('EdgeJobPortal/cc3.jpg') }}" alt="" /></a>
            </div>
            <div class="company-img">
              <a href="#" title=""><img src="{{ asset('EdgeJobPortal/cc4.jpg') }}" alt="" /></a>
            </div>
            <div class="company-img">
              <a href="#" title=""><img src="{{ asset('EdgeJobPortal/cc5.jpg') }}" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

@endsection
