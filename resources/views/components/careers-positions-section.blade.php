{{--
Careers Open Positions Section (Accordion / Dropdown Section)
Based on Polyplex DigiPrint Design:
- Heading: "Open Positions"
- Subtitle: Narrative describing opportunities across digital print ecosystem
- 11 Expandable Position Accordions with Polyplex Navy titles and Crimson chevrons
- Rich expanded job details:
  1. Job Summary
  2. Key Responsibilities
  3. Qualifications
  4. What We Offer
  5. "Click here to send us your resume" trigger
- Interactive candidate application modal dialog
--}}
@props([
    'title' => 'Open Positions',
    'subtitle' => 'Explore current opportunities at PolyPlex DigiPrint and discover where your skills and ambitions can contribute to our growing organisation. Our open positions span different functions, capabilities and experience levels, offering opportunities to work across an evolving digital print ecosystem.',
    'jobs' => null,
])

@php
    $defaultJobs = [
        [
            'slug' => 'account-manager',
            'title' => 'Account Manager',
            'summary' => "As an Account Manager, you will be the primary point of contact for assigned clients. You'll oversee campaign execution, manage timelines, ensure client satisfaction, and drive results by collaborating with creative, strategy, and media teams.",
            'responsibilities' => [
                'Build and maintain strong client relationships with clear, consistent communication.',
                'Understand clients’ business goals and translate them into strategic briefs.',
                'Manage project timelines, budgets, and deliverables to ensure timely execution.',
                'Collaborate with creative, digital, and media teams to deliver high-quality campaigns.',
                'Present proposals, campaign plans, and performance reports to clients.',
                'Identify growth opportunities within existing accounts.',
                'Resolve issues and provide thoughtful solutions under pressure.',
                'Stay updated on industry trends and competitors to inform client strategies.',
            ],
            'qualifications' => [
                '2–4 years of experience in client servicing/account management in an advertising or digital agency',
                'Strong project management and organizational skills',
                'Excellent verbal and written communication skills',
                'Ability to multitask and manage multiple accounts and deadlines',
                'Proficiency in tools like MS Office, Google Workspace, Trello/Asana, etc',
                'A strategic thinker with a problem-solving attitude.',
            ],
            'benefits' => [
                'A dynamic and creative workplace that values collaboration and innovation.',
                'Opportunities for professional growth and career development.',
                'A chance to work with a diverse portfolio of exciting brands and projects.',
            ],
        ],
        [
            'slug' => 'production-manager',
            'title' => 'Production Manager',
            'summary' => 'Lead end-to-end manufacturing workflows across high-speed synthetic paper coating, slitting, and finishing operations, ensuring exceptional product quality and operational throughput.',
            'responsibilities' => [
                'Direct plant operations across specialty film extrusion, surface treatment, and finishing lines.',
                'Optimize shift schedules, machinery utilization, and material yields to meet monthly production targets.',
                'Enforce stringent ISO 9001 and ISO 14001 quality, safety, and environmental standards on shop floors.',
                'Lead continuous improvement and Lean 5S initiatives to minimize waste and optimize energy efficiency.',
                'Collaborate with maintenance, supply chain, and quality assurance teams to resolve operational bottlenecks.',
            ],
            'qualifications' => [
                'Bachelor’s degree in Mechanical, Chemical, or Production Engineering (or equivalent).',
                '5–8 years of supervisory experience in paper manufacturing, polymers, or roll-to-roll film converting.',
                'Proven track record in shop-floor leadership, Lean implementation, and root cause analysis.',
                'Strong analytical mindset with proficiency in ERP/MES production planning systems.',
            ],
            'benefits' => [
                'Competitive compensation package with performance-linked incentives.',
                'Comprehensive health and family wellness coverage.',
                'Leadership development pathways across national manufacturing hubs.',
            ],
        ],
        [
            'slug' => 'manufacturing-engineer',
            'title' => 'Manufacturing Engineer',
            'summary' => 'Design, optimize, and scale precision polymer coating and substrate finishing processes to drive peak operational performance and manufacturing reliability.',
            'responsibilities' => [
                'Develop standard operating procedures (SOPs) for high-speed digital print substrate coating lines.',
                'Analyze process parameters, thermal profiles, and web tension data to maximize production yield.',
                'Troubleshoot process anomalies, evaluate raw material variances, and implement corrective actions.',
                'Support capital engineering projects from equipment installation through qualification (IQ/OQ/PQ).',
            ],
            'qualifications' => [
                'Bachelor’s in Polymer Science, Chemical Engineering, or Industrial Engineering.',
                '3–6 years of hands-on process engineering experience in web handling, film converting, or coating.',
                'Solid knowledge of PLC control systems, statistical process control (SPC), and CAD design tools.',
            ],
            'benefits' => [
                'Exposure to industry-leading polymer coating technology and automation.',
                'Structured technical advancement programs and annual certifications.',
                'Collaborative work environment focused on process innovation.',
            ],
        ],
        [
            'slug' => 'quality-control-engineer',
            'title' => 'Quality Control Engineer',
            'summary' => 'Oversee rigorous laboratory testing protocols, substrate performance verification, and regulatory compliance across all Polyplex DigiPrint product lines.',
            'responsibilities' => [
                'Conduct physical, chemical, and printability testing on synthetic papers and specialty films.',
                'Evaluate opacity, tear resistance, ink adhesion, surface dyne levels, and toner compatibility.',
                'Oversee raw material inspections, in-process audits, and finished goods release certifications.',
                'Investigate customer quality feedback, lead 8D root-cause investigations, and track preventive actions.',
            ],
            'qualifications' => [
                'Degree in Chemistry, Material Science, or Printing Technology.',
                '3–5 years in QA/QC testing within digital printing media, flexible packaging, or specialty papers.',
                'Hands-on experience with spectrophotometers, tensile testers, and digital press calibration.',
            ],
            'benefits' => [
                'State-of-the-art laboratory testing infrastructure.',
                'Career mobility across R&D and manufacturing quality domains.',
                'Comprehensive medical and group accidental insurance coverage.',
            ],
        ],
        [
            'slug' => 'maintenance-engineer',
            'title' => 'Maintenance Engineer',
            'summary' => 'Ensure maximum uptime, reliability, and precision across automated coating lines, corona treaters, slitter-rewinders, and plant utilities.',
            'responsibilities' => [
                'Plan and execute preventative and predictive maintenance schedules for continuous manufacturing lines.',
                'Rapidly diagnose electrical, mechanical, hydraulic, and pneumatic equipment faults.',
                'Manage spare parts inventory, vendor service contracts, and critical machine component rebuilds.',
                'Lead energy efficiency initiatives and predictive vibration/thermal monitoring routines.',
            ],
            'qualifications' => [
                'Bachelor’s or Diploma in Electrical or Mechanical Engineering.',
                '4+ years of industrial maintenance experience in web processing, converting, or continuous line plants.',
                'Strong troubleshooting abilities with VFDs, servo drives, sensors, and PLC diagnostics.',
            ],
            'benefits' => [
                'Hands-on engagement with advanced European and Japanese converting machinery.',
                'Subsidized transportation and on-site facility amenities.',
                'Performance-driven annual bonus and skill development bonuses.',
            ],
        ],
        [
            'slug' => 'machine-operator',
            'title' => 'Machine Operator',
            'summary' => 'Operate precision slitting, rewinding, coating, and automated packaging equipment with an unwavering commitment to quality standards and shop floor safety.',
            'responsibilities' => [
                'Set up, calibrate, and run digital print media converting and slitting machinery according to work orders.',
                'Continuously monitor roll tension, edge guide alignment, surface uniformity, and coating thickness.',
                'Perform routine changeovers, blade replacements, and cleaning of rollers and doctor blades.',
                'Maintain accurate production logs, defect records, and raw material usage sheets.',
            ],
            'qualifications' => [
                'ITI / Diploma or high school diploma with technical certifications.',
                '2+ years of operating experience in film slitting, paper finishing, laminating, or printing.',
                'Sharp attention to detail, physical stamina, and commitment to workplace safety guidelines.',
            ],
            'benefits' => [
                'Stable shifts with attendance bonuses and overtime benefits.',
                'Safety gear, uniform, and annual health check-up programs.',
                'Internal promotion track into shift supervisory roles.',
            ],
        ],
        [
            'slug' => 'supply-chain-manager',
            'title' => 'Supply Chain Manager',
            'summary' => 'Orchestrate global raw material procurement, inventory staging, multimodal logistics, and customer fulfillment across domestic and international distribution networks.',
            'responsibilities' => [
                'Orchestrate end-to-end supply chain strategies across 9 manufacturing and 12 distribution locations.',
                'Align demand forecasts with plant capacity, inventory thresholds, and regional sales commitments.',
                'Optimize freight routes, warehouse operations, and carrier contracts to cut transit lead times.',
                'Mitigate international freight risks, customs compliance, and supply disruption contingencies.',
            ],
            'qualifications' => [
                'Master’s or Bachelor’s in Supply Chain, Logistics, or Business Administration.',
                '6–10 years in supply chain management within manufacturing, polymers, or FMCG materials.',
                'Deep expertise in ERP supply chain modules (SAP/Oracle), warehouse management, and freight negotiation.',
            ],
            'benefits' => [
                'Strategic leadership role within a globally operating brand.',
                'Executive performance bonuses and hybrid working flexibility.',
                'Continuous senior leadership mentorship and executive education.',
            ],
        ],
        [
            'slug' => 'procurement-executive',
            'title' => 'Procurement Executive',
            'summary' => 'Manage strategic sourcing of specialty resins, chemical topcoats, release liners, and packaging supplies at optimal total cost of ownership.',
            'responsibilities' => [
                'Issue RFQs, negotiate price, payment terms, and delivery schedules with domestic and overseas suppliers.',
                'Monitor vendor performance, lead times, quality certificates, and supply continuity.',
                'Track polymer and raw material market index trends to optimize bulk purchasing timing.',
                'Coordinate with finance and warehouse teams for timely order matching, invoice clearance, and GRNs.',
            ],
            'qualifications' => [
                'Bachelor’s in Commerce, Business, or Chemical/Industrial Engineering.',
                '2–5 years of procurement or vendor management experience in an industrial manufacturing setting.',
                'Exceptional commercial acumen, analytical negotiation skills, and vendor evaluation experience.',
            ],
            'benefits' => [
                'Direct exposure to international vendor relationships and cross-border trade.',
                'Annual appraisals with fast-track merit growth.',
                'Friendly, collaborative corporate workplace.',
            ],
        ],
        [
            'slug' => 'warehouse-supervisor',
            'title' => 'Warehouse Supervisor',
            'summary' => 'Lead daily receipt, climate-controlled storage, picking, and dispatch operations across raw substrate master rolls and finished goods inventory.',
            'responsibilities' => [
                'Supervise inbound roll unloading, barcode scanning, storage allocation, and inventory FIFO compliance.',
                'Coordinate order staging, palletizing, wrapping, and dispatch documentation with transport logistics.',
                'Conduct cycle counts, reconciliation audits, and maintain 99.8%+ inventory record accuracy.',
                'Enforce warehouse housekeeping, forklift safety protocols, and space optimization.',
            ],
            'qualifications' => [
                'Bachelor’s degree or Diploma in Logistics, Materials Management, or equivalent.',
                '3–6 years of warehouse supervision experience in heavy roll goods, paper, or manufacturing facilities.',
                'Proficiency in WMS software, RF scanners, and material handling equipment safety regulations.',
            ],
            'benefits' => [
                'Supportive operations team and modern inventory management technology.',
                'Comprehensive medical insurance and retirement benefits.',
                'Performance incentives for dispatch accuracy and safety compliance.',
            ],
        ],
        [
            'slug' => 'health-and-safety-officer',
            'title' => 'Health and Safety Officer',
            'summary' => 'Champion zero-incident safety culture, occupational health, fire protection, and statutory environmental compliance across all facility operations.',
            'responsibilities' => [
                'Conduct comprehensive plant hazard assessments, job safety analyses (JSA), and routine safety audits.',
                'Train plant personnel on chemical safety, PPE compliance, lockout-tagout (LOTO), and emergency response.',
                'Lead incident investigations, identify root causes, and track corrective action closures.',
                'Ensure compliance with statutory labor laws, pollution control norms, and ISO 45001 standards.',
            ],
            'qualifications' => [
                'Degree/Diploma in Industrial Safety or Environmental Engineering (NEBOSH / RLI preferred).',
                '3–6 years of industrial safety experience in manufacturing, chemical, or film processing plants.',
                'Strong leadership, emergency coordination skills, and comprehensive regulatory knowledge.',
            ],
            'benefits' => [
                'Empowered mandate to implement best-in-class industrial safety practices.',
                'Professional safety association memberships sponsored by the company.',
                'Wellness perks and family medical coverage.',
            ],
        ],
        [
            'slug' => 'research-and-development-engineer',
            'title' => 'Research and Development Engineer',
            'summary' => 'Invent, test, and commercialize next-generation synthetic paper coatings, laser-compatible polymers, and eco-friendly recyclable print media.',
            'responsibilities' => [
                'Formulate novel aqueous and solventless primers, ink-receptive coatings, and anti-static topcoats.',
                'Conduct pilot coating trials, test substrate interactions across HP Indigo, toner, and inkjet platforms.',
                'Collaborate with international printer OEMs to secure media certification and approval ratings.',
                'Document patent disclosures, technical data sheets (TDS), and application guidelines for sales teams.',
            ],
            'qualifications' => [
                'Master’s or Ph.D. in Polymer Chemistry, Coating Technology, Material Science, or Chemical Engineering.',
                '3–7 years of formulation and research experience in specialty papers, polymer films, or printing substrates.',
                'Expertise in surface chemistry, contact angle measurement, rheology, and advanced analytical characterization.',
            ],
            'benefits' => [
                'Access to cutting-edge polymer R&D synthesis and analytical testing facilities.',
                'IP incentives for published patents and breakthrough product formulation launches.',
                'Opportunities to represent Polyplex at national and international print technology conventions.',
            ],
        ],
    ];

    $jobList = $jobs ?? $defaultJobs;
