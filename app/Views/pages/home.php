<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>

<!-- Add SweetAlert and jQuery CDN in the head section -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<main class="main">

<section id="hero" class="hero section min-vh-100 d-flex align-items-center position-relative" style="background: url('assets/images/offshore-image.jpg') center/cover no-repeat; margin-top: 0;">
      <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.3);"></div>

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="badge-wrapper mb-3">
              <div class="d-inline-flex align-items-center rounded-pill border border-light">
                <div class="icon-circle me-2">
                  <i class="bi bi-check-circle-fill text-white"></i>
                </div>
                <span class="badge-text me-3 text-white">Innovating Offshore Operations</span>
              </div>
            </div>

            <h1 class="hero-title mb-4 text-white">Asset Management and Inspection Verification for Marine, Offshore, and Heavy Lift Industries</h1>

            <p class="hero-description mb-4 text-white">Ensure safety, compliance, and efficiency with trusted inspection and asset tracking solutions</p>

            <div class="cta-wrapper">
              <a href="https://demo.oilid.com" class="btn btn-primary btn-lg" target="_blank" rel="noopener">Launch Demo<i class="bi bi-box-arrow-up-right ms-2"></i></a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are">Who We Are</p>
            <h3>Track. Inspect. Trust. Asset Management for heavy oil lifting gear</h3>
            <p class="fst-italic">
              We provide RFID-based asset tracking for heavy oil lifting gear, seamlessly integrating complete inspection histories and inspector records for smarter, safer operations.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>All Your Gear, One Smart System: Centralize certificates, inspections, manuals, and maintenance logs—easy to access, search, and report.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Fast Setup, Zero Hassle: Off-the-shelf, low-config solution that works online or offline, with minimal training and rapid rollout.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Built to Grow, Backed by You: Scalable, direct support, and a voice in future enhancements</span></li>
            </ul>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="assets/images/offshore-image-3.jpeg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="assets/images/offshore-image-2.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="assets/images/handheld-tracker.jpg" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- /About Section -->

    <section id="how-we-work" class="how-we-work section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Problems</h2>
        <p>Engineered to Eliminate Problems</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="steps-5">
          <div class="process-container">

            <div class="process-item" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <span class="step-number">01</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-exclamation-octagon"></i>
                  </div>
                  <div class="step-content">
                    <h3>Unidentifiable Equipment</h3>
                    <p>Equipment is often not identifiable, leading to delays and inefficiencies in operations.</p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->

            <div class="process-item" data-aos="fade-up" data-aos-delay="300">
              <div class="content">
                <span class="step-number">02</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-exclamation-octagon"></i>
                  </div>
                  <div class="step-content">
                    <h3>Expired Equipments</h3>
                    <p>Equipment may be used beyond its expiration date, leading to safety risks and potential failures.</p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->

            <div class="process-item" data-aos="fade-up" data-aos-delay="400">
              <div class="content">
                <span class="step-number">03</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-exclamation-octagon"></i>
                  </div>
                  <div class="step-content">
                    <h3>Missed Routine Inspections</h3>
                    <p>Routine inspections may be missed due to human error or scheduling conflicts, leading to potential safety issues.</p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->

            <div class="process-item" data-aos="fade-up" data-aos-delay="500">
              <div class="content">
                <span class="step-number">04</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-exclamation-octagon"></i>
                  </div>
                  <div class="step-content">
                    <h3>Lost Certificates</h3>
                    <p>Lost certificates can lead to delays and inefficiencies in operations, as well as potential safety risks.</p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->

            <div class="process-item" data-aos="fade-up" data-aos-delay="500">
              <div class="content">
                <span class="step-number">05</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-exclamation-octagon"></i>
                  </div>
                  <div class="step-content">
                    <h3>No Track of Location</h3>
                    <p>No track of location can lead to delays and inefficiencies in operations, as well as potential safety risks.</p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->

            <div class="process-item" data-aos="fade-up" data-aos-delay="500">
              <div class="content">
                <span class="step-number">06</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-exclamation-octagon"></i>
                  </div>
                  <div class="step-content">
                    <h3>Non-compliance with Authority requirements</h3>
                    <p>Non-compliance with Authority requirements can lead to delays and inefficiencies in operations, as well as potential safety risks.</p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->

          </div>
        </div>

      </div>

    </section><!-- /How We Work Section -->

    <section id="services-alt" class="services-alt section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="content-block">
              <h6 class="subtitle">Our innovative services</h6>
              <h2 class="title">Transform the Way You Track and Manage Lifting Equipment</h2>
              <p class="description">
                OILID combines RFID and IoT to give you unmatched visibility, control, and insight across your operations
              </p>
              <div class="button-wrapper">
                <a class="btn" href="#contact"><span>Contact Us</span></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="services-list">
              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                <div class="service-icon">
                  <i class="bi bi-code-square"></i>
                </div>
                <div class="service-content">
                  <h4><a href="" style="cursor: default;">Real-time visibility with RFID + IoT</a></h4>
                  <p>Know exactly where your lifting gear is—anytime, anywhere. No more guesswork, just instant, accurate tracking.</p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="service-icon">
                  <i class="bi bi-graph-up"></i>
                </div>
                <div class="service-content">
                  <h4><a href="" style="cursor: default;">Smarter, faster field operations</a></h4>
                  <p>Speed up response times and reduce human error with automated data capture and streamlined workflows.</p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="service-icon">
                  <i class="bi bi-phone"></i>
                </div>
                <div class="service-content">
                  <h4><a href="" style="cursor: default;">Full inspection history at your fingertips</a></h4>
                  <p>Access complete inspection records and inspector logs in seconds—boosting compliance and confidence.</p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                <div class="service-icon">
                  <i class="bi bi-gear"></i>
                </div>
                <div class="service-content">
                  <h4><a href="" style="cursor: default;">Lower costs, tighter control</a></h4>
                  <p>Cut storage overhead and gain better control over asset utilization and credit lines with data-driven insights.</p>
                </div>
              </div><!-- End Service Item -->
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Services Alt Section -->

    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>We'd love to hear from you. Please fill out the form below and we'll get back to you as soon as possible.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-12">
            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="400">
              <form id="contactForm">
                <div class="row">
                  <div class="col-12 form-group">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-person"></i></span>
                      <input type="text" name="name" class="form-control" id="name-field" placeholder="Your name*" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 form-group">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                      <input type="email" class="form-control" name="email" id="email-field" placeholder="Email address*" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 form-group">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-inbox-fill"></i></span>
                      <input type="text" class="form-control" name="subject" id="subject-field" placeholder="Subject*" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 form-group">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                      <textarea class="form-control" name="message" id="message-field" rows="6" placeholder="Write a message*" required></textarea>
                    </div>
                  </div>
                  <!-- Add CAPTCHA section -->
                  <div class="col-12 form-group mt-3">
                    <div class="captcha-wrapper border rounded p-3">
                      <div class="d-flex align-items-center mb-2">
                        <span class="input-group-text me-2"><i class="bi bi-shield-lock"></i></span>
                        <span class="fw-bold">Security Check</span>
                      </div>
                      <div class="d-flex align-items-center mb-3">
                        <div class="captcha-display bg-light p-2 rounded me-2">
                          <span id="captcha-display" class="fw-bold letter-spacing-2"></span>
                        </div>
                        <button type="button" id="refresh-captcha" class="btn btn-outline-secondary btn-sm">
                          <i class="bi bi-arrow-clockwise"></i>
                        </button>
                      </div>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-keyboard"></i></span>
                        <input type="text" class="form-control" id="captcha-field" placeholder="Enter the code above*" required>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit Email</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- /Contact Section -->

