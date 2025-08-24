@extends('layouts.app')

@section('title', 'Let Your Soul Roar')

@section('content')

<!-- Banner with Video Background -->
<div class="video-container position-relative">
    <video autoplay muted loop class="w-100" style="height: 100vh; object-fit: cover;">
        <source src="{{ asset('videos/banner1.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Text Over Video -->
    <div class="position-absolute top-50 start-50 translate-middle text-center text-white" style="z-index: 2;">
        <h1 class="display-4 text-marge"  >Let Your Soul Roar</h1>
        <p class="lead">Step into the alchemy of Mind, Body and Soul trinity.
                Let the inner alchemy of your soul path 
                remembers you!</p>
        <a href="/book-session" class="btn btn-light rounded-pill px-4 mt-3">start your healing journey</a>
    </div> 
</div>

<!-- Overlapping LYSR Section -->
<section class="position-relative" style="margin-top:-150px; z-index: 3;">
    <div class="container">
        <div class="bg-green-pic text-white p-5 rounded-4 shadow" style="max-width: 1134px;height:356px; margin: 0 auto;">
            <p class="text-center mb-3" style="font-family: 'Marge', serif;letter-spacing: 4%;font-weight: 400;letter-spacing: 0.04em;font-size :46px;margin:auto">The LYSR Project</p>
            <p class="text-center">
                <strong style="text-transform: capitalize;">bridging ancient wisdom with modern healing.</strong><br>
                The lysr project is a sacred movement uniting timeless traditions yogic science, ayurveda, shamanism, and
                celtic wisdom to awaken mind, body, and soul. we offer a sanctuary for transformation through immersive
                retreats, healing blogs, and conscious workshops. this is a space beyond borders and identities, where all
                beings are welcome, and the soul is free to remember, heal, and rise.
                <br>Heal. Remember. Awaken.
                <br><em style="text-transform: uppercase;">let your soul roar.</em>
            </p>
            <div class="text-center mt-4" style="margin-bottom:-60px; z-index: 2;">
                <img src="{{ asset('images/divider.png') }}" alt="Divider" width="200">
            </div>
        </div>
    </div>
</section>


<!-- Mission -->
<!-- Our Mission -->
<section class="py-5 bg-white" style="margin-top:50px;margin-bottom:50px">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text Column -->
            <div class="col-md-7">
                <h2 class=" mb-4" style="font-family: 'Marge', serif;letter-spacing: 4%;font-weight: 400;font-size :72px;margin:auto">Our Mission</h2>
                <p style="font-family: 'Inter';font-size :18px;">At LYSR, we awaken human consciousness through the sacred union of mind, body, and soul.
                Rooted in ancient wisdom and modern healing, we weave together yogic sciences, ayurveda, shamanism, celtic and hermetic traditions, quantum healing, and holistic psychology.
                we are a sanctuary beyond labels, where the soul is free, and all are welcome. through retreats, workshops, and spiritual education, we guide seekers to heal, decondition, and embody their true essence.</p>
                <p class="fst-italic" style="color: #7ba388;">
                    <strong>LYSR is not just a project, it’s a movement. a home for the awakened.<br>a roar of remembrance.</strong>
                </p>
            </div>

            <!-- Image Column -->
            <div class="col-md-5 text-center">
                <img src="{{ asset('images/mission.jpg') }}" class="img-fluid rounded-custom" alt="Meditation Forest">
            </div>
        </div>
    </div>
