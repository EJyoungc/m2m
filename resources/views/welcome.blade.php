<x-layout.root>
    <nav class="bg-custom-gray p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-bold text-xl">
                <a href="/">MediMothers</a>
            </div>
            <div class="hidden md:flex space-x-4">
                <a href="/" aria-label="Home" class="text-white hover:bg-custom-teal px-3 py-2 rounded">Home</a>
                <a href="/about" aria-label="About" class="text-white hover:bg-custom-teal px-3 py-2 rounded">About</a>
                <a href="/services" aria-label="Services" class="text-white hover:bg-custom-teal px-3 py-2 rounded">Services</a>
                <a href="/resources" aria-label="Resources" class="text-white hover:bg-custom-teal px-3 py-2 rounded">Resources</a>
                <a href="/contact" aria-label="Contact" class="text-white hover:bg-custom-teal px-3 py-2 rounded">Contact</a>
            </div>
            <div class="md:hidden">
                <button id="menu-toggle" class="text-white focus:outline-none" aria-label="Toggle mobile menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="md:hidden hidden">
            <a href="/" aria-label="Home" class="block text-white hover:bg-custom-teal px-3 py-2 rounded">Home</a>
            <a href="/about" aria-label="About" class="block text-white hover:bg-custom-teal px-3 py-2 rounded">About</a>
            <a href="/services" aria-label="Services" class="block text-white hover:bg-custom-teal px-3 py-2 rounded">Services</a>
            <a href="/resources" aria-label="Resources" class="block text-white hover:bg-custom-teal px-3 py-2 rounded">Resources</a>
            <a href="/contact" aria-label="Contact" class="block text-white hover:bg-custom-teal px-3 py-2 rounded">Contact</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-custom-light py-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center px-4">
            <div class="md:w-1/2">
                <h1 class="text-3xl md:text-5xl font-bold text-custom-gray mb-4">Welcome to MediMothers</h1>
                <p class="text-lg text-gray-700 mb-6">
                    Supporting mothers through healthcare resources and community engagement. Discover tools and services tailored for your needs.
                </p>
                <a href="/services" class="bg-custom-teal text-white px-4 py-2 rounded hover:bg-custom-gray transition">
                    Learn More
                </a>
            </div>
            
            <div class="md:w-1/2 mt-8 md:mt-0 relative overflow-hidden h-64 md:h-96">
                <video autoplay muted loop playsinline class="absolute inset-0 w-auto h-full object-cover" style="left: -50px;right:-50px">
                    <source src="{{ asset('assets/images/m2m/WhatsApp-message-[remix].webm') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            
            
        </div>
    </section>
 

    <!-- About Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-custom-gray mb-6">About MediMothers</h2>
            <p class="text-lg text-gray-700 mb-6">MediMothers is a mobile application designed to empower mothers by providing access to essential healthcare resources, community support, and expert advice. Our mission is to ensure that every mother has the information and tools they need to make informed decisions for themselves and their families.</p>
        </div>
    </section>
    <section class="relative bg-fixed bg-center bg-cover bg-no-repeat py-24" style="background-image: url('{{ asset('assets/images/m2m/AMMCHC-prenatal-clinic-1-EDIT.webp') }}');">
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-white rounded shadow">
                    <h3 class="text-xl font-semibold text-custom-teal mb-2">Healthcare Resources</h3>
                    <p class="text-gray-700">Access a wealth of information on maternal and child health, including articles, videos, and tools to help you manage your health effectively.</p>
                </div>
                <div class="p-6 bg-white rounded shadow">
                    <h3 class="text-xl font-semibold text-custom-teal mb-2">Community Support</h3>
                    <p class="text-gray-700">Join a supportive community of mothers, share experiences, and receive advice from those who understand your journey.</p>
                </div>
                <div class="p-6 bg-white rounded shadow">
                    <h3 class="text-xl font-semibold text-custom-teal mb-2">Expert Advice</h3>
                    <p class="text-gray-700">Get direct access to healthcare professionals for personalized advice and guidance through our app.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-custom-gray mb-6">What Our Users Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-6 bg-gray-100 rounded shadow">
                    <p class="text-gray-700 mb-4">"MediMothers has been a game changer for me. The resources are incredibly helpful and the community is so supportive!"</p>
                    <cite class="font-bold">– Sarah, New Mom</cite>
                </div>
                <div class="p-6 bg-gray-100 rounded shadow">
                    <p class="text-gray-700 mb-4">"I love the expert advice section. It gives me peace of mind knowing I can get reliable information when I need it!"</p>
                    <cite class="font-bold">– Jessica, Expecting Mother</cite>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-12 bg-custom-light">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-custom-gray mb-6">Contact Us</h2>
            <p class="text-lg text-gray-700 mb-6">Have questions or need support? We’re here to help! Reach out to us through the contact form on our website or connect with us on social media.</p>
            <a href="/contact" class="bg-custom-teal text-white px-4 py-2 rounded hover:bg-custom-gray transition">Contact Us</a>
        </div>
    </section>
    <!-- Footer -->
<footer class="bg-custom-gray py-6">
    <div class="container mx-auto text-center">
        <p class="text-white">© 2024 MediMothers. All rights reserved.</p>
        <div class="flex justify-center space-x-4 mt-4">
            <a href="#" class="text-white hover:text-custom-teal">Facebook</a>
            <a href="#" class="text-white hover:text-custom-teal">Twitter</a>
            <a href="#" class="text-white hover:text-custom-teal">Instagram</a>
        </div>
    </div>
</footer>

</x-layout.root>