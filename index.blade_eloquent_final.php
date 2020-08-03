@extends ('layout')

    @section ('content')

    <div id="wrapper">

        <div 
        id="page" 
        class="container"
        >
        @forelse ($artefacts as $artefact)
            <div class="content">
			    <div class="title">
                    <h2>
                        <a href="{{ $artefact->path() }}">
                            {{  $artefact->title }}
                        </a>
                    </h2>
                </div>

                

			    <p>
                    <img 
                    src="images/banner.jpg" 
                    alt="" 
                    class="image image-full" /> 
                </p>
            
                {!! $artefact->excerpt !!}
            </div>
        @empty
            <p>No relevent artefacts yet.</p>
        @endforelse
	</div>
</div>


@endsection