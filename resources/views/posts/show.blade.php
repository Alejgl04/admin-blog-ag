<x-app-layout>
    <div class="mx-auto max-w-7xl py-8">
        <h1 class="text-4xl font-bold text-gray-500 xxs:m-4">
            {{ $post->name }}
        </h1>
        <div class="text-lg text-gray-500 mb-2">
            {{ $post->extract }}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                {{-- Contenido principal --}}
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{Storage::url( $post->image->url )}}" alt="{{ $post->name }}">
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {{ $post->body }}
                </div>
            </div>
            <aside>
                {{-- Contenido relacionado --}}
                <h1 class="text-2xl font-bold text-gray-600 mb-4">More in {{ $post->category->name }}</h1>
                <ul>
                    @foreach ($similars as $similar)
                        <li class="mb-4">
                            <a href="{{ route('posts.show', $similar)}}">
                                <img class="w-36 h-20" src="{{ storage::url( $similar->image->url )}}" alt="{{ $similar->name }}">
                                <span class="ml-1 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>

    </div>

</x-app-layout>
