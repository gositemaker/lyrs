@extends('layouts.app')

@section('content')
<!-- ================= What is LYSR Section ================= -->
<section class="">
    <div class="container">
        <div class="row">
            <!-- Left Content -->
            <div class="col-lg-6 mb-4 mb-lg-0 align-items-center p-5">
                <h2 class=" mb-3 text-marge">What Is LYSR?</h2>
                <h5 class=" fw-bold" style=" font-family: 'Inter', serif; color:#8C5737">Let Your Soul</h5>
                <p class="fst-italic " style="font-family: 'Inter', serif; color:#8C5737">A Movement of Healing, Remembering, and Rising</p>
                <p>
                    LYSR is a sacred initiative designed to raise collective consciousness by harmonising ancient wisdom with modern healing modalities.
                    It’s not just a wellness brand, it’s a soul-led movement dedicated to personal transformation and energetic liberation.
                </p>
                <p class="fw-semibold">We integrate diverse traditions like:</p>

                <div class="row" >
                    <div class="col-6 d-flex align-items-start mb-3">
                        <i class="bi bi-yin-yang fs-3  me-2" style="color:#8C5737"></i>
                        <div>
                            <strong>Yogic sciences</strong><br>
                            <small class="text-muted">for body-mind alignment</small>
                        </div>
                    </div>
                    <div class="col-6 d-flex align-items-start mb-3">
                        <i class="bi bi-heart-pulse fs-3  me-2" style="color:#8C5737"></i>
                        <div>
                            <strong>Ayurveda</strong><br>
                            <small class="text-muted">for holistic health</small>
                        </div>
                    </div>
                    <div class="col-6 d-flex align-items-start mb-3">
                        <i class="bi bi-fire fs-3  me-2" style="color:#8C5737"></i>
                        <div>
                            <strong>Shamanic rituals</strong><br>
                            <small class="text-muted">for energetic release</small>
                        </div>
                    </div>
                    <div class="col-6 d-flex align-items-start mb-3">
                        <i class="bi bi-flower3 fs-3  me-2" style="color:#8C5737"></i>
                        <div>
                            <strong>Celtic soul work</strong><br>
                            <small class="text-muted">for ancestral remembrance</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Image -->
            <div class="col-lg-6 text-center  d-none d-md-block">
                <img src="{{ asset('images/about/Creative.png') }}" class="img-fluid " alt="LYSR Image">
            </div>
        </div>
    </div>
</section>

<!-- ================= What We Offer Section ================= -->
<section class="py-5">
    <div class="container">
        <h2 class=" mb-4" style="font-family: 'Marge', serif; letter-spacing: 3px;">What We Offer</h2>

        <div class="row justify-content-center">
            <div class="col-md-3 col-6 mb-3">
                <div class="p-3 bg-gm rounded shadow-sm h-100">
                    Healing bundles tailored to your energy
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="p-3 bg-gm rounded shadow-sm h-100">
                    Transformational retreats & workshops
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="p-3 bg-gm rounded shadow-sm h-100">
                    Awareness programs for trauma healing
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="p-3 bg-gm rounded shadow-sm h-100">
                    Blogs, rituals & teachings for everyday spiritual living
                </div>
            </div>
        </div>

        <p class="mt-4 text-muted" style="font-family: 'Inter', serif; ">
            This is a space for deep seekers, curious souls, and anyone ready to awaken their inner truth.
        </p>
    </div>
