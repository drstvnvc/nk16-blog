<div>
    <div>Number of requests: {{session('number_of_requests', 0)}}</div>
    <h4>The latest posts:</h4>

    @foreach($latestPosts as $post)
    <div>
        <a href="/posts/{{$post->id}}">{{$post->title}}</a>
    </div>
    @endforeach
</div>