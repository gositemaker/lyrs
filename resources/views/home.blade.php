{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Home')

@section('content')


{{-- Hero Section with Video Background --}}
<section class="hero-section">
    <video autoplay muted loop class="hero-video">
        <source src="{{ asset('videos/banner1.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-overlay d-flex flex-column align-items-center justify-content-center text-center">
        <h1 class="display-4  text-marge">Let Your Soul Roar</h1>
        <p class="lead text-white">Step into the alchemy of Mind, Body and Soul trinity.<br> Let the inner alchemy of your soul path remembers you!</p>
        <a href="/book-session" class="btn btn-light rounded-pill mt-3 px-4">Start Your Healing Journey</a>
    </div>
</section>

{{-- LYSR Project --}}
<section class="text-center ">
    <div class="container">
        <div class="p-4 text-white rounded-4 shadow project-box">
            <h3 class="lysr-pg" style="">The LYSR Project</h3>
            <p class="mt-3 " style="width:80%; margin:auto">
                <strong class="lysr-stg">bridging ancient wisdom with modern healing.</strong><br>
                The lysr project is a sacred movement uniting timeless traditions yogic science, ayurveda, shamanism, and
                celtic wisdom to awaken mind, body, and soul. we offer a sanctuary for transformation through immersive
                retreats, healing blogs, and conscious workshops. this is a space beyond borders and identities, where all
                beings are welcome, and the soul is free to remember, heal, and rise.
                <br>Heal. Remember. Awaken.<br>
                <br><em style="text-transform: uppercase;">let your soul roar.</em>
            </p>
            <br>
            <div class="divider">
                <img src="{{ asset('images/divider.png') }}" alt="Divider" width="200">
            </div>
            
        </div>
    </div>
</section>

{{-- Our Mission --}}
<section class="py-5 mission-lysr">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h2 class="text-marge">Our Mission</h2>
               <p> At LYSR, we awaken human consciousness through the sacred union of mind, body, and soul.
                Rooted in ancient wisdom and modern healing, we weave together yogic sciences, ayurveda, shamanism, celtic and hermetic traditions, quantum healing, and holistic psychology.
                we are a sanctuary beyond labels, where the soul is free, and all are welcome. through retreats, workshops, and spiritual education, we guide seekers to heal, decondition, and embody their true essence.</p>
                <p class="fst-italic" style="color: #7ba388;">
                    <strong>LYSR is not just a project, it’s a movement. a home for the awakened.<br>a roar of remembrance.</strong>
                </p>
            </div>
            <div class="col-lg-5 text-center">
                <img src="{{ asset('images/Home/mission.png') }}" class="img-fluid rounded-4 " alt="Mission Image">
            </div>
        </div>
    </div>
</section>

<section class="testonomial-bg">
    <div class="container text-center">
        <h2 class="testonomial-client">What Our Clients Say</h2>
        <p class="mb-4 testonomial-p">Our yoga trainer offers thoughtfully designed sessions that blend traditional practices with modern techniques. Each class is guided with care to promote strength, balance, and inner peace, ensuring an enriching experience for every participant.</p>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                {{-- First Slide --}}
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <div class="card p-3 shadow rounded-4 h-100">
                                <img src="{{ asset('images/client.jpg') }}" class="rounded-circle mx-auto mb-3" width="80" height="80" alt="">
                                <p class="f-w">"The sessions are transformative! I feel lighter, calmer, and more balanced every time I step off the mat."</p>
                                <h6 class="fw-bold f-w">Patricia Sanders</h6>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 d-none d-md-block">
                            <div class="card p-3 shadow rounded-4 h-100">
                                <img src="{{ asset('images/client3.jpg') }}" class="rounded-circle mx-auto mb-3" width="80" height="80" alt="">
                                <p class="f-w">"Yoga with this trainer helped me release stress after long workdays. My posture and focus have improved a lot."</p>
                                <h6 class="fw-bold f-w">Stephanie Sharkey</h6>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 d-none d-md-block">
                            <div class="card p-3 shadow rounded-4 h-100">
                                <img src="{{ asset('images/client4.jpg') }}" class="rounded-circle mx-auto mb-3" width="80" height="80" alt="">
                                <p class="f-w">"I had back pain for years, and within a month of practice, I noticed a huge difference. Truly grateful."</p>
                                <h6 class="fw-bold f-w">Kurt Bates</h6>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Second Slide (add more testimonials) --}}
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <div class="card p-3 shadow rounded-4 h-100">
                                <img src="{{ asset('images/client3.jpg') }}" class="rounded-circle mx-auto mb-3" width="80" height="80" alt="">
                                <p class="f-w">"The trainer explains each pose with such clarity. Even as a beginner, I felt confident and safe practicing."</p>
                                <h6 class="fw-bold f-w">Alex Johnson</h6>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 d-none d-md-block">
                            <div class="card p-3 shadow rounded-4 h-100">
                                <img src="{{ asset('images/client4.jpg') }}" class="rounded-circle mx-auto mb-3" width="80" height="80" alt="">
                                <p class="f-w">"The mindfulness techniques I learned not only improved my health but also my concentration in studies."</p>
                                <h6 class="fw-bold f-w">Maria Lopez</h6>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 d-none d-md-block">
                            <div class="card p-3 shadow rounded-4 h-100">
                                <img src="{{ asset('images/client.jpg') }}" class="rounded-circle mx-auto mb-3" width="80" height="80" alt="">
                                <p class="f-w">"These yoga sessions are the best investment in my well-being. I feel energized and peaceful throughout the day."</p>
                                <h6 class="fw-bold f-w">Mithun Kumar</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Controls --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>