</section>
<!-- Testimonials -->
<section class="py-5" style="background: url('{{ asset('images/testono.png') }}') center/cover no-repeat;">
    <div class="container text-center text-white">
        <h2 class="mb-3" style="font-family: 'Marge', serif;letter-spacing: 4%;font-weight: 400;font-size :72px;">
            What Our Clients Say
        </h2>
        <p class="mb-5" style="max-width: 700px; margin: auto;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.
        </p>

        <div class="row justify-content-center g-4">
            @for($i = 0; $i < 3; $i++)
            <div class="col-md-4">
                <div class="position-relative bg-white bg-opacity-25 rounded-4 p-4" style="backdrop-filter: blur(10px);">
                    <!-- Profile Image -->
                    <div class="position-absolute top-0 start-50 translate-middle">
                        <img src="{{ asset('images/client2.jpg') }}" 
                             alt="Client" 
                             class="rounded-circle border border-3 border-white" 
                             width="80" height="80">
                    </div>
                    <!-- Text -->
                    <p class="mt-5 mb-3" style="color: white; font-size: 14px;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.
                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                    <strong style="color: white; font-size: 18px;">Rick Wright</strong>
                    <div style="font-size: 12px;">Executive Engineer</div>
                </div>
            </div>
            @endfor
        </div>

        <!-- Navigation -->
        <div class="mt-4">
            <button class="btn btn-outline-light rounded-circle me-2">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="btn btn-outline-light rounded-circle">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>
</section>


<!-- Hypnotherapy Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center shadow-sm p-4" style="background: url('{{ asset('images/Home/bg_hypnotherapy.png') }}') center/cover no-repeat; width:1340px; height:500px; border-radius: 50px; ">
            <!-- Left Content -->
            <div class="col-md-7">
                <h2 style="font-family: 'Marge', serif; font-size: 2.5rem; color: #334d3b;">
                    Hypnotherapy
                </h2>
                <p class="mt-2 mb-3" style="color: #a35d3f; font-weight: 600;">
                    Chakra Healing + Sushumna Nadi Alignment + Kundalini Life Force Activation – ₹8,888
                </p>
                <p style="color: #555; font-size: 1rem;">
                    Awaken Your Divine Essence, Realign Your Energy Body, And Ignite Your Creative Life Force.
                </p>
                <a href="#" 
                   class="btn mt-3 px-4 py-2"
                   style="background-color: #647E65; color: white; border-radius: 30px;">
                    Click To Know More
                </a>
            </div>

            <!-- Right Image -->
            <div class="col-md-5 text-center">
                <a href="#">
                    <img src="{{ asset('images/Home/hypnotherapy.png') }}" 
                         alt="Hypnotherapy Session"
                         class="img-fluid rounded shadow-sm"
                         style="max-height: 391px; object-fit: cover;">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- session section -->
<section class="sessions-section" style="text-align: center; padding: 80px 0;">
    <h2 class="text-marge">Sessions</h2>
    <span style="width:200px: height:39.5px"><img src="{{ asset('images/divider.png') }}" width="200px" height="40px" ></span>
    <p style="max-width: 800px; margin: 0 auto 50px; font-size: 16px; line-height: 1.6;">
        Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Nunc Vulputate Libero Et Velit Interdum, 
        Ac Aliquet Odio Mattis. Class Aptent Taciti Sociosqu Ad Litora Torquent Per Conubia Nostra, 
        Per Inceptos Himenaeos.
    </p>

    <div class="sessions-wrapper" style="display: flex; justify-content: center; gap: 50px; flex-wrap: wrap;">
        
        <!-- Card 1 -->
        <div class="session-card" style="position: relative; width: 650px; height: 434px;">
            <!-- Background -->
            <div style="
                position: absolute;
                top: 0;
                left: 0;
                width: 650px;
                height: 434px;
                background: #f9f6e8; /* can be replaced with an image */
                border-radius: 40px;
                border: 2px solid #ddd;
                z-index: 1;
            "></div>

            <!-- Foreground Image -->
            <a href="{{ route('yoga_sessions.by_trainer', ['trainer' => 'Annesha Bera']) }}" >
                <img 
                    src="/images/session1.jpg" 
                    alt="Annesha" 
                    style="
                        position: absolute;
                        top: 30px;
                        left: 30px;
                        width: 590px;
                        height: 374px;
                        border-radius: 34px;
                        object-fit: cover;
                        z-index: 2;
                    "
                >
                <p style="position: absolute; bottom: -60px; width: 100%; text-align: center; font-size: 12px;">
                    Sessions Offered By<br><strong style="font-size: 14px;">Annesha Bera</strong>
                </p>
            </a>
        </div>

        <!-- Card 2 -->
        <div class="session-card" style="position: relative; width: 650px; height: 434px;">
            <!-- Background -->
            <div style="
                position: absolute;
                top: 0;
                left: 0;
                width: 650px;
                height: 434px;
                background: #f9ece6; /* can be replaced with an image */
                border-radius: 40px;
                border: 2px solid #ddd;
                z-index: 1;
            "></div>

            <!-- Foreground Image -->
            <a href="{{ route('yoga_sessions.by_trainer', ['trainer' => 'Mahesh Sir']) }}" >
                <img 
                    src="/images/mahesh-min.jpg" 
                    alt="Mahesh" 
                    style="
                        position: absolute;
                        top: 30px;
                        left: 30px;
                        width: 590px;
                        height: 374px;
                        border-radius: 34px;
                        object-fit: cover;
                        z-index: 2;
                    "
                >
                <p style="position: absolute; bottom: -60px; width: 100%; text-align: center; font-size: 12px;">
                    Sessions Offered By<br><strong style="font-size: 14px;">Mahesh Sir</strong>
                </p>
            </a>
        </div>
    </div>
