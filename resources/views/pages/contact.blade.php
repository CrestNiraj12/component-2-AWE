<x-app-layout>
    <div class="page-heading contact-heading header-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="text-content">
                <h4>contact us</h4>
                <h2>let’s get in touch</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
  
  
      <div class="find-us">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Our Location on Maps</h2>
              </div>
            </div>
            <div class="col-md-8">
              <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6294.793242141785!2d85.31601139680548!3d27.691550980218715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19b19295555f%3A0xabfe5f4b310f97de!2sThe%20British%20College%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1641938579834!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
            </div>
            <div class="col-md-4">
              <div class="left-content">
                <h4>About our office</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti.</p>
                <ul class="social-icons">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-behance"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      
      <div class="send-message">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Send us a Message</h2>
              </div>
            </div>
            <div class="col-md-8">
              <div class="contact-form">
                <form id="contact" action="{{ url("send-message") }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      @auth
                      <fieldset>
                        <input name="name" value="{{ Auth::user()->name }}" disabled type="text" class="form-control" id="name" placeholder="Full Name" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset>
                          <input name="email" value="{{ Auth::user()->email }}" disabled type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
                        </fieldset>
                      </div>
                      @endauth
                      @guest
                      <fieldset>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset>
                          <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
                        </fieldset>
                      </div>
                      @endguest
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <fieldset>
                        <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-4">
              <ul class="accordion">
                <li>
                    <a>Accordion Title One</a>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite.</p>
                    </div>
                </li>
                <li>
                    <a>Second Title Here</a>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite.</p>
                    </div>
                </li>
                <li>
                    <a>Accordion Title Three</a>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite.</p>
                    </div>
                </li>
                <li>
                    <a>Fourth Accordion Title</a>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite.</p>
                    </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  
      <div class="happy-clients">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Our Happy Customers</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="owl-clients owl-carousel">
                <div class="client-item">
                  <img src="{{ asset("images/client-01.png") }}" alt="1">
                </div>
                
                <div class="client-item">
                  <img src="{{ asset("images/client-01.png") }}" alt="2">
                </div>
                
                <div class="client-item">
                  <img src="{{ asset("images/client-01.png") }}" alt="3">
                </div>
                
                <div class="client-item">
                  <img src="{{ asset("images/client-01.png") }}" alt="4">
                </div>
                
                <div class="client-item">
                  <img src="{{ asset("images/client-01.png") }}" alt="5">
                </div>
                
                <div class="client-item">
                  <img src="{{ asset("images/client-01.png") }}" alt="6">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>