<section class="py-5 ">
    <div class="container hypnotherapy rounded-4">
        <div class="row hypnotherapy-pad" >
            <div class="col-lg-4">
                <h2 class="hypnotherapy-text">Hypnotherapy</h2>
                <p class="hypnotherapy-p">Chakra Healing + Sushumna Nadi Alignment + Kundalini Life Force Activation</p>
                <p class="hypnotherapy-p1">Awaken your divine essence, realign your energy body, and ignite your creative life force.</p>
                <a href="/courses" class="btn btn-brown rounded-pill">Click to Know More</a>
            </div>
            <div class="col-lg-2 text-center "></div>
            <div class="col-lg-6 text-center p-2">
                <img src="{{ asset('images/hypnotherapy.jpg') }}" class="img-fluid rounded-4" alt="">
            </div>
        </div>
    </div>
</section>
<section class="sessions-section py-5">
    <div class="container text-center">
        {{-- Title --}}
        <h2 class="mb-3 text-marge" style="color:#2d3b2d;">Sessions</h2>
        <div class="mb-4">
            <img src="{{ asset('images/divider.png') }}" alt="divider" style="height:24px; width:200px">
        </div>
        <p class="text-muted mb-5">
        "Big thanks to our amazing yoga trainer for such a refreshing session today! The perfect mix of calm, energy, and mindfulness — left us feeling lighter, stronger, and more centered."
        </p>

        {{-- Session Trainers --}}
        <div class="row justify-content-center g-4">
            {{-- Annesha --}}
            <div class="col-md-6 col-lg-5">
                <a href="{{ route('yoga_sessions.by_trainer', ['trainer' => 'Annesha Bera']) }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden session-card">
                        <img src="{{ asset('images/anesha.jpg') }}" class="card-img-top img-fluid" alt="Annesha">
                        <div class="card-body text-center">
                            <p class="mb-1">Sessions Offered By</p>
                            <h5 class="fw-bold" style="color:#304636">Annesha Bera</h5>
                            <h6 style="color:#304636"> CEO & Founder </h6>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Mahesh --}}
            <div class="col-md-6 col-lg-5">
                <a href="{{ route('yoga_sessions.by_trainer', ['trainer' => 'Mahesh Sir']) }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden session-card">
                        <img src="{{ asset('images/mahesh-min.jpg') }}" class="card-img-top img-fluid" alt="Mahesh">
                        <div class="card-body text-center">
                            <p class="mb-1">Sessions Offered By</p>
                            <h5 class="fw-bold text-brown">Mahesh Sir</h5>
                            <h6 class=" text-brown">  Co-Founder </h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="py-5" style="background-image: url('{{ asset('images/faq.png') }}'); background-size: cover; background-position: center; margin-top:100px; border-radius:50px 50px 0 0 ">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-7" style="padding-bottom:50px;">
                <div class="bg-green text-white p-5 rounded-4 shadow-lg" style="max-height: 100%; overflow: hidden; ">
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
                        <a href="/contact" class="btn btn-light btn-sm rounded-pill">CONNECT US <i class="bi bi-arrow-up-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
