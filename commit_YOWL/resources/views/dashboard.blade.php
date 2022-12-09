@php
use App\Models\Post;
@endphp


<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl  text-white dark:text-gray-200 leading-tight ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-screen">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                 
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">Nom d'utilisateur: {{ Auth::user()->name }}</div>
                        <div class="font-medium text text-gray-800 ">Email: <span class="font-medium text text-gray-500 ">{{ Auth::user()->email }}</span></div>
                        <div class="font-medium text text-gray-500 mb-4">Nombre de commentaires actifs: <span class='text-cardinal font-medium text-xl'> {{ Auth::user()->comments->count()}}</span></div>
                        <div class="font-medium text text-gray-500 mb-4 flex">
                            <div class='h8 w-8 '> <span><svg class="w-8 h-8 stroke-blue-600 bg-zinc-100 rounded-full border border-gray-400 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" /></svg></span> </div>
                            <div class='ml-2 mt-1'><span id='likes' class='text-cardinal font-medium text-xl'></span></div>
                        </div>
                        <?php $comments=Auth::user()->comments;$total_likes=0; ?>
                        <div>
                            @foreach ($comments as $value)
                            <?php 
                            $content=$value->content;
                            $post_id=$value->post_id;
                            $comment_likes=$value->likes_count;
                            $comment_alerts=$value->alerts_comment_count;
                            $created_at=$value->created_at;
                            $post_title=$value->post;
                            $total_likes+=(int)$comment_likes;
                            ?>
    
                            <div class="bg-slate-100 pl-4 rounded mb-2 border shadow-sm">
                                <div  class='h-8 w-8  flex justify-items-center'>
                                    <div class='h-8 w-8 mt-2 flex' >
                                        <svg class="w-6 h-6 stroke-amber-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                                    </div>
                                    <div class='mt-2 flex ml-4 '>
                                        <p class='text-center text-xl font-medium'>Commentaire</p>
                                    </div>
                                </div>
                                <div class='mt-4'>
                                    <p>Crée le: {{$created_at}}</p>
                                </div>
                                <p class="font-medium mt-2 mb-2">Contenu</p>
                                <div class="border border-gray-500 rounded-sm mr-4 mb-2">
                                <p class="bg-slate-200 pl-2 ">{{$content}}</p>
                                </div>
                                <p class='font-medium'>Likes: <span>{{$comment_likes}}</span> </p>
                                <p class='pb-2 font-medium'>Alertes: <span>{{$comment_alerts}}</span></p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>

    let span=document.getElementById('likes');
    span.innerHTML={{$total_likes}};
</script>