</main>

<script>
$(document).ready(function() {
    // Get the base URL from CodeIgniter
    const baseUrl = '<?= base_url() ?>';

    // Function to generate new CAPTCHA
    function generateCaptcha() {
        $.get(baseUrl + '/contact/generate', function(data) {
            if(data && data.status === 'success') {
                $('#captcha-display').text(data.captcha);
                console.log('Generated CAPTCHA:', data.captcha); // Debug log
            }
        }).fail(function(error) {
            console.error('CAPTCHA generation failed:', error);
        });
    }

    // Generate initial CAPTCHA
    generateCaptcha();

    // Refresh CAPTCHA button
    $('#refresh-captcha').click(function(e) {
        e.preventDefault();
        generateCaptcha();
    });

    // Form submission
    $('#contactForm').submit(function(e) {
        e.preventDefault();

        const captchaValue = $('#captcha-field').val();
        console.log('Submitting CAPTCHA:', captchaValue); // Debug log

        // First validate CAPTCHA
        $.ajax({
            url: baseUrl + '/contact/validate',
            type: 'POST',
            data: {
                captcha: captchaValue
            },
            success: function(response) {
                console.log('Validation response:', response); // Debug log
                if (response.valid) {
                    submitForm();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid CAPTCHA',
                        text: 'Please enter the correct CAPTCHA code.',
                        confirmButtonColor: '#3085d6'
                    });
                    generateCaptcha();
                }
            },
            error: function(error) {
                console.error('CAPTCHA validation error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'CAPTCHA validation failed. Please try again.',
                    confirmButtonColor: '#3085d6'
                });
                generateCaptcha();
            }
        });
    });

    function submitForm() {
        const formData = {
            name: $('#name-field').val(),
            email: $('#email-field').val(),
            subject: $('#subject-field').val(),
            message: $('#message-field').val(),
            captcha: $('#captcha-field').val()
        };

        console.log('Submitting form with data:', formData); // Debug log

        // Show loading state
        Swal.fire({
            title: 'Sending...',
            text: 'Please wait while we send your message.',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Send form data
        $.ajax({
            url: baseUrl + '/contact/sendEmail',
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log('Form submission response:', response); // Debug log
                if (response.status === 'success') {
                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Your message has been sent successfully.',
                        confirmButtonColor: '#3085d6'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Reset form
                            $('#contactForm')[0].reset();
                            // Generate new CAPTCHA
                            generateCaptcha();
                        }
                    });
                } else {
                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message || 'Something went wrong! Please try again.',
                        confirmButtonColor: '#3085d6'
                    });
                    // Generate new CAPTCHA
                    generateCaptcha();
                }
            },
            error: function(error) {
                console.error('Form submission error:', error);
                // Show error message
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again later.',
                    confirmButtonColor: '#3085d6'
                });
                // Generate new CAPTCHA
                generateCaptcha();
            }
        });
    }
});
</script>

<?= $this->endSection() ?>