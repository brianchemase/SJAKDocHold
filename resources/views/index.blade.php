<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Files</title>
</head>
<body>
    <h1>Uploaded Files</h1>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <a href="/upload">Upload a New File</a>
    <ul>
        @foreach($files as $file)
            <li>
                <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">View PDF</a> - {{ $file->caption }}
            </li>
        @endforeach
    </ul>
</body>
</html>
