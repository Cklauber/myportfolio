<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pages</title>
</head>
<body>
    <h1>You can see your pages here</h1>
    <div>
        @forelse ($pages as $page)
            <div>
                <h3>{{$page->title}}</h3>
            </div>
        @empty
            <div>No pages yet.</div>
        @endforelse 
    </div>
</body>
</html>