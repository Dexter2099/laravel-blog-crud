<!-- resources/views/posts/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">✏️ Edit Post</h1>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary mb-3">← Back</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Fix the issues below:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($post->image_path)
                <img src="{{ asset('storage/'.$post->image_path) }}" class="img-thumbnail mt-2" width="200" alt="Current image">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">💾 Update Post</button>
    </form>
</div>
</body>
</html>
