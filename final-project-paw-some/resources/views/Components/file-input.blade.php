@props(['title'=>'Upload picture'])
@props(['multiple'=>false])
@props(['name'=>'picture'])

<div class="mt-4">
    <span class="block font-medium text-sm text-gray-700 ">{{$title}}</span>
    <input id="file" type="file" hidden name={{$name}} onchange="preview();" {{ $multiple ? 'multiple' : '' }} >

    <label for="file" class="cursor-pointer w-full" id="inputlabel" >
        <div class="w-full py-3">
            <div class="bg-gray-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg  ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                    <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                </svg>
            </div>
        </div>
    </label>

    <div style="justify-content: center;"  class="rounded-full flex justify-content-center align-items-center w-full overflow-hidden mt-4">
        <img src="" hidden alt="" id="frame" class="rounded-full  h-36 w-36 border-4 border-gray-200 bg-gray-100 object-cover" />
    </div>
</div>


<script type="text/javascript">
    function preview() {

        frame.src=URL.createObjectURL(event.target.files[0]);
        frame.hidden = false;
        inputlabel.hidden= true;

    }
</script>
