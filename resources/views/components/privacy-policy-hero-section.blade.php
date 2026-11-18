{{--
Privacy Policy Hero Section Alias Component
Delegates to <x-privacy-hero-section /> to support both naming conventions.
--}}
@props([
    'headline' => 'Privacy Policy',
    'description' => 'Polyplex DigiPrint is committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, process, store and protect your personal information when you visit our website, use our services or interact with us. We value your trust and are committed to handling your personal information responsibly and in accordance with applicable data protection laws.',
])

<x-privacy-hero-section :headline="$headline" :description="$description" {{ $attributes }} />

