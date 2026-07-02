@props([
    'rating' => 0,
    'totalStars' => 5,
    'size' => 'h-4 w-4',
])

@php
    $rating = max(0, min($totalStars, (float) $rating));
    $path = 'M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z';
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center gap-0.5']) }}
     role="img"
     aria-label="Rating {{ number_format($rating, 1) }} dari {{ $totalStars }}">
    @for ($i = 1; $i <= $totalStars; $i++)
        @php
            $fillPercent = max(0, min(1, $rating - ($i - 1))) * 100;
            $gradientId = 'starfill-' . $i . '-' . uniqid();
        @endphp

        @if ($fillPercent >= 100 || $fillPercent <= 0)
            <svg class="{{ $size }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill="{{ $fillPercent >= 100 ? '#facc15' : '#d1d5db' }}" d="{{ $path }}" />
            </svg>
        @else
            <svg class="{{ $size }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <defs>
                    <linearGradient id="{{ $gradientId }}">
                        <stop offset="{{ $fillPercent }}%" stop-color="#facc15" />
                        <stop offset="{{ $fillPercent }}%" stop-color="#d1d5db" />
                    </linearGradient>
                </defs>
                <path fill="url(#{{ $gradientId }})" d="{{ $path }}" />
            </svg>
        @endif
    @endfor
</div>