let fnamesToUpload = []


function deleteAttachConfirm(model,modelId,id) {

    let redirect = '/attach-delete/'+model+'/'+modelId+'/'+id

    Swal.fire({
        title: "Do you want to delete this attachment/file from database?",
        text: "When done, it is not possible to revert back.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Ooops ...',

    }).then((result) => {

        if (result.isConfirmed) {
            window.location.href = redirect
        } else {
            return false
        }
    })
}







function cancelFile(key,fname) {

    let varid = 'f'+key

    document.getElementById(varid).remove()
    fnamesToUpload = fnamesToUpload.filter(name => name != fname);
    document.getElementById('filesToUpload').value = JSON.stringify(fnamesToUpload)

    checkFilesNo()
    return true
}


function getNames() {

    var newFiles = document.getElementById('fupload')

    let filesListDiv = document.getElementById('files_div')
    let outerDiv,cancelBtn,nameLabel

    fnamesToUpload = []

    for (const [key, dosya] of Object.entries(newFiles.files)) {

        // <div class="tags has-addons">
        //     <a class="tag is-danger is-light is-delete"></a>
        //     <span class="tag is-black is-light">Alex Smith</span>
        // </div>

        outerDiv = document.createElement('div')
        outerDiv.id = 'f'+key
        outerDiv.classList.add('tags','has-addons','my-0','py-0')

        cancelBtn = document.createElement('a')
        cancelBtn.classList.add('tag','is-danger','is-light','is-delete')
        cancelBtn.addEventListener("click", function() {
            cancelFile(key,dosya.name)}
        ); 

        nameLabel = document.createElement('span')
        nameLabel.classList.add('tag','is-black','is-light')
        nameLabel.innerHTML = dosya.name

        outerDiv.append(cancelBtn)
        outerDiv.append(nameLabel)

        filesListDiv.append(outerDiv)
        fnamesToUpload.push(dosya.name)
    }

    document.getElementById('filesToUpload').value = JSON.stringify(fnamesToUpload)
    checkFilesNo()
}



function checkFilesNo() {

    let files = JSON.parse(document.getElementById('filesToUpload').value);

    if (files.length > 0) {
        document.getElementById('list_header').innerHTML = 'New Files to Upload'
        document.getElementById('uploadButton').classList.remove('is-hidden')
    } else {
        document.getElementById('list_header').innerHTML = 'No files to upload yet!'
        document.getElementById('uploadButton').classList.add('is-hidden')
    }
}
