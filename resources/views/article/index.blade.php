<!DOCTYPE html>
<html>
<head>
    <title>Blog Articles</title>
</head>
<body>

    <h1>Laravel Blog</h1>
    <p>Simple articles for learning Laravel</p>

    <hr>

    <ul>
        @foreach($postList as $post)
            <li>
                <a href="/article/read/{{ $post['articleId'] }}">
                    {{ $post['heading'] }}
                </a>
            </li>
        @endforeach
    </ul>

</body>
</html>