@endphp

<section id="open-positions" class="relative w-full bg-[#F3F3F3] py-14 sm:py-20 lg:py-24" aria-label="Current Career Opportunities">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Heading --}}
        <h2 class="font-heading font-[700] text-3xl sm:text-4xl lg:text-[40px] text-[#0E4174] tracking-tight mb-4">
            {{ $title }}
        </h2>

        {{-- Narrative Description --}}
        <p class="font-sans text-sm sm:text-base text-slate-700 leading-relaxed max-w-4xl mb-8 sm:mb-12">
            {{ $subtitle }}
        </p>

        {{-- Accordion List of Open Positions --}}
        <div class="divide-y divide-slate-300 border-t border-b border-slate-300" id="careers-positions-accordion">
            @foreach($jobList as $index => $job)
                <div class="career-job-item group" data-job-slug="{{ $job['slug'] }}">
                    {{-- Accordion Header Trigger --}}
                    <button type="button" 
                        class="career-job-trigger w-full py-4 sm:py-5 flex items-center justify-between text-left transition-colors cursor-pointer focus:outline-hidden focus:bg-slate-200/40"
                        aria-expanded="false" 
                        aria-controls="job-body-{{ $job['slug'] }}"
                        id="job-header-{{ $job['slug'] }}">
                        
                        {{-- Position Title --}}
                        <span class="font-heading font-semibold text-base sm:text-lg lg:text-[19px] text-[#0E4174] transition-colors group-hover:text-blue-700">
                            {{ $job['title'] }}
                        </span>

                        {{-- Crimson Chevron Indicator --}}
                        <span class="career-chevron-icon text-[#D80018] ml-4 shrink-0 transition-transform duration-300 ease-in-out" aria-hidden="true">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>

                    {{-- Accordion Dropdown Content (Revealed on click) --}}
                    <div id="job-body-{{ $job['slug'] }}" 
                        class="career-job-body hidden pb-6 sm:pb-8 transition-all duration-300"
                        role="region" 
                        aria-labelledby="job-header-{{ $job['slug'] }}">
                        
                        <div class="bg-white rounded-md p-6 sm:p-8 md:p-10 shadow-xs border border-slate-200/80">
                            
                            {{-- 1. Job Summary --}}
                            @if(!empty($job['summary']))
                                <div class="mb-6 sm:mb-8">
                                    <h3 class="font-heading font-semibold text-lg sm:text-xl text-slate-900 mb-2.5">
                                        Job Summary
                                    </h3>
                                    <p class="font-sans text-sm sm:text-[15px] text-slate-700 leading-relaxed">
                                        {{ $job['summary'] }}
                                    </p>
                                </div>
                                <div class="border-b border-slate-200/80 my-6 sm:my-8" aria-hidden="true"></div>
                            @endif

                            {{-- 2. Key Responsibilities --}}
                            @if(!empty($job['responsibilities']))
                                <div class="mb-6 sm:mb-8">
                                    <h3 class="font-heading font-semibold text-lg sm:text-xl text-slate-900 mb-3.5">
                                        Key Responsibilities
                                    </h3>
                                    <ul class="space-y-2.5 font-sans text-sm sm:text-[14.5px] text-slate-700 leading-relaxed">
                                        @foreach($job['responsibilities'] as $resp)
                                            <li class="flex items-start">
                                                <span class="text-slate-400 mr-2.5 font-bold select-none leading-none mt-1">•</span>
                                                <span>{{ $resp }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="border-b border-slate-200/80 my-6 sm:my-8" aria-hidden="true"></div>
                            @endif

                            {{-- 3. Qualifications --}}
                            @if(!empty($job['qualifications']))
                                <div class="mb-6 sm:mb-8">
                                    <h3 class="font-heading font-semibold text-lg sm:text-xl text-slate-900 mb-3.5">
                                        Qualifications
                                    </h3>
                                    <ul class="space-y-2.5 font-sans text-sm sm:text-[14.5px] text-slate-700 leading-relaxed">
                                        @foreach($job['qualifications'] as $qual)
                                            <li class="flex items-start">
                                                <span class="text-slate-400 mr-2.5 font-bold select-none leading-none mt-1">•</span>
                                                <span>{{ $qual }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- 4. Benefits / What We Offer (As shown in design reference) --}}
                            @if(!empty($job['benefits']))
                                <div class="border-b border-slate-200/80 my-6 sm:my-8" aria-hidden="true"></div>
                                <div class="mb-6 sm:mb-8">
                                    <h3 class="font-heading font-semibold text-lg sm:text-xl text-slate-900 mb-3.5">
                                        Qualifications
                                    </h3>
                                    <ul class="space-y-2.5 font-sans text-sm sm:text-[14.5px] text-slate-700 leading-relaxed">
                                        @foreach($job['benefits'] as $benefit)
                                            <li class="flex items-start">
                                                <span class="text-slate-400 mr-2.5 font-bold select-none leading-none mt-1">•</span>
                                                <span>{{ $benefit }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- 5. "Click here to send us your resume" Link --}}
                            <div class="pt-3">
                                <p class="font-sans text-sm sm:text-[15px] text-slate-800">
                                    <button type="button" 
                                        class="career-apply-modal-btn text-[#0E4174] font-semibold underline hover:text-blue-700 transition-colors cursor-pointer focus:outline-hidden"
                                        data-job-title="{{ $job['title'] }}">
                                        Click here
                                    </button>
                                    <span>to send us your resume</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    {{-- Interactive Resume Submission Modal Dialog --}}
    <div id="career-resume-modal" 
        class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/70 backdrop-blur-xs transition-opacity duration-300"
        role="dialog" 
        aria-modal="true" 
        aria-labelledby="career-resume-modal-title">
        
        <div class="relative w-full max-w-lg bg-white rounded-xl overflow-hidden shadow-2xl border border-slate-200">
            {{-- Modal Header --}}
            <div class="flex items-center justify-between px-6 py-4 bg-[#0E4174] text-white">
                <div>
                    <h3 id="career-resume-modal-title" class="font-heading font-semibold text-lg text-white">
                        Send Your Resume
                    </h3>
                    <p id="career-modal-position-name" class="font-sans text-xs text-blue-100 mt-0.5">
                        Applying for: Position
                    </p>
                </div>
                <button type="button" 
                    id="career-close-resume-btn" 
                    class="text-blue-200 hover:text-white p-1 rounded-md transition-colors focus:outline-hidden"
                    aria-label="Close modal">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Application Form --}}
            <form id="career-application-form" class="p-6 space-y-4" onsubmit="event.preventDefault(); window.handleCareerSubmit();">
                <div>
                    <label for="applicant-name" class="block font-sans text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Full Name *
                    </label>
                    <input type="text" id="applicant-name" required placeholder="John Doe"
                        class="w-full px-3.5 py-2.5 rounded-md border border-slate-300 font-sans text-sm text-slate-900 focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition-all">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="applicant-email" class="block font-sans text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                            Email Address *
                        </label>
                        <input type="email" id="applicant-email" required placeholder="john@example.com"
                            class="w-full px-3.5 py-2.5 rounded-md border border-slate-300 font-sans text-sm text-slate-900 focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label for="applicant-phone" class="block font-sans text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                            Phone Number
                        </label>
                        <input type="tel" id="applicant-phone" placeholder="+91 98765 43210"
                            class="w-full px-3.5 py-2.5 rounded-md border border-slate-300 font-sans text-sm text-slate-900 focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition-all">
                    </div>
                </div>

                <div>
                    <label for="applicant-resume" class="block font-sans text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Resume / CV (PDF, DOCX) *
                    </label>
                    <input type="file" id="applicant-resume" accept=".pdf,.doc,.docx" required
                        class="w-full px-3 py-2 text-sm text-slate-600 border border-slate-300 rounded-md file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-[#0E4174] hover:file:bg-blue-100 cursor-pointer">
                </div>

                <div>
                    <label for="applicant-message" class="block font-sans text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Brief Cover Note (Optional)
                    </label>
                    <textarea id="applicant-message" rows="3" placeholder="Tell us briefly why you'd be a great fit..."
                        class="w-full px-3.5 py-2 rounded-md border border-slate-300 font-sans text-sm text-slate-900 focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition-all resize-none"></textarea>
                </div>

                <div class="pt-2 flex items-center justify-between">
                    <a id="career-mailto-link" href="mailto:careers@polyplex.com" class="text-xs text-slate-500 hover:text-[#0E4174] transition-colors">
                        Or email directly &rarr;
                    </a>
                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-2.5 rounded-xs bg-[#003570] hover:bg-[#071d36] text-white font-medium text-sm transition-colors shadow-xs focus:outline-hidden focus:ring-2 focus:ring-[#003570]">
                        Submit Application
                    </button>
                </div>
            </form>

            {{-- Success Confirmation View --}}
            <div id="career-success-state" class="hidden p-8 text-center">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m4.5 12.75 6 6 9-13.5"/>
                    </svg>
                </div>
                <h4 class="font-heading font-bold text-xl text-slate-900 mb-2">
                    Application Received!
                </h4>
                <p class="font-sans text-sm text-slate-600 mb-6">
                    Thank you for applying. Our talent acquisition team will review your credentials and contact you if your profile aligns with our openings.
                </p>
                <button type="button" id="career-success-close-btn"
                    class="px-6 py-2 rounded-xs bg-[#003570] text-white text-sm font-medium hover:bg-[#071d36] transition-colors">
                    Done
                </button>
            </div>
        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Accordion Toggle Functionality
        const triggers = document.querySelectorAll('.career-job-trigger');

        triggers.forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                const isExpanded = trigger.getAttribute('aria-expanded') === 'true';
                const bodyId = trigger.getAttribute('aria-controls');
                const body = document.getElementById(bodyId);
                const chevron = trigger.querySelector('.career-chevron-icon svg');

                if (isExpanded) {
                    // Close this item
                    trigger.setAttribute('aria-expanded', 'false');
                    if (body) {
                        body.classList.add('hidden');
                    }
                    if (chevron) {
                        chevron.style.transform = 'rotate(0deg)';
                    }
                } else {
                    // Open this item
                    trigger.setAttribute('aria-expanded', 'true');
                    if (body) {
                        body.classList.remove('hidden');
                    }
                    if (chevron) {
                        chevron.style.transform = 'rotate(180deg)';
                    }
                }
            });
        });

        // 2. Application Modal Functionality
        const applyBtns = document.querySelectorAll('.career-apply-modal-btn');
        const modal = document.getElementById('career-resume-modal');
        const closeBtn = document.getElementById('career-close-resume-btn');
        const successCloseBtn = document.getElementById('career-success-close-btn');
        const positionNameLabel = document.getElementById('career-modal-position-name');
        const mailtoLink = document.getElementById('career-mailto-link');
        const form = document.getElementById('career-application-form');
        const successState = document.getElementById('career-success-state');

        function openModal(jobTitle) {
            if (!modal) return;
            if (positionNameLabel) {
                positionNameLabel.textContent = 'Applying for: ' + jobTitle;
            }
            if (mailtoLink) {
                mailtoLink.href = 'mailto:careers@polyplex.com?subject=Application for ' + encodeURIComponent(jobTitle);
            }
            if (form) form.classList.remove('hidden');
            if (successState) successState.classList.add('hidden');

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            if (!modal) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        applyBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const jobTitle = btn.getAttribute('data-job-title') || 'Open Position';
                openModal(jobTitle);
            });
        });

        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        if (successCloseBtn) successCloseBtn.addEventListener('click', closeModal);

        if (modal) {
            modal.addEventListener('click', function (e) {
                if (e.target === modal) closeModal();
            });
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        window.handleCareerSubmit = function () {
            if (form) form.classList.add('hidden');
            if (successState) successState.classList.remove('hidden');
        };
    });
</script>

