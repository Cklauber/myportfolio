<html>
    <head>
        <title>Projects</title>
    </head>
    <body>
        <h1>Portfolio</h1>
        <div>
            <ul>
                @forelse ($projects as $project)
                    <li>
                        <h4>{{$project->title}}</h4>
                        <a href="{{ $project->privatePath()}}">Private</a>
                        <a href="{{ $project->publicPath()}}">Public</a>
                    </li>
                @empty
                    <li>No projects yet</li>
                @endforelse
            </ul>
        </div>
    </body>
</html>