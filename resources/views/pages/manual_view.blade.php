<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}} {{ $type->name }}'" title="Manuals for '{{$brand->name}} {{ $type->name }}'">{{ $type->name }}</a></li>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="View manual for '{{$brand->name}} '" title="View manual for '{{$brand->name}} {{ $type->name }}'">View</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }} - {{ $type->name }}</h1>

    @if ($manual->locally_available)
        <iframe src="{{ $manual->url }}" width="780" height="600" frameborder="0" marginheight="0" marginwidth="0">
        Iframes are not supported<br />
        <a href="{{ $manual->url }}" target="new" alt="Download your manual here" title="Download your manual here">Click here to download the manual</a>
        </iframe>
    @else
        <a href="{{ $manual->url }}" target="new" alt="Download your manual here" title="Download your manual here">Click here to download the manual</a>
    @endif

    <div class="manual">
        <h1>{{ $manual->title }}</h1>
        <p><strong>Merk:</strong> {{ $manual->brand }}</p>
        <p><strong>Type:</strong> {{ $manual->type }}</p>
        <p><strong>Aantal keer bekeken:</strong> {{ $manual->views }}</p>

        <div class="manual-content">
            {!! $manual->content !!}
        </div>

        <a href="{{ route('home') }}">Terug naar de homepage</a>
    </div>

</x-layouts.app>
