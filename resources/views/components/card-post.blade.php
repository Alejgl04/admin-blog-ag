@props(['post'])
<article class="mb-4 mt-2 bg-white shadow-lg rounded-lg overflow-hidden">

    @if ( $post->image )
        <img class="w-full object-cover object-center" src="{{ Storage::url( $post->image->url ) }}" alt="{{ $post->name }}" style="height: 30rem;">
    @else
        <img class="w-full object-cover object-center" src="/images/landspace.jpg" alt="landspace" style="height: 30rem;">
    @endif

    <div class="px-6 py-8">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post)}}">{{ $post->name }}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {!!$post->extract!!}
        </div>
    </div>
    <div class="px-6 pb-2">
        @foreach ($post->tags as $tag)
            <a  href="{{ route('posts.tag', $tag)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2 mb-2">{{ $tag->name }}</a>
        @endforeach
    </div>
</article>
