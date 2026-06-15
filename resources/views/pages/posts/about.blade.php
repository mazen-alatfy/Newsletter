@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')

<section class="about-page py-5">
    <div class="container">

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">About <span translate="no">HealthNato</span></h1>

        <p class="lead text-muted mt-3">
            A modern medical media platform delivering trusted, evidence-based
            health knowledge through innovative digital experiences.
        </p>
    </div>

    <!-- About -->
    <div class="about-section mb-5">
        <h2 class="section-title mb-4">Who We Are</h2>

        <p>
            مجلة <strong translate="no">HealthNato</strong> هي منصة إعلامية ومعرفية طبية حديثة，
            تهدف إلى تقديم محتوى صحي موثوق قائم على الأدلة العلمية من خلال
            تجربة رقمية عصرية ذات طابع عالمي.
        </p>

        <p>
            انطلقت المنصة برؤية تهدف إلى سد الفجوة بين الأبحاث العلمية المعقدة
            والفهم المجتمعي، عبر تحويل المعلومات الطبية إلى معرفة واضحة،
            عملية، وذات تأثير حقيقي، موجهة للمهنيين الصحيين، والباحثين،
            وصنّاع القرار، والجمهور المهتم بالوعي الصحي الموثوق.
        </p>

        <p>
            تجمع مجلة <span translate="no">HealthNato</span> بين الدقة العلمية والمسؤولية التحريرية
            والابتكار الرقمي لاستكشاف آفاق الطب الحديث، والصحة الوقائية،
            والتكنولوجيا الحيوية، والتغذية، والابتكار الصحي بأسلوب معاصر ومتطور.
        </p>
    </div>

    <!-- Mission & Vision -->
    <div class="row g-4 mb-5">

        <div class="col-md-6">
            <div class="info-card h-100">
                <h3>Our Mission</h3>

                <p>
                    تبسيط العلوم الطبية المعقدة وتحويلها إلى محتوى موثوق،
                    سهل الوصول وذو تأثير فعّال يساعد الأفراد والمهنيين
                    على اتخاذ قرارات صحية أكثر وعياً.
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-card h-100">
                <h3>Our Vision</h3>

                <p>
                    أن تصبح مجلة <span translate="no">HealthNato</span> منصة معرفية طبية معترفاً بها عالمياً،
                    وتسهم في تطوير الوعي العلمي وتعزيز الاتصال الصحي الحديث
                    من خلال الإعلام الرقمي المبتكر.
                </p>
            </div>
        </div>

    </div>

    <!-- Core Values -->
    <div class="mb-5">
        <h2 class="section-title mb-4">Core Values</h2>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <h4>Scientific Integrity</h4>

                    <p>
                        نلتزم بالدقة والشفافية والاعتماد على الأدلة العلمية الموثوقة.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <h4>Innovation</h4>

                    <p>
                        نوظف التكنولوجيا الحديثة والإعلام الرقمي لتطوير تجربة المحتوى الطبي.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <h4>Accessibility</h4>

                    <p>
                        نؤمن بأن المعلومات الصحية الموثوقة يجب أن تكون واضحة ومتاحة للجميع.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <h4>Excellence</h4>

                    <p>
                        نسعى للحفاظ على أعلى المعايير التحريرية والعلمية والمهنية.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Editorial Standards -->
    <div class="mb-5">
        <h2 class="section-title mb-4">Editorial Standards</h2>

        <div class="info-card">

            <p>
                تعتمد مجلة <span translate="no">HealthNato</span> على إطار منظم للتحرير والمراجعة العلمية يستند إلى:
            </p>

            <ul class="standards-list">
                <li>الأبحاث الطبية المحكمة</li>
                <li>الإرشادات السريرية الدولية</li>
                <li>المراجع العلمية الموثوقة</li>
                <li>مراجعات الخبراء والمتخصصين</li>
            </ul>

        </div>
    </div>

    <!-- Disclaimer -->
    <div class="disclaimer-box mb-5">

        <h2>Medical Disclaimer</h2>

        <p>
            المحتوى المنشور عبر مجلة <span translate="no">HealthNato</span> يهدف إلى التوعية والتثقيف الصحي فقط，
            ولا يُعد بديلاً عن الاستشارة الطبية أو التشخيص أو العلاج.
        </p>

        <p class="mb-0">
            ويُنصح دائماً بالرجوع إلى الأطباء والمتخصصين المؤهلين
            فيما يتعلق بالحالات الصحية والقرارات العلاجية.
        </p>

    </div>

    <!-- Platform Info -->
    <div class="platform-info text-center mb-5">

        <h2 class="mb-3">Platform Information</h2>

        <p><strong>Name:</strong> <span translate="no">HealthNato</span></p>
        <p><strong>Sector:</strong> Medical Media & Health Knowledge</p>
        <p><strong>Region:</strong> Middle East & Global Digital Audience</p>

    </div>

    <!-- Security & Privacy -->
    <div class="row g-4 mt-5">

        <div class="col-md-6">
            <div class="info-card h-100">

                <h3>Website Security</h3>

                <p>
                    يستخدم الموقع تقنيات تشفير SSL لحماية البيانات وضمان
                    اتصال آمن بين المستخدمين والمنصة.
                </p>

            </div>
        </div>

        <div class="col-md-6">
            <div class="info-card h-100">

                <h3>Privacy & Compliance</h3>

                <p>
                    تلتزم منصة <span translate="no">HealthNato</span> بحماية خصوصية المستخدمين
                    وتطبيق ممارسات رقمية مسؤولة بما يتوافق مع
                    معايير النشر الرقمي الحديثة.
                </p>

            </div>
        </div>


        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="back-home-btn">Back to Home</a>
        </div>

    </div>

</section>

@endsection

