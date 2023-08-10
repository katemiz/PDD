<x-layout>
  
    <section class="section container">
        
      <x-title :params="$warning" />
      <x-notification type="{{$warning['type']}}" message="{{$warning['msg']}}" />
    
    </section>
</x-layout>
      