</section>
<!-- FAQ Section -->
<section class="py-5" style="background-image: url('{{ asset('images/faq.png') }}'); background-size: cover; background-position: center; margin-top:100px; border-radius:50px 50px 0 0 ">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-7">
                <div class="bg-green text-white p-5 rounded-4 shadow-lg" style="max-height: 100%; overflow: hidden;">
                    <h2 class="mb-4 fw-semibold" style="font-family: 'Georgia', serif;">Do you have questions?</h2>

                    <div class="accordion accordion-flush" id="faqAccordion">
                        <!-- Item 1 -->
                        <div class="accordion-item bg-transparent border-0 text-white">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-transparent text-white fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What is your return policy?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We offer a 15-day return window for a full refund or exchange on unused items. Returns must include original packaging and proof of purchase for processing.
                                </div>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="accordion-item bg-transparent border-0 text-white">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-transparent text-white fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Do you offer international shipping?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we ship internationally. Shipping rates vary by destination.
                                </div>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="accordion-item bg-transparent border-0 text-white">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-transparent text-white fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What if I receive a damaged or defective product?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Please contact us within 7 days with photos and order details to initiate a replacement or refund.
                                </div>
                            </div>
                        </div>

                        <!-- Item 4 -->
                        <div class="accordion-item bg-transparent border-0 text-white">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-transparent text-white fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Are the product colors on the website accurate?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We strive for accuracy but slight color variations may occur due to lighting or screen settings.
                                </div>
                            </div>
                        </div>

                        <!-- Item 5 -->
                        <div class="accordion-item bg-transparent border-0 text-white">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-transparent text-white fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    How do I contact customer support?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can reach us through the contact form or support email listed on our site.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <span class="me-2">My question is not here.</span>
                        <a href="#" class="btn btn-light btn-sm rounded-pill">CONNECT US <i class="bi bi-arrow-up-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row text-center text-md-start">
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">A. energy works by annesha</h5>
                <p>conscious living through ancient wisdom and healing</p>
                <div>
                    <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <h6>Explore</h6>
                <ul class="list-unstyled">
                    <li>About us</li>
                    <li>Priestess collections</li>
                    <li>Yog with Mahesh</li>
                    <li>Herbal store</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6>Connect</h6>
                <ul class="list-unstyled">
                    <li>Book a Session</li>
                    <li>Contact us</li>
                    <li>Support</li>
                </ul>
            </div>
        </div>
        <p class="text-center small mt-4">© 2024 energy works by annesha. All rights reserved. • silence. alchemy. conscious living.</p>
    </div>
</footer>

@endsection
