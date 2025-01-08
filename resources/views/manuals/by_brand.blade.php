<h1>Handleidingen voor {{ $brand }}</h1>

<h2>Top 5 Handleidingen</h2>
<ul>
    @foreach($topManualsByBrand as $manual)
        <li>{{ $manual->type }}</li>
    @endforeach
</ul>
