<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <div class="letter-nav">
        Ga naar letter:
        <a href="#A">A</a>-
        <a href="#B">B</a>-
        <a href="#C">C</a>-
        <a href="#D">D</a>-
        <a href="#E">E</a>-
        <a href="#F">F</a>-
        <a href="#G">G</a>-
        <a href="#H">H</a>-
        <a href="#I">I</a>-
        <a href="#J">J</a>-
        <a href="#K">K</a>-
        <a href="#L">L</a>-
        <a href="#M">M</a>-
        <a href="#N">N</a>-
        <a href="#O">O</a>-
        <a href="#P">P</a>-
        <a href="#Q">Q</a>-
        <a href="#R">R</a>-
        <a href="#S">S</a>-
        <a href="#T">T</a>-
        <a href="#U">U</a>-
        <a href="#V">V</a>-
        <a href="#W">W</a>-
        <a href="#X">X</a>-
        <a href="#Y">Y</a>-
        <a href="#Z">Z</a>
    </div>

    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="container">
        <h2>{{$name}}</h2>
        <!-- Example row of columns -->
        <div class="row">

            <h2>Top 10 Populaire Handleidingen</h2>
            <ul>
                @foreach($topManuals as $manual)
                    <li>{{ $manual->name }}</li>
                @endforeach
            </ul>

            @foreach($brands->chunk($chunk_size) as $chunk)
                <div class="col-md-4">

                    <ul>
                        @foreach($chunk as $brand)

                            <?php
                            $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                            if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                                echo '</ul>
						<h2>' . $current_first_letter . '</h2>
						<ul>';
                            }
                            $header_first_letter = $current_first_letter
                            ?>

                            <li>
                                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <?php
                unset($header_first_letter);
                ?>
            @endforeach

        </div>

    </div>
</x-layouts.app>
