@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">

                    @csrf
                    <div class="mb-4">
                        <label for="email" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" placeholder="Post something..." class="bg-gray-200 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"></textarea>
                        
                        @error('body')
                            <div class="mt-2 text-red-500 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Post</button>
                    </div>

                </form>
            @endauth
            
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                {{ $posts->links() }}
            @else
                <p class="text-center">No posts yet...</p>
            @endif
        </div>
    </div>
@endsection