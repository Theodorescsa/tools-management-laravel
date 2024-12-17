<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tool</title>
</head>
<body>
    <h1>Create New Tool</h1>

    <!-- Kiểm tra thông báo lỗi và thành công -->
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tools.store') }}" method="POST" enctype="multipart/form-data">
        @csrf  <!-- CSRF token để bảo vệ khỏi tấn công CSRF -->
        <div>
            <label for="name">Project Name:</label>
            <input type="text" id="project_name" name="project_name" value="{{ old('project_name') }}" required>
        </div>
        <br>
        <div>
            <label for="name">Tool Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <br>
        <div>
            <label for="url">Tool Api Url:</label>
            <input type="text" id="url" name="url" value="{{ old('url') }}" required>
        </div>
        <br>
        <div>
            <label for="params">Api Params:</label>
            <input type="text" id="params" name="params" value="{{ old('params') }}" required>
        </div>
        <br>
        
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        </div>
        <br>
         <!-- Thêm trường Tool Image -->
         <div>
            <label for="tool_image">Tool Image:</label>
            <input type="file" id="tool_image" name="tool_image">
        </div>
        <br>
        <button type="submit">Create Tool</button>
    </form>

    <br>
    <a href="{{ route('tools.index') }}">Back to Tools List</a>
</body>
</html>
