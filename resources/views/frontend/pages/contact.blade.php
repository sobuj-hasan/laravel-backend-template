@extends('frontend.layouts.app')

@section('title')
    Contact US 
@endsection

@section('content')
    <!-- Main Content -->
    <main class="content-hidden">
        <section class="sub-banner-padding bg-background-secondary text-white relative">
            <div class="luxury-container text-center">
                <h1 class="text-lg md:text-xl lg:text-2xl font-bold text-luxury-gold mb-6 tracking-wider uppercase">
                    Contact Us 
                </h1>
                <p class="text-md md:text-xl text-foreground-muted max-w-3xl mx-auto leading-relaxed">
                    We are a team of dedicated professionals who are passionate about creating beautiful and functional spaces. Contact us for any questions or inquiries.
                </p>
            </div>
        </section>

        <!-- Map Location Section -->
        <section class="section-padding bg-background text-white relative">
            <div class="luxury-container">
                <div class="grid grid-cols-1 gap-12 lg:gap-16">
                    <!-- Left Section - Cape Town Branch -->
                    <div class="space-y-8">
                        <h3 class="text-2xl md:text-3xl font-bold text-white uppercase tracking-wider mb-6">
                            JOHANNESBURG BRANCH
                        </h3>
                        
                        <div class="space-y-4 text-white">
                            <p class="flex items-start">
                                <span class="font-bold mr-3 min-w-[20px]">A : &nbsp; </span>
                                <span> {{ \App\Helpers\SettingHelper::address() }}</span>
                            </p>
                            <p class="flex items-start">
                                <span class="font-bold mr-3 min-w-[20px]">E : &nbsp; </span>
                                <span> {{ \App\Helpers\SettingHelper::contactEmail() }}</span>
                            </p>
                            <p class="flex items-start">
                                <span class="font-bold mr-3 min-w-[20px]">T : &nbsp; </span>
                                <span> {{ \App\Helpers\SettingHelper::contactPhone() }}</span>
                            </p>
                        </div>
                        
                        <!-- Google Maps Embed -->
                        <div class="mt-8">
                            <iframe 
                                src="https://www.google.com/maps?q=69%20Albertina%20Sisulu%20Road,%20Bezuidenhout%20Valley,%20Johannesburg,%20Gauteng,%20South%20Africa&output=embed"
                                width="100%" 
                                height="500" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                class="rounded-lg shadow-lg">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Get In Touch Section Contact Form Section -->
        <section class="section-padding bg-background-secondary text-white relative">
            <div class="luxury-container">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-luxury-gold mb-6 tracking-wider uppercase">
                        Get In Touch
                    </h2>
                    <p class="text-lg md:text-xl text-foreground-muted max-w-3xl mx-auto leading-relaxed">
                        Ready to transform your space? Contact us today for a personalized consultation and let us bring your vision to life.
                    </p>
                </div>
                
                <!-- Contact Form -->
                <div class="form-width mx-auto bg-background contact-form rounded-2xl p-8 md:p-12 border border-gray-700">
                    <!-- Flash Messages -->
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form class="space-y-8" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <!-- Name and Email Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="fullName" class="form-label">Full Name *</label>
                                <input type="text" id="fullName" name="fullName" required class="form-input" placeholder="Enter your full name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" id="email" name="email" required class="form-input" placeholder="Enter your email address">
                            </div>
                        </div>
                        
                        <!-- Phone and Subject Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-input" placeholder="Enter your phone number">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="form-label">Subject *</label>
                                <select id="subject" name="subject" required class="form-select">
                                    <option value="">Select a subject</option>
                                    <option value="general-inquiry">General Inquiry</option>
                                    <option value="project-consultation">Project Consultation</option>
                                    <option value="service-quote">Service Quote</option>
                                    <option value="appointment-booking">Appointment Booking</option>
                                    <option value="partnership">Partnership Opportunity</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Service Selection -->
                        <div class="form-group">
                            <label for="service" class="form-label">Service of Interest</label>
                            <select id="service" name="service" class="form-select">
                                <option value="">Select a service (optional)</option>
                                <option value="bedroom-design">Bedroom Design</option>
                                <option value="living-room-design">Living Room Design</option>
                                <option value="dining-room-design">Dining Room Design</option>
                                <option value="kitchen-design">Kitchen Design</option>
                                <option value="office-design">Office Design</option>
                                <option value="bathroom-design">Bathroom Design</option>
                                <option value="exterior-design">Exterior Design</option>
                                <option value="full-home-design">Full Home Design</option>
                            </select>
                        </div>
                        
                        <!-- Project Details -->
                        <div class="form-group">
                            <label for="projectDetails" class="form-label">Project Details</label>
                            <textarea id="projectDetails" name="projectDetails" rows="4" class="form-textarea" placeholder="Tell us about your project, requirements, timeline, and any specific ideas you have in mind..."></textarea>
                        </div>
                        
                        <!-- Budget Range -->
                        <div class="form-group">
                            <label for="budget" class="form-label">Budget Range</label>
                            <select id="budget" name="budget" class="form-select">
                                <option value="">Select budget range (optional)</option>
                                <option value="under-10k">Under R10,000</option>
                                <option value="10k-15k">R10,000 - R15,000</option>
                                <option value="15k-25k">R15,000 - R25,000</option>
                                <option value="25k-50k">R25,000 - R50,000</option>
                                <option value="over-50k">Over R50,000</option>
                                <option value="not-specified">Not specified</option>
                            </select>
                        </div>
                        
                        <!-- Preferred Contact Method -->
                        <div class="form-group">
                            <label class="form-label">Preferred Contact Method</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                                <!-- Email Option -->
                                <label class="contact-method-card cursor-pointer group">
                                    <input type="radio" name="contactMethod" value="email" class="hidden" checked>
                                    <div class="contact-method-content">
                                        <div class="contact-method-icon">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                            </svg>
                                        </div>
                                        <h3 class="contact-method-title">Email</h3>
                                        <p class="contact-method-desc">We'll respond within 24 hours</p>
                                    </div>
                                </label>

                                <!-- Phone Option -->
                                <label class="contact-method-card cursor-pointer group">
                                    <input type="radio" name="contactMethod" value="phone" class="hidden">
                                    <div class="contact-method-content">
                                        <div class="contact-method-icon">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                            </svg>
                                        </div>
                                        <h3 class="contact-method-title">Phone</h3>
                                        <p class="contact-method-desc">Call us for immediate assistance</p>
                                    </div>
                                </label>

                                <!-- WhatsApp Option -->
                                <label class="contact-method-card cursor-pointer group">
                                    <input type="radio" name="contactMethod" value="whatsapp" class="hidden">
                                    <div class="contact-method-content">
                                        <div class="contact-method-icon">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                            </svg>
                                        </div>
                                        <h3 class="contact-method-title">WhatsApp</h3>
                                        <p class="contact-method-desc">Quick chat and instant support</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="text-center pt-6">
                            <button type="submit" class="btn-outline">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Send Message</span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </main>

@endsection

