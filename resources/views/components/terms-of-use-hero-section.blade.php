{{--
Terms of Use Hero Section Alias Component
Delegates to <x-terms-hero-section /> to support both naming conventions.
--}}
@props([
    'headline' => 'Terms of Use',
    'description' => 'Welcome to the website of Polyplex DigiPrint. By accessing or using this website, you agree to comply with the following Terms of Use. These terms govern your access to and use of the website, its content and the information and services made available through it. Please read these terms carefully before using the website. If you do not agree with any part of these terms, please discontinue your use of the website.',
])

<x-terms-hero-section :headline="$headline" :description="$description" {{ $attributes }} />

