<x-tenant-user-layout>
    <div class="fixed-width">
        <div class="tweet-card">
            <div class="d-flex align-items-start p-3">
                <img src="" alt="John Doe">
                <div class="ml-3">
                    <h5 class="m-0">{{ $post->user->name }}</h5>
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
        @foreach($post->comments as $comment)
                <div class="tweet-card">
                    <div class="d-flex align-items-start p-3">
                        <img src="{{ route('tenant.posts.comment.show', [
                'post' => $post->slug,
                'comment' => $comment->slug
            ]) }}" alt="John Doe">
                        <div class="ml-3">
                            <h5 class="m-0">{{ $comment->user->name }}</h5>
                            <small class="text-muted">{{ $comment->user->email }} ·
                                {{ $comment->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="tweet-content">
                        <p>{{ $comment->body }}</p>
                    </div>
                </div>
        @endforeach
    </div>
</x-tenant-user-layout>