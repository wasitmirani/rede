@extends('layouts.frontend.messengermaster')
@section('content')

<div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">
    <div class="space-y-5 flex-shrink-0 lg:w-10/12">
        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0" id="postArea">
            <div class="grid p-4">
                <form  method="post" action="{{ route('group.story') }}">
                    @csrf
                    <div class="col-span-2">
                        <label for="about">Update Group Story.....</label>
                        <textarea id="about" name="description"  class="resize-none border rounded-md"></textarea>
                    </div>
                    <div>
                         <input type="hidden" value="{{ $group->id }}" name="id">
                    </div>
                    <div class="col-span-2 m-4	">
                        <div class="grid grid-cols-3 gap-4">
                            <button type="submit" class="bg-blue-500 flex font-bold hidden hover:bg--600 hover:text-white inline-block items-center lg:block max-h-10 mr-4 px-4 py-2 rounded shado text-white" aria-expanded="false" id="uploadBtn">Update Story</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0" id="postArea">
            <div class="grid p-4">
                <p>Share Feed</p>
                <form id="postForm" action="" method="post">
                    <div class="col-span-2">
                        <label for="about">Feed Status</label>
                        <select name="status">
                            <option value="public">Public</option>
                            <option value="private">Only Crew</option>
                        </select>
                    </div>
                    <div class="col-span-2 mcgufin">
                        <p>Tag An Interest</p>
                        <select id="interest" name="interest[]" class="js-example-basic-multiple" multiple="multiple">
                            <option>Select Mcguffin</option>
                            @foreach ($interests  as $mcguffin)
                               <option value="{{ $mcguffin->id }}">{{ $mcguffin->interest }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="about">Write Feed Here</label>
                        <textarea id="about" id="post" name="post"  class="resize-none border rounded-md"></textarea>
                        <img id="blah"  style="width:548px;"  />
                    </div>

                    <div class="col-span-2 m-4	">
                        <div class="grid grid-cols-3 gap-4">
                        <button type="submit" class="bg-blue-500 flex font-bold hidden hover:bg--600 hover:text-white inline-block items-center lg:block max-h-10 mr-4 px-4 py-2 rounded shado text-white" aria-expanded="false" id="uploadBtn">Post</button>
                        <input type="file"  id="chekcbox1" name="image">
                        </div>
                    </div>

                </form>
            </div>
    </div>
    </div>
    </div>

</div>

@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $('.js-example-basic-multiple').select2();

    chekcbox1.onchange = evt => {
       const [file] = chekcbox1.files
       if (file) {

    // blah.src = URL.createObjectURL(file)
        blah.src = URL.createObjectURL(event.target.files[0]);

  }
}
});

</script>
@endsection
