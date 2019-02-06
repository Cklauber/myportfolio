<html>
    <head>
    <title>Create a Project </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
    
</head>
    <body>
        
        <form class="container" action="{{route('project.store')}}" method="post">
        @csrf

        <h1> Create a Project</h1>


            <div class="field">
            
                <label for="title" class="label">Title</label>
                
                <div class="control">
                
                    <input class="input" name="title" type="text" placeholder="Title">
                
                </div>
            
            </div>

            <div class="field">
            
                <label for="slug" class="label">Slug</label>
            
                <div class="control">
            
                    <input class="input" name="slug" type="text" placeholder="Slug">
            
                </div>
            
            </div>
            


            <div class="field">
            
                <label for="description" class="label">Description</label>
            
                <div class="control">
            
                    <textarea name="description" class="textarea"></textarea>
            
                </div>
            
            </div>
            
            <div class="field">

                <div class="control">

                      <button type="submit" class="button is-link">Create Project</button>

                </div>

            </div>


        

        </form>
    </body>
</html>