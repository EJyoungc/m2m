<x-layout.root>
    <nav class="bg-custom-gray p-4">
        <div class="container mx-auto flex flex-wrap justify-between items-center">
            <div class="text-white font-bold text-xl">
                <a href="/">MediMothers</a>
            </div>
            <div class="hidden md:flex space-x-4">
                {{-- Navigation Links (Commented Out) --}}
            </div>
            <div class="md:hidden">
                <button id="menu-toggle" class="text-white focus:outline-none" aria-label="Toggle mobile menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="md:hidden hidden">
            {{-- Mobile Navigation Links (Commented Out) --}}
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-custom-light py-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center px-4">
            <div class="md:w-1/2">
                <h1 class="text-3xl md:text-5xl font-bold text-custom-gray mb-4">Welcome to MediMothers</h1>
                <p class="text-lg text-gray-700 mb-6">
                    Supporting mothers through healthcare resources and community engagement. Discover tools and
                    services tailored for your needs.
                </p>
                <a href="{{ route('login') }}" class="bg-custom-teal text-white px-4 py-2 rounded hover:bg-custom-gray transition">
                    Login
                </a>
            </div>

            <div class="md:w-1/2 mt-8 md:mt-0 relative overflow-hidden h-64 md:h-96">
                <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
                    <source src="{{ asset('assets/images/m2m/WhatsApp-message-[remix].webm') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </section>

    <!-- MediMothers System Overview Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-custom-gray mb-6">MediMothers: HIV, TB & Infant Care Management System</h2>
            <p class="text-lg text-gray-700 mb-6">
                An all-in-one system designed to streamline care for <strong>HIV-positive mothers and their infants</strong>,
                focusing on <strong>medication adherence</strong>, <strong>TB screening</strong>, and <strong>infant health tracking</strong>.
                With powerful features and multi-platform support, this system enhances patient care and improves health outcomes.
            </p>

            <h3 class="text-2xl font-bold text-custom-gray mb-4">Key Features</h3>
            <div class="bg-gray-100 rounded p-4 mb-6 shadow">
                <ul class="list-disc list-inside text-lg text-gray-700">
                    <li><strong>HIV Management:</strong> Medication scheduling, viral load & CD4 monitoring, appointment reminders.</li>
                    <li><strong>TB Screening:</strong> Automated TB screening & test reminders for both mothers and infants.</li>
                    <li><strong>Infant Care:</strong> Early HIV testing, vaccination schedules, growth & development tracking.</li>
                    <li><strong>Multi-Platform Reminders:</strong> WhatsApp, Telegram, SMS, and more.</li>
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-custom-gray mb-4">Tech Stack</h3>
            <div class="bg-gray-100 rounded p-4 mb-6 shadow">
                <ul class="list-disc list-inside text-lg text-gray-700">
                    <li><strong>Secure Database Management:</strong> Encrypted data storage to protect user information.</li>
                    <li><strong>API Integrations:</strong> Seamless communication via <strong>WhatsApp, Telegram, SMS</strong>.</li>
                    <li><strong>Scalable Server-Side Infrastructure:</strong> High availability to support growing user needs.</li>
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-custom-gray mb-4">Why It Matters</h3>
            <div class="bg-gray-100 rounded p-4 mb-6 shadow">
                <p class="text-lg text-gray-700 mb-2">
                    The MediMothers system significantly impacts healthcare by:
                </p>
                <ul class="list-disc list-inside text-lg text-gray-700">
                    <li><strong>Improving Medication Adherence:</strong> Ensuring mothers consistently take their medications.</li>
                    <li><strong>Reducing HIV Transmission Risk:</strong> Providing timely information and support for health maintenance.</li>
                    <li><strong>Enhancing Infant Care:</strong> Offering resources for monitoring and promoting infant health.</li>
                    <li><strong>Streamlining Healthcare Efficiency:</strong> Facilitating better communication between providers and patients.</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="relative bg-fixed bg-center bg-cover bg-no-repeat py-24"
        style="background-image: url('{{ asset('assets/images/m2m/AMMCHC-prenatal-clinic-1-EDIT.webp') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto relative z-10 px-4 text-white text-center">
            <h2 class="text-4xl font-bold mb-6">About MediMothers</h2>
            <p class="text-xl mb-6">
                MediMothers is more than just an app – it's a lifeline for mothers. Whether you're expecting your first child or managing a growing family, MediMothers is here to support you every step of the way.
            </p>
            <p class="text-xl mb-6">
                Our app provides access to critical healthcare resources, personalized advice from experts, and a vibrant community of mothers to share your journey. With features tailored to your needs, we aim to empower you with the right tools to care for your health and the health of your family.
            </p>
            <p class="text-xl mb-6">
                From daily tips and reminders to direct access to healthcare professionals, MediMothers is designed to offer timely, trusted support when you need it the most. We believe in the power of community and the importance of accessible, reliable information for every mother.
            </p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-12 bg-custom-light">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-custom-gray mb-6">Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="p-6 bg-white rounded shadow">
                    <h3 class="text-xl font-semibold text-custom-teal mb-2">Healthcare Resources</h3>
                    <p class="text-gray-700">Access a wealth of information on maternal and child health, including articles, videos, and tools to help you manage your health effectively.</p>
                </div>
                <div class="p-6 bg-white rounded shadow">
                    <h3 class="text-xl font-semibold text-custom-teal mb-2">Community Support</h3>
                    <p class="text-gray-700">Connect with other mothers for support, advice, and shared experiences. Our community forums provide a safe space to ask questions and share your journey.</p>
                </div>
                <div class="p-6 bg-white rounded shadow">
                    <h3 class="text-xl font-semibold text-custom-teal mb-2">Expert Advice</h3>
                    <p class="text-gray-700">Get access to healthcare professionals who can provide personalized advice and answers to your health-related questions.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-custom-gray py-6">
        <div class="container mx-auto text-center text-white">
            <p>&copy; {{ date('Y') }} MediMothers. All rights reserved.</p>
        </div>
    </footer>
</x-layout.root>
