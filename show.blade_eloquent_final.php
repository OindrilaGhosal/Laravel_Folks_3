@extends ('layout')

@section ('content')

<div id="wrapper">
	<div 
        id="page" 
        class="container">
		<div id="content">
			<div class="title">
				<h2>{{ $artefact->title }}</h2>
        
            </div>
				  
			<p>
                <img 
                    src="/images/banner.jpg" 
                    alt="" 
                    class="image image-full" 
                /> 
            </p>
			{{ $artefact->body }}

            <p style="margin-top: len">
                @foreach ($artefact->tags as $tag)
                    <a href="{{ route('artefacts.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                @endforeach
            </p>
			
		</div>
	</div>
</div>
@endsection