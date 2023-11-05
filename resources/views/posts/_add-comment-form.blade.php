@auth
    <x-panel>
        <form method="POST" action="/posts/{{$post->slug}}/comments" >

            @csrf

            <header class="flex items-center mb-5">
{{--                <img src="https://i.pravater.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-xl">--}}
                <img src="https://i.pravatar.cc/60?u=1" alt="" width="40" height="40" class="rounded-full">

                <h2 class="ml-3">Want to participate</h2>



            </header>

            <x-form.field >
                            <textarea name="body"
                                      class="w-full text-sm focus:outline-none focus:ring rounded p-3"
                                      placeholder="Quick, thing of something"
                                      required
                                      rows="5" ></textarea>
            </x-form.field>

            <div class="flex justify-end mt-6 pt-10 border-t border-gray-200 ">

               <x-form.button>Submit</x-form.button>
            </div>

           <x-form.error name="body"/>

        </form>
    </x-panel>
@else

    <p class="font-semibold">

        <a href="/login"class="hover:underline text-blue-400" > Login </a> or
        <a href="/register" class="hover:underline text-blue-400"> Register </a> to leave comment

    </p>


@endauth()
