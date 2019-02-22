@csrf
<div class="text-left m-4">

    <label class="mb-2 block" for="title">Title<font class="text-red">*</font> </label>

    <div class="control">

        <input 
            class="input text-2x1 px-3 py-2 border rounded {{ $errors->has('title') ? 'border-red' : 'border-grey-dark' }} h-12 w-64 w-full" 
            name="title" 
            type="text" 
            placeholder="Your awesome project"
            value="{{$project->title}}">

        @if ($errors->has('title'))
        <p class="text-red mt-1"> {{$errors->first('title')}}</p>
        @endif
    </div>

</div>

<div class="text-left m-4">

    <label class="mb-2 block" for="slug">Slug</label>

    <div class="control">

        <input 
            class="input text-2x1 px-3 py-2 border rounded border-grey-dark h-12 w-64 w-full" 
            name="slug" 
            type="text" 
            placeholder="your-awesome-project"
            value="{{$project->slug}}">

    </div>

</div>

<div class="text-left m-4">

    <label class="mb-2 block" for="is_public">Type of Project<font class="text-red">*</font></label>

    <div class="control">

        <input 
            type="radio" 
            class="mr-1"
            name="is_public"
            value="1" 
            {{$project->is_public || null === $project->is_public  ? 'checked' : ''}}>Public <br>
        <input 
            type="radio" 
            class="mr-1" 
            name="is_public" 
            value="0" 
            {{null !== $project->is_public && !$project->is_public ? 'checked' : '' }}>Private

    </div>

</div>

<div class="text-left m-4">

    <label class="mb-2 block" for="repository">Repository</label>

    <div class="control">

        <input 
            class="input text-2x1 px-3 py-2 border rounded border-grey-dark h-12 w-64 w-full" 
            name="repository" 
            type="text" 
            placeholder="github.com/awesomeProject"
            value="{{$project->repository}}">

    </div>

</div>

<div class="text-left m-4">

    <label class="mb-2 block" for="is_public_repository">Type of repository<font class="text-red">*</font></label>

    <div class="control">

        <input 
            type="radio" class="mr-1" 
            name="is_public_repository" 
            value="1"
            checked="checked"
            {{$project->is_public_repository || null === $project->is_public_repository  ? 'checked' : '' }}>Public <br>
        <input 
            type="radio" 
            class="mr-1" 
            name="is_public_repository" 
            value="0"
            {{null !== $project->is_public_repository && !$project->is_public_repository ? 'checked' : '' }}>Private
    </div>

</div>


<div class="text-left m-4">

    <label for="slug" class="mb-2 block" for="description">Description<font class="text-red">*</font></label>

    <div class="control">

        <textarea 
            name="description" 
            class="textarea text-2x1 px-3 py-2 border rounded {{$errors->has('description') ? 'border-red' : 'border-grey-dark'}} h-12 w-64 w-full" 
            placeholder="This is gonna be the most famous app ever!"
            required>{{$project->description}}</textarea>
            @if ($errors->has('description'))
            <p class="text-red mt-1"> {{$errors->first('description')}}</p>
            @endif

    </div>

</div>

<div class="field">

    <div class="control">

        <button type="submit" class="btn btn-green mx-6">{{$buttonName}}</button>

        <a href="{{url()->previous()}}" class="btn btn-red mx-6">Cancel</a>
    </div>

</div>