</section>
<section class="py-5" style="background: url('{{ asset('images/about/about-bg.png') }}') no-repeat center center/cover;">
    <div class="container">
        <div class="row align-items-center mb-5">
            <!-- Left Image --> 
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('images/about/left.png') }}" alt="Flower in crack" class="img-fluid rounded shadow">
            </div>
            <!-- Right Content -->
            <div class="col-md-6">
                <h2 class="" style="color: #6a3c2f; font-family: 'Marge', serif; letter-spacing: 3px;">Why LYSR Exists</h2>
                <ul class="list-unstyled mt-4" style="color: #5c3a2b; font-size: 1.1rem;">
                    <li class="mb-2">➤ Because healing should have no borders.</li>
                    <li class="mb-2">➤ Because the soul knows no caste, gender, or belief system.</li>
                    <li class="mb-2">➤ Because the time to reclaim your power is now.</li>
                </ul>
                <p class="fst-italic mt-3" style="color:#333; font-size:1rem;">
                    We’re here to dismantle inner walls, release inherited pain, and create a new way of being—
                    rooted in truth, guided by intuition, and led by love.
                </p>
            </div>
        </div>

        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-md-6 order-2 order-md-1 mt-4 mt-md-0">
                <h2 class="" style="color: #6a3c2f;font-family: 'Marge', serif; letter-spacing: 3px;">Whether you're just beginning or deep on your path...</h2>
                <ul class="list-unstyled mt-4" style="color: #5c3a2b; font-size: 1.1rem;">
                    <li class="mb-2">➤ You are welcome here.</li>
                    <li class="mb-2">➤ You are seen here.</li>
                    <li class="mb-2">➤ You are safe to <b>Heal. Remember. Awaken.</b></li>
                </ul>
                <p class="mt-3 fst-italic" style="font-size: 1rem; color:#444;">
                    Join the movement. <b>Let Your Soul Roar.</b>
                </p>
            </div>
            <!-- Right Image -->
            <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
                <img src="{{ asset('images/about/right.png') }}" alt="Hands touching" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-marge">Message From Healers</h2>

        <div class="row g-4">
            <!-- Healer Card -->
            <div class="col-md-10 p-3 rounded-4" style="margin:auto;">
                <div class="card shadow-sm h-100 p-3 rounded-4 overflow-hidden" style="background-color:#EDEACEC2; border:0;">
                    <img src="{{ asset('images/about/annesha-about.png') }}" class="card-img-top" alt="Healer Image">
                    <div class="card-body">
                        <h4 class="card-title" style="font-family: 'Marge', serif;color:#304636; letter-spacing: 3px;">Annesha Bera </h4>
                        <p class="card-text text-muted read-more">
                        Annesha Bera is a dedicated yoga trainer with years of experience guiding individuals toward holistic well-being. 
                        She specializes in combining traditional yoga practices with modern wellness techniques, ensuring her sessions are both effective and accessible. 
                        Known for her structured teaching style, Annesha focuses on posture correction, breath control, and mindful movement. 
                        Her professional approach helps students enhance flexibility, strength, and inner balance.
                         
                        </p>

                        <!-- Hidden Extra Content (will be shown on Read More click) -->
                        <div class="read-more-content d-none">
                            <p>
                            She believes in building discipline through yoga while fostering a supportive and motivating environment for all learners.
                            </p>
                        </div>

                        <!-- Read More Toggle -->
                        <a href="javascript:void(0);" class="read-more-toggle text-success">Read More</a>

                        <div class="mt-3">
                            <a href="https://www.facebook.com/profile.php?id=100080475519882" target="_blank" class="me-3 text-dark">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/energyworkbyannesha" target="_blank" class="me-3 text-dark">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <!--<a href="https://www.youtube.com/" target="_blank" class="text-dark">-->
                            <!--    <i class="bi bi-youtube"></i>-->
                            <!--</a>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Another Healer Card -->
            <!-- Mahesh Healer Card -->
            <div class="col-md-10 p-3 rounded-4" style="margin:auto;">
                <div class="card shadow-sm h-100 p-3 rounded-4 overflow-hidden" style="background-color:#EDEACEC2; border:0;">
                    <img src="{{ asset('images/about/mahesh-about.png') }}" class="card-img-top" alt="Healer Image">
                    <div class="card-body">
                        <h4 class="card-title text-brown" style="font-family: 'Marge', serif; letter-spacing: 3px;">Yog with Mahesh</h4>
                        <p class="card-text text-muted read-more">
                            Mahesh Sir is a highly respected yoga and wellness trainer recognized for his disciplined and methodical teaching style. 
                            With a strong background in classical yoga practices, he emphasizes precision, consistency, and long-term growth in his sessions. 
                            His expertise covers a wide range of practices including meditation, pranayama, and advanced asanas. 
                            Mahesh Sir is known for tailoring his sessions to suit diverse student needs, ensuring measurable progress for beginners as well as advanced practitioners. 
                            His professional guidance empowers students to achieve physical fitness, mental clarity, and overall wellness.
                        </p>

                        <!-- Hidden Extra Content (will be shown on Read More click) -->
                        <div class="read-more-content d-none">
                            <p>
                                Mahesh’s journey, which began with teenage curiosity, has blossomed into a profound mission of healing and transformation. 
                                Once an aggressive and stressed individual, Mahesh’s personal shift into a state of inner peace and balance reflects the 
                                transformative power of yoga that he now shares with thousands worldwide.
                            </p>
                            <p>
                                An E-RYT 500 & YACEP certified teacher from Yoga Alliance, USA and Master’s degree holder in Yoga Science from 
                                SVYASA Yoga University, Bangalore, Mahesh brings over 15 years of teaching experience in Rishikesh—the World Capital of Yoga—
                                and across the globe. With expertise in therapeutic yoga, psychosomatic disorders, stress management, and lifestyle diseases, 
                                his approach integrates ancient yogic wisdom with modern healing applications, making complex practices accessible and 
                                practical for today’s world.
                            </p>
                            <p>
                                As an International Yoga Teacher, he has trained and certified over 10,000 students from around the world, leaving a 
                                deep impact through his workshops, courses, and teacher training programs. His therapeutic methodology blends pranayama, 
                                meditation, yoga nidra, Ayurvedic principles, and yogic counseling, offering personalized practices that foster natural 
                                healing and holistic wellness.
                            </p>
                            <p>
                                Mahesh’s calm and humble presence creates a nurturing environment where transformation unfolds effortlessly. 
                                His ability to merge traditional yoga therapy with modern insights has made him a sought-after teacher for schools, 
                                NGOs, corporates, and international audiences seeking authentic tools for stress relief, emotional balance, and inner growth.
                            </p>

                            <h6 class="mt-3">Highlights & Credentials</h6>
                            <ul>
                                <li>E-RYT 500 & YACEP Certified Yoga Teacher from Yoga Alliance, USA with 15+ years of global teaching experience</li>
                                <li>Master of Science in Yoga (M.Sc. Yoga), SVYASA Yoga University, Bangalore</li>
                                <li>Trained and certified over 10,000 students worldwide</li>
                                <li>Expert in therapeutic yoga for lifestyle diseases, stress management, and psychosomatic disorders</li>
                                <li>Specialized training in:
                                    <ul>
                                        <li>Therapeutic Yoga</li>
                                        <li>Hatha Yoga</li>
                                        <li>Yoga Nidra</li>
                                        <li>Kundalini Yoga and Yin Yoga</li>
                                        <li>Pranayama / Breathwork</li>
                                        <li>Meditation</li>
                                        <li>Yoga Philosophy</li>
                                        <li>Chakras and Kundalini Yoga</li>
                                        <li>Ayurveda and Yoga Lifestyle</li>
                                        <li>Yoga Therapy</li>
                                        <li>Yin Yoga</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <!-- Read More Toggle -->
                        <a href="javascript:void(0);" class="read-more-toggle text-success">Read More</a>

                        <div class="mt-3">
                            <a href="https://www.facebook.com/YogwithMaheshFbPage" target="_blank" class="me-3 text-dark">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/yogwithmahesh/" target="_blank" class="me-3 text-dark">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://www.youtube.com/@YogawithMahesh" target="_blank" class="text-dark">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
