<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <style>
        .post-card h3,
        .post-card h4,
        .post-card p {
            word-wrap: break-word;  /* Allows long words to break and wrap */
            white-space: normal;    /* Ensures normal wrapping behavior */
            overflow-wrap: break-word; /* Also helps with breaking long words */
            hyphens: auto;          /* Optional: adds hyphenation when breaking words */
        }
        .post-card h3, .post-card h4, .post-card p {
            margin: 10px 0;
            color: #2c3e50;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
            hyphens: auto;
        }


        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
            background-color:#333;
            
        }

        .nopost{
            text-align: center;
            align-items: center;
            justify-content: center;
            color: white;
            
            font-size: 1rem;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;    
            color: white;
        }

        .create-button {
            text-align: center;
            margin-bottom: 30px;
        }

        .create-button form button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0D8ABC;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .create-button form button:hover {
            background-color: #0a6f94;
        }

        .post-card {
            background-color:cornsilk;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .post-card img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .post-card h3, .post-card h4, .post-card p {
            margin: 10px 0;
            color: #2c3e50;
        }

        .action-links {
            margin-bottom: 15px;
        }

        .action-links a, .action-links form button {
            display: inline-block;
            padding: 6px 12px;
            margin-right: 8px;
            font-size: 14px;
            text-decoration: none;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .action-links a {
            background-color: #2ecc71;
        }

        .action-links a:hover {
            background-color: #27ae60;
        }

        .action-links form {
            display: inline-block;
        }

        .action-links form button {
            background-color: #e74c3c;
        }

        .action-links form button:hover {
            background-color: #c0392b;
        }

        .buttons {
            margin-top: 10px;
        }

        .buttons form {
            display: inline-block;
            margin-right: 10px;
        }

        .buttons button {
            padding: 6px 14px;
            font-size: 14px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .buttons button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>All Posts</h1>

    <div class="create-button">
        <form action="{{ route('posts.create') }}" method="GET">
            <button type="submit">Create Post</button>
        </form>
    </div>
    @if($posts->isNotEmpty())
    @foreach($posts as $post)
    <div class="post-card">
        <img src="{{ $post->profile }}" alt="profile">

        <div class="action-links">
            <a href="{{ route('posts.edit', $post) }}">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>

        <h3>Author: {{ $post->nameofauthor }}</h3>
        <h4>Title: {{ $post->title }}</h4>
        <p>Content: {{ $post->content }}</p>

        <div class="buttons">
            <form action="{{ route('posts.likepost', $post) }}" method="POST">
                @csrf
                <button type="submit">{{ $post->like ?? 0 }} 👍 Like</button>
            </form>
            <form action="#">
                <button type="submit">✍ Comment</button>
            </form>
        </div>
    </div>
    @endforeach
    @else
        <div class="nopost">
            <p>No available post</p>
        </div>
        
    @endif
</body>
</html>
