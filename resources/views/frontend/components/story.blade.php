<div class="space-y-5 flex-shrink-0 lg:w-7/12">
    <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0" id="postArea">
        <div class="grid p-4">
            <form id="postForm" method="post">
                <div class="col-span-2">
                    <label for="about">Write Your Feed Here</label>
                    <textarea id="about" name="post"  class="resize-none border rounded-md"></textarea>
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
