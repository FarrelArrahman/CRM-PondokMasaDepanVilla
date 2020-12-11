<div {{ $attributes->merge(['class' => 'card bg-gradient-' . $type . ' card-img-holder text-' . $color]) }}>
    <div class="card-body">
        <img src="{{ asset('purple-admin/images/dashboard/circle.svg') }}" class="card-img-absolute"
            alt="circle-image" />
        <h4 class="font-weight-normal mb-3">
            {{ $title }} 
            <!-- <i class="mdi mdi-chart-line mdi-24px float-right"></i> -->
            {{ $slot }}
            {{ $tambahan ?? '' }}
        </h4>
        <h2 class="mb-5">{{ $text }}</h2>
        <h6 class="card-text">{{ $description }}</h6>
    </div>
</div>
