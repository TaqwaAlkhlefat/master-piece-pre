<!-- Pricing Start -->


<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="doctorr">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="section-title mb-4">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">Pricing Plan</h5>
                    <h1 class="display-5 mb-0">We Offer Fair Prices for Dental Treatment</h1>
                </div>
                <p class="mb-4">Our commitment extends beyond facilitating appointments and recognizing outstanding dentists. We aim to be your trusted source of dental information and guidance. Our comprehensive resources provide valuable insights into oral health, dental care tips, and the latest advancements in the field. We want to empower you to make informed decisions and maintain optimal dental health for yourself and your loved ones.</p>
                <h5 class="text-uppercase text-primary wow fadeInUp" data-wow-delay="0.3s">Call for Appointment</h5>
                <h1 class="wow fadeInUp" data-wow-delay="0.6s">+962 772 945510</h1>
            </div>
            <div class="col-lg-7">
                <div class="owl-carousel price-carousel wow zoomIn" data-wow-delay="0.9s">
                    @foreach ($doctor as $doctors )
                    @if ($doctors->admin_approval == 1)
                    <div class="price-item pb-4">
                        <div class="position-relative">
                            <img style="max-height: 260px;" class="img-fluid rounded-top" src="doctorimage/{{ $doctors->image }}" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                <h2 class="text-primary m-0">JD{{ $doctors ->session_price }}</h2>
                            </div>
                        </div>
                        <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                            <h4>{{ $doctors ->name }}</h4>
                            <hr class="text-primary w-50 mx-auto mt-0">
                            <div class="d-flex justify-content-between mb-3"><span>{{ $doctors ->specialization }}</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Professional Dentist</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-2"><span>{{ $doctors ->address }}</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <a href="{{ route('appointment') }}" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Appointment</a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pricing End -->
