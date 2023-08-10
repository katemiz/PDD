
<div class="column">

    <script src="{{ asset('/js/attachment.js') }}"></script>

    <div class="columns">

        <div class="column is-half">

            <strong class="mt-6">Attachments</strong><br>

            @if (count($item->attachments) > 0)
            <table class="table is-fullwidth">

                @foreach ($item->attachments as $attachment)
                <tr>
                    <td>
                        <a href="/attach-view/{{ $attachment->id }}">{{ $attachment->original_file_name }}</a>
                    </td>
                    <td>{{ $attachment->file_size }}</td>
                    <td>
                        <a href="javascript:deleteAttachConfirm('{{$model}}','{{$item->id}}','{{$attachment->id}}')">
                            <span class="icon has-text-danger"><x-carbon-trash-can /></span>
                        </a>
                    </td>
                </tr>
                @endforeach

            </table>
            @endif

        </div>

        <div class="column is-half">

            @role(config('requirements.roles.w'))

            <form action="/upload-attach/{{$model}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                @csrf
        
                <input type="hidden" id="filesToUpload" name="filesToUpload" value="0" autocomplete="off">
                <input type="hidden" id="route_redirect" name="route_redirect" value="{{$redirect}}" autocomplete="off">
        
                <div class="columns">

                    <div class="column is-narrow">
                        <label class="file-label" id="fileLabelEl">
                            <input
                                class="file-input"
                                type="file"
                                name="dosyalar[]"
                                id="fupload"
                                multiple
                                onchange="getNames()" />
                            <span class="file-cta">
                                <span class="file-icon"><x-carbon-document-multiple-02 /></span>
                                <span class="file-label has-text-centered">Files</span>
                            </span>
                        </label>
                    </div>

                    <div class="column">
                        <span class="block" id="list_header">No files to upload yet!</span>
                        <div id="files_div" class="py-0"></div>

                        <button class="button is-link is-fullwidth is-hidden" id="uploadButton">
                            <span class="icon"><x-carbon-upload /></span>
                            <span>Upload</span>
                        </button>
                    </div>

                </div>          
        
                @error('dosyalar') <span class="error">{{ $message }}</span> @enderror       
        
            </form>

            @endrole

        </div>
    </div>

</div>

