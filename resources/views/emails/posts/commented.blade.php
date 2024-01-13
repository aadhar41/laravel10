{{-- resources/views/emails/welcome.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your App</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 2px;
            overflow: hidden;
        }

        .header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .content {
            padding: 20px;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Your App</h1>
        </div>
        <div class="content">
            <p>Hi {{ $comment->commentable->user->name }},</p>
            <p>Thank you for joining our community. We're excited to have you on board!</p>
            <p>
                {{ $comment->commentable->title }}
                <br />
                <a href="{{ route('posts.show', ['post' => $comment->commentable->id]) }}" class="button">
                    View Post
                </a>
            </p>
            <p>
                <a href="{{ route('users.show', ['user' => $comment->user->id]) }}">
                    {{ $comment->user->name }}
                </a> said :
            </p>
            <p>"{{ $comment->content }}"</p>

            Best Regards,<br />
            {{ config('app.name') }}

        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}
        </div>
    </div>
</body>

</html>
