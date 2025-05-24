<!-- resources/views/posts/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>View Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">🧾 Post Details</h1>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary mb-3">← Back</a>

    <div class="card">
        <div class="card-header">
            <h3>{{ $post->title }}</h3>
        </div>
        <div class="card-body">
            <p>{{ $post->content }}</p>
        </div>
        <div class="card-footer text-muted">
            Created: {{ $post->created_at->format('M d, Y H:i') }}<br>
            Last updated: {{ $post->updated_at->format('M d, Y H:i') }}
        </div>
    </div>
</div>
</body>
</html>
