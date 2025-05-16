<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        form {
            background-color: #ffffff;
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #0D8ABC;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0a6f94;
        }

        .error-box {
            max-width: 500px;
            margin: 20px auto;
            background-color: #ffe6e6;
            border: 1px solid #ff4d4d;
            padding: 20px;
            border-radius: 8px;
        }

        .error-box h3 {
            color: #d8000c;
            margin-top: 0;
        }

        .error-box ul {
            margin: 10px 0 0;
            padding-left: 20px;
        }

        .error-box li {
            color: #a94442;
        }
    </style>
</head>
<body>

    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="profile">Profile URL:</label>
        <input type="text" name="profile" id="profile" value="{{ old('profile', $post->profile) }}">

        <label for="nameofauthor">Name of author:</label>
        <input type="text" name="nameofauthor" id="nameofauthor" value="{{ old('nameofauthor', $post->nameofauthor) }}">

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title ) }}">

        <label for="content">Content:</label>
        <textarea name="content" id="content">{{ old('content', $post->content ) }}</textarea>

        <button type="submit">Update post</button>
    </form>

    @if ($errors->any())
        <div class="error-box">
            <h3>Errors:</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>
