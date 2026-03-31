<x-layouts.front-end.app>
    <div>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

            * {
                font-family: "Poppins", sans-serif;
            }
        </style>

        <!-- Hero Section -->
        <section
            class="bg-[#000080]/80 mb-5 mt-2 rounded-2xl bg-[url(https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?q=80&w=1170&auto=format&fit=crop)] bg-blend-overlay bg-no-repeat bg-cover py-20 px-4 md:px-8">
            <div class="max-w-6xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-[#FF8F20] mb-4">Our Services</h1>
                <p class="text-white text-lg max-w-3xl mx-auto">Comprehensive live production and streaming solutions for
                    every need.</p>
            </div>
        </section>

        <!-- Services Grid -->
        <section class="py-16 px-4 bg-[#000080]/80">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Service 1 -->
                    <div
                        class="bg-black/40 backdrop-blur rounded-2xl p-6 border border-white/20 hover:border-[#FF8F20] transition">
                        <div class="w-16 h-16 bg-[#FF8F20]/20 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="#FF8F20" stroke-width="1.5">
                                <rect x="2" y="6" width="20" height="12" rx="2" />
                                <path d="M8 12h8" />
                                <path d="M12 8v8" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Multi-Camera Live Production</h3>
                        <p class="text-gray-300 mb-4">Professional 4K live switching with up to 6 camera angles, perfect
                            for concerts, events, and broadcasts.</p>
                        <ul class="text-gray-400 text-sm space-y-1">
                            <li>✓ Up to 6 Sony 4K cameras</li>
                            <li>✓ Live switching & mixing</li>
                            <li>✓ Professional camera operators</li>
                            <li>✓ Instant replay capabilities</li>
                        </ul>
                        <p class="text-[#FF8F20] font-semibold mt-4">From KES 25,000/session</p>
                    </div>

                    <!-- Service 2 -->
                    <div
                        class="bg-black/40 backdrop-blur rounded-2xl p-6 border border-white/20 hover:border-[#FF8F20] transition">
                        <div class="w-16 h-16 bg-[#FF8F20]/20 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="#FF8F20" stroke-width="1.5">
                                <circle cx="12" cy="12" r="10" />
                                <polygon points="10 8 16 12 10 16 10 8" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Live Streaming & Broadcasting</h3>
                        <p class="text-gray-300 mb-4">Seamless streaming to YouTube, Facebook, Twitch, and custom RTMP
                            platforms with minimal latency.</p>
                        <ul class="text-gray-400 text-sm space-y-1">
                            <li>✓ Multi-platform streaming</li>
                            <li>✓ Custom graphics & overlays</li>
                            <li>✓ Audience interaction tools</li>
                            <li>✓ Cloud recording & archiving</li>
                        </ul>
                        <p class="text-[#FF8F20] font-semibold mt-4">From KES 15,000/stream</p>
                    </div>

                    <!-- Service 3 -->
                    <div
                        class="bg-black/40 backdrop-blur rounded-2xl p-6 border border-white/20 hover:border-[#FF8F20] transition">
                        <div class="w-16 h-16 bg-[#FF8F20]/20 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="#FF8F20" stroke-width="1.5">
                                <path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3z" />
                                <path d="M19 10v2a7 7 0 0 1-14 0v-2" />
                                <line x1="12" y1="19" x2="12" y2="22" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Professional Audio Recording</h3>
                        <p class="text-gray-300 mb-4">State-of-the-art audio production for podcasts, voiceovers, music,
                            and radio commercials.</p>
                        <ul class="text-gray-400 text-sm space-y-1">
                            <li>✓ Soundproof recording booths</li>
                            <li>✓ Professional mixing & mastering</li>
                            <li>✓ Industry-standard microphones</li>
                            <li>✓ Remote session capabilities</li>
                        </ul>
                        <p class="text-[#FF8F20] font-semibold mt-4">From KES 8,000/hour</p>
                    </div>

                    <!-- Service 4 -->
                    <div
                        class="bg-black/40 backdrop-blur rounded-2xl p-6 border border-white/20 hover:border-[#FF8F20] transition">
                        <div class="w-16 h-16 bg-[#FF8F20]/20 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="#FF8F20" stroke-width="1.5">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2" />
                                <line x1="8" y1="21" x2="16" y2="21" />
                                <line x1="12" y1="17" x2="12" y2="21" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">TV & Corporate Streaming</h3>
                        <p class="text-gray-300 mb-4">Full-service Streaming production for TV commercials, corporate
                            videos, and promotional content.</p>
                        <ul class="text-gray-400 text-sm space-y-1">
                            <li>✓ Script-to-screen production</li>
                            <li>✓ Professional lighting & set design</li>
                            <li>✓ Post-production & editing</li>
                            <li>✓ Streaming-quality deliverables</li>
                        </ul>
                        <p class="text-[#FF8F20] font-semibold mt-4">Custom pricing</p>
                    </div>

                    <!-- Service 5 -->
                    <div
                        class="bg-black/40 backdrop-blur rounded-2xl p-6 border border-white/20 hover:border-[#FF8F20] transition">
                        <div class="w-16 h-16 bg-[#FF8F20]/20 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="#FF8F20" stroke-width="1.5">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 8v4l3 3" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Event Live Production</h3>
                        <p class="text-gray-300 mb-4">Complete live production for conferences, concerts, weddings, and
                            special events.</p>
                        <ul class="text-gray-400 text-sm space-y-1">
                            <li>✓ Full event coverage</li>
                            <li>✓ LED screens & projection</li>
                            <li>✓ Live audio mixing</li>
                            <li>✓ On-site production team</li>
                        </ul>
                        <p class="text-[#FF8F20] font-semibold mt-4">From KES 50,000/event</p>
                    </div>

                    <!-- Service 6 -->
                    <div
                        class="bg-black/40 backdrop-blur rounded-2xl p-6 border border-white/20 hover:border-[#FF8F20] transition">
                        <div class="w-16 h-16 bg-[#FF8F20]/20 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="#FF8F20" stroke-width="1.5">
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                                <path d="M12 22V12" />
                                <path d="M9 10.5 12 8l3 2.5" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Post-Production & Editing</h3>
                        <p class="text-gray-300 mb-4">Professional editing, color grading, and sound design for your
                            recorded content.</p>
                        <ul class="text-gray-400 text-sm space-y-1">
                            <li>✓ Video editing & color grading</li>
                            <li>✓ Audio mastering & mixing</li>
                            <li>✓ Motion graphics & titles</li>
                            <li>✓ Format conversion & delivery</li>
                        </ul>
                        <p class="text-[#FF8F20] font-semibold mt-4">From KES 5,000/hour</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Studio Packages -->
        <section class="py-16 px-4 bg-[#000080]/80">
            <div class="max-w-6xl mx-auto p-2">
                <h2 class="text-3xl font-bold text-white text-center mb-12">Studio Packages</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-black/40 backdrop-blur rounded-2xl p-8 border border-white/20">
                        <h3 class="text-2xl font-bold text-[#FF8F20] mb-2">Starter</h3>
                        <p class="text-gray-300 mb-4">Perfect for podcasts and small productions</p>
                        <p class="text-3xl font-bold text-white mb-6">KES 8,000<span
                                class="text-sm text-gray-400">/hour</span></p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> 1 Camera Setup</li>
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Basic Audio Package</li>
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Standard Lighting</li>
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> 2-Hour Minimum</li>
                        </ul>
                        <button
                            class="w-full bg-[#FF8F20] hover:bg-[#FF8F20]/90 text-gray-900 font-semibold py-2 rounded-lg transition">Book
                            Now</button>
                    </div>
                    <div
                        class="bg-black/40 backdrop-blur rounded-2xl p-12 border-2 border-[#FF8F20] transform scale-105">
                        <div
                            class="absolute top-0 right-0 bg-[#FF8F20] text-gray-900 px-3 py-1 rounded-bl-lg rounded-tr-lg text-sm font-semibold">
                            Popular</div>
                        <h3 class="text-2xl font-bold text-[#FF8F20] mb-2">Professional</h3>
                        <p class="text-gray-300 mb-4">Ideal for live streaming and broadcast</p>
                        <p class="text-3xl font-bold text-white mb-6">KES 15,000<span
                                class="text-sm text-gray-400">/hour</span></p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> 3-Camera Setup</li>
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Professional Audio Package</li>
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Live Streaming Included</li>
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Graphics & Overlays</li>
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Dedicated Producer</li>
                        </ul>
                        <button
                            class="w-full bg-[#FF8F20] hover:bg-[#FF8F20]/90 text-gray-900 font-semibold py-2 rounded-lg transition">Book
                            Now</button>
                    </div>
                    <div class="bg-black/40 backdrop-blur rounded-2xl p-8 border border-white/20">
                        <h3 class="text-2xl font-bold text-[#FF8F20] mb-2">Enterprise</h3>
                        <p class="text-gray-300 mb-4">Full production for events & TV</p>
                        <p class="text-3xl font-bold text-white mb-6">Custom<span
                                class="text-sm text-gray-400">/quote</span></p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Multi-Camera Production</li>
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Full Production Crew</li>
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> On-Location Available</li>
                            <li class="flex items-center gap-2 text-gray-300"><svg class="w-5 h-5 text-[#FF8F20]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> Post-Production Included</li>
                        </ul>
                        <button
                            class="w-full bg-[#FF8F20] hover:bg-[#FF8F20]/90 text-gray-900 font-semibold py-2 rounded-lg transition">Contact
                            Us</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.front-end.app>
