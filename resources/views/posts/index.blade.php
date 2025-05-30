<!-- resources/views/posts/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laravel Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">📜 Blog Posts</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-link">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-link">Login</a>
            <a href="{{ route('register') }}" class="btn btn-link">Register</a>
        @endauth
    </div>

    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ New Post</a>
        @endif
    @endauth

    @if($posts->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th width="25%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 80) }}</td>
                    <td>
                        @if($post->image_path)
                            <img src="{{ asset('storage/'.$post->image_path) }}" width="100" class="img-thumbnail" alt="Post image">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">No posts available.</p>
    @endif
</div>
</body>
</html>
