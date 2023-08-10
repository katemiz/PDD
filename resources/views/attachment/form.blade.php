
    <section class="section container">

        <script src="{{ asset('/js/attachment.js') }}"></script>


        <x-title :params="$headers" />



        <form action="/upload-attach/requirement/12" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" id="filesToUpload" value="0" autocomplete="off">
            <input type="hidden" id="filesToDelete" name="filesToDelete" value="" autocomplete="off">
            <input type="hidden" id="filesToExclude" name="filesToExclude" value="0" autocomplete="off">


            <input type="hidden" id="route_redirect" name="route_redirect" value="requirements/view/{{}}" autocomplete="off">



       
         

            <div class="columns">

                <div class="column is-2">
                    <div class="file is-boxed">
                        <label class="file-label">
                        <input
                            class="file-input"
                            type="file"
                            name="dosyalar[]"
                            id="fupload"
                            multiple
                            onchange="getNames()" />
                        <span class="file-cta">
                            <span class="file-icon">
                                <x-carbon-document-multiple-02 />
                            </span>
                            <span class="file-label">Files</span>
                        </span>
                        </label>
                    </div>
        
        
                </div>
        
                <div class="column">
                    <table class="table is-striped is-fullwidth" >
        
                        <caption id="non_selected">No selected files yet!</caption>
                        <tbody id="filesList">
                        </tbody>
        
        
                    </table>
                </div>
        
            </div>
        
            <div id="upButton" class="mt-2 is-hidden">
        
                <button type="submit" class="button has-background-black has-text-white is-fullwidth">
                    <span class="icon"><x-carbon-upload /></span>
                    <span>Upload</span>
                </button>
            </div>            
        
            @error('dosyalar') <span class="error">{{ $message }}</span> @enderror       
        
        
        </form>














    </section>
