<x-tenant-user-layout>
    <div class="container mt-4">
        <div class="fixed-width">
            @forelse($posts as $post)
                <div class="tweet-card">
                    <div class="d-flex align-items-start p-3">
                        <img src="" alt="John Doe">
                        <div class="ml-3">
                            <h5 class="m-0">
                                <a href="{{ route('tenant.posts.show', ['post' => $post->slug]) }}">{{ $post->user->name }}</a>
                            </h5>
                            <small class="text-muted">{{ $post->user->email }} ·
                                {{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="tweet-content">
                        <p>{{ $post->body }}</p>
                    </div>
                    <div class="tweet-footer text-muted">
                        <span class="footer-icon">
                            <a href="{{ route('tenant.posts.like', ['post' => $post->slug]) }}" class="n">💬
                                {{ $post->comments()->get()->count() }}</a>
                        </span>
                        <span class="footer-icon">
                            <a href="{{ route('tenant.posts.comments', ['post' => $post->slug]) }}" class="n">❤️
                                {{ $post->likes()->get()->count() }}</a>
                        </span>
                    </div>
                </div>
            @empty
                <div class="tweet-card p-3">
                    <div class="container text-center py-5 px-2">
                        <h3>Posts Cannot Be Retrieved At The Moment</h3>
                        <small>Please Try Again Later</small>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-tenant-user-layout>