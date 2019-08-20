@extends('layouts.master')

@section('page_content')
<section>
  <div class="block no-padding  gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner2">
            <div class="inner-title2">
              <h3>Contact</h3>
              <span>Keep up to date with the latest news</span>
            </div>
            <div class="page-breacrumbs">
              <ul class="breadcrumbs">
                <li><a href="#" title="">Home</a></li>
                <li><a href="#" title="">Pages</a></li>
                <li><a href="#" title="">Contact</a></li>
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
  <div class="block remove-bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-map">
            <div id="map_div">&nbsp;</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="block">
    <div class="container">
       <div class="row">
        <div class="col-lg-6 column">
          <div class="contact-form">
            <h3>Keep In Touch</h3>
            <form>
              <div class="row">
                <div class="col-lg-12">
                  <span class="pf-title">Full Name</span>
                  <div class="pf-field">
                    <input type="text" placeholder="ALi TUFAN" />
                  </div>
                </div>
                <div class="col-lg-12">
                  <span class="pf-title">Email</span>
                  <div class="pf-field">
                    <input type="text" placeholder="ALi TUFAN" />
                  </div>
                </div>
                <div class="col-lg-12">
                  <span class="pf-title">Subject</span>
                  <div class="pf-field">
                    <input type="text" placeholder="ALi TUFAN" />
                  </div>
                </div>
                <div class="col-lg-12">
                  <span class="pf-title">Message</span>
                  <div class="pf-field">
                    <textarea></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <button type="submit" style="background-color: #00abcc;color: #ffff;border: #00abcc;s" class="form-control">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6 column">
          <div class="contact-textinfo style2">
            <h3>Edge Office</h3>
            <ul>
              <li><i class="la la-map-marker"></i><span>Sri Chithra Nagar, Kowdiar, Trivandrum, 695003</span></li>
              <li><i class="la la-phone"></i><span>Call Us : +91 906 148 4877</span></li>
              <!-- <li><i class="la la-fax"></i><span>Fax : </span></li> -->
              <li><i class="la la-envelope-o"></i><span>Email : <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7a13141c153a101518120f140e54191517">info@edgeeducation.co.in</a></span></li>
            </ul>
          </div>
        </div>
       </div>
    </div>
  </div>
</section>

@endsection
