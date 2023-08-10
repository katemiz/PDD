<div class="field">
    {{-- <input type="label" name="hidEl{{ $params['name']}}" id="hidElId{{ $params['name']}}" value="{{ $value }}">
  
    <label class="label">{{ $params['label'] }}</label>
    <div class="control">
      <textarea class="textarea" id="ck{{ $params['name']}}" placeholder="Textarea"></textarea>
    </div> --}}


    <div class="field">
      <label class="label">{{ $params['label'] }}</label>
      <div class="control">
      <textarea class="textarea ckeditor" id="{{ $params['name']}}" name="{{ $params['name']}}" placeholder="{{ $params['placeholder'] }}">{!! $value !!}</textarea>
      </div>
    </div>
  
  
    <script>
        ClassicEditor
          .create( document.querySelector('#{{ $params['name'] }}') )
          .then( editor => {
          // console.log(editor);
          // let icerik = document.getElementById('hidElId{{ $params['name']}}').value
      
          // if (icerik.length>0) {
          //   editor.setData(icerik)
          // }
      
          // editor.model.document.on('change:data', ( evt, data ) => {
          //   document.getElementById("hidElId{{ $params['name']}}").value = editor.getData()
          // });
        })
        .catch( error => {
          console.error(error);
        });
      </script>
  

    @error($params['name'])
    <div class="notification is-danger is-light is-size-7 p-1 mt-1">{{ $message }}</div>
    @enderror
  
  
  
  </div>
  