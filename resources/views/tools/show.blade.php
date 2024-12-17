<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tool->name }}</title>
</head>
<body>
    <h1>{{ $tool->name }}</h1>
    <p>{{ $tool->project_name }}</p>
    <p>{{ $tool->url }}</p>
    <p>{{ $tool->params }}</p>
    <p>{{ $tool->description }}</p>

    
    <a href="{{ url('tools') }}">Back to Tools List</a>
</body>
</html>
