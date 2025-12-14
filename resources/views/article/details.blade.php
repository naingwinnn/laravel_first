<!DOCTYPE html>
<html>
<head>
    <title>{{ $post['heading'] }}</title>
</head>
<body>

    <article>

        <header>
            <h1>{{ $post['heading'] }}</h1>

            <p>
                <small>
                    Written for Laravel learners · Article ID: {{ $post['articleId'] }}
                </small>
            </p>
        </header>

        <hr>

        <section>
            <p>
                {{ $post['body'] }}
            </p>

            <p>
                This blog post is written to help beginners understand Laravel concepts
                in a simple and readable way.
            </p>
        </section>

        <hr>

        <footer>
            <a href="{{ route('article.list') }}">← Back to Blog</a>
        </footer>

    </article>

</body>
</html>