@extends('frontend.master')

@section('content')
     <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Service Details</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <!-- Main Content Area -->
          <div class="col-lg-7">

            <!-- Hero Service Introduction -->
            <div class="service-hero" data-aos="fade-up" data-aos-delay="100">
              <div class="service-meta">
                <span class="service-category">Strategic Consulting</span>
                <span class="reading-time">5 min read</span>
              </div>
              <h1>Business Process Optimization</h1>
              <p class="service-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra.</p>
            </div>

            <!-- Service Visual -->
            <div class="service-visual" data-aos="zoom-in" data-aos-delay="200">
              <img src="{{asset('frontend/assets/img/services/services-7.webp')}}" alt="Business Process Optimization" class="img-fluid">
            </div>

            <!-- Service Content -->
            <div class="service-narrative" data-aos="fade-up" data-aos-delay="300">
              <h3>Transform Your Operations</h3>
              <p>Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta.</p>

              <p>Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec sollicitudin molestie malesuada.</p>

              <!-- Key Benefits Grid -->
              <div class="benefits-grid" data-aos="fade-up" data-aos-delay="400">
                <div class="benefit-card">
                  <div class="benefit-icon">
                    <i class="bi bi-lightning-charge"></i>
                  </div>
                  <h4>Efficiency Boost</h4>
                  <p>Curabitur arcu erat accumsan id imperdiet et porttitor at sem.</p>
                </div>

                <div class="benefit-card">
                  <div class="benefit-icon">
                    <i class="bi bi-shield-check"></i>
                  </div>
                  <h4>Risk Mitigation</h4>
                  <p>Pellentesque in ipsum id orci porta dapibus vestibulum ante ipsum.</p>
                </div>

                <div class="benefit-card">
                  <div class="benefit-icon">
                    <i class="bi bi-graph-up"></i>
                  </div>
                  <h4>Growth Acceleration</h4>
                  <p>Vivamus suscipit tortor eget felis porttitor volutpat mauris blandit.</p>
                </div>

                <div class="benefit-card">
                  <div class="benefit-icon">
                    <i class="bi bi-people"></i>
                  </div>
                  <h4>Team Alignment</h4>
                  <p>Donec rutrum congue leo eget malesuada vivamus magna justo lacinia.</p>
                </div>
              </div>

            </div>

            <!-- Implementation Timeline -->
            <div class="timeline-section" data-aos="fade-up" data-aos-delay="500">
              <h3>Implementation Journey</h3>
              <div class="timeline">
                <div class="timeline-item">
                  <div class="timeline-marker">
                    <span>1</span>
                  </div>
                  <div class="timeline-content">
                    <h4>Discovery &amp; Assessment</h4>
                    <p>Comprehensive analysis of current processes and identification of optimization opportunities.</p>
                    <small>Week 1-2</small>
                  </div>
                </div>

                <div class="timeline-item">
                  <div class="timeline-marker">
                    <span>2</span>
                  </div>
                  <div class="timeline-content">
                    <h4>Strategic Planning</h4>
                    <p>Development of customized optimization roadmap with clear milestones and success metrics.</p>
                    <small>Week 3-4</small>
                  </div>
                </div>

                <div class="timeline-item">
                  <div class="timeline-marker">
                    <span>3</span>
                  </div>
                  <div class="timeline-content">
                    <h4>Implementation</h4>
                    <p>Systematic rollout of process improvements with continuous monitoring and adjustment.</p>
                    <small>Week 5-12</small>
                  </div>
                </div>

                <div class="timeline-item">
                  <div class="timeline-marker">
                    <span>4</span>
                  </div>
                  <div class="timeline-content">
                    <h4>Optimization &amp; Scale</h4>
                    <p>Fine-tuning of implemented solutions and preparation for organization-wide scaling.</p>
                    <small>Week 13-16</small>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- End Main Content -->

          <!-- Service Sidebar -->
          <div class="col-lg-5">
            <div class="service-sidebar" data-aos="fade-up" data-aos-delay="200">

              <!-- Service Overview Card -->
              <div class="overview-card">
                <div class="overview-header">
                  <h4>Service Overview</h4>
                </div>
                <div class="overview-stats">
                  <div class="stat-item">
                    <div class="stat-number">16</div>
                    <div class="stat-label">Weeks Duration</div>
                  </div>
                  <div class="stat-item">
                    <div class="stat-number">85%</div>
                    <div class="stat-label">Efficiency Gain</div>
                  </div>
                  <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Support Access</div>
                  </div>
                </div>

                <div class="overview-details">
                  <div class="detail-row">
                    <span class="detail-label">Investment Range</span>
                    <span class="detail-value">$15K - $45K</span>
                  </div>
                  <div class="detail-row">
                    <span class="detail-label">Team Composition</span>
                    <span class="detail-value">3-5 Specialists</span>
                  </div>
                  <div class="detail-row">
                    <span class="detail-label">Industries Served</span>
                    <span class="detail-value">Manufacturing, Tech, Finance</span>
                  </div>
                </div>
              </div>

              <!-- Client Success Story -->
              <div class="success-story">
                <div class="story-quote">
                  <p>"Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas."</p>
                </div>
                <div class="story-author">
                  <img src="{{asset('frontend/assets/img/person/person-m-8.webp')}}" alt="Michael Chen" class="author-avatar">
                  <div class="author-details">
                    <h5>Michael Chen</h5>
                    <span>Operations Director</span>
                    <small>TechCorp Industries</small>
                  </div>
                </div>
                <div class="story-metrics">
                  <div class="metric">
                    <span class="metric-value">45%</span>
                    <span class="metric-label">Cost Reduction</span>
                  </div>
                  <div class="metric">
                    <span class="metric-value">3x</span>
                    <span class="metric-label">Speed Increase</span>
                  </div>
                </div>
              </div>

              <!-- Consultation Form -->
              <div class="consultation-form">
                <div class="form-header">
                  <h4>Schedule Consultation</h4>
                  <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>
                </div>

                <form action="forms/consultation.php" method="post" class="php-email-form">
                  <div class="form-group">
                    <input type="text" name="name" class="form-input" placeholder="Full Name" required="">
                  </div>

                  <div class="form-group">
                    <input type="email" name="email" class="form-input" placeholder="Email Address" required="">
                  </div>

                  <div class="form-group">
                    <input type="tel" name="phone" class="form-input" placeholder="Phone Number">
                  </div>

                  <input type="hidden" name="subject" value="Business Process Optimization Consultation">

                  <div class="form-group">
                    <textarea name="message" class="form-input" rows="4" placeholder="Tell us about your current challenges and goals..." required=""></textarea>
                  </div>

                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your consultation request has been sent. Thank you!</div>

                  <button type="submit" class="btn-consultation">
                    <span>Book Free Consultation</span>
                    <i class="bi bi-arrow-right"></i>
                  </button>
                </form>
              </div>

            </div>
          </div><!-- End Sidebar -->

        </div>

      </div>

    </section><!-- /Service Details Section -->

      <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection