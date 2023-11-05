@props(['name'])
<label class="block mb-2 font-bold uppercase text-xs text-gray-700" for={{$name}}>
    {{ucwords($name)}}
</label>
