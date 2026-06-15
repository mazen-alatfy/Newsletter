@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')

<section class="contact-page py-5">
    <div class="container">


    <!-- Hero -->
    <div class="text-center mb-5">


        <h1 class="fw-bold display-5">Contact <span translate="no">HealthNato</span></h1>

        <p class="lead text-muted mt-3">
            We are always available for editorial communication,
            partnerships, and general inquiries.
        </p>

    </div>

    <!-- Contact Cards -->
    <div class="row g-4 justify-content-center">

        <!-- Editorial -->
        <div class="col-md-4">
            <div class="info-card h-100 text-center">

                <h3 class="mb-3">Editorial & Scientific Review</h3>

                <p class="text-muted mb-4">
                    For editorial communication, medical reviews,
                    and scientific content inquiries.
                </p>

                <a href="mailto:editorial@healthnato.com" class="contact-link">
                    editorial@healthnato.com
                </a>

            </div>
        </div>

        <!-- General -->
        <div class="col-md-4">
            <div class="info-card h-100 text-center">

                <h3 class="mb-3">Partnerships & General Inquiries</h3>

                <p class="text-muted mb-4">
                    For partnerships, collaborations,
                    and general communication.
                </p>

                <a href="mailto:info@healthnato.com" class="contact-link">
                    info@healthnato.com
                </a>

            </div>
        </div>

    </div>

    <!-- Extra Info -->
    <div class="text-center mt-5">

        <p class="text-muted">
            <span translate="no">Health Nato</span> is committed to maintaining professional,
            responsible, and secure communication with all users and partners.
        </p>

    </div>


        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="back-home-btn">Back to Home</a>
        </div>

</div>

</section>

@endsection

