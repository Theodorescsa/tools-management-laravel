<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools Management</title>
</head>
<body>
    <h1>Tools List</h1>
    
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($tools as $tool)
            <li><a href="{{ url('tools/' . $tool->id) }}">{{ $tool->name }}</a></li>
            @if($tool->tool_image)
                <img src="{{ asset('storage/' . $tool->tool_image) }}" alt="Tool Image" width="100">
            @else
                No image
            @endif
        @endforeach
    </ul>

    <a href="{{ route('tools.create') }}">Create New Tool</a>
</body>
</html>
