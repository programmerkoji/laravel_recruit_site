<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            画像一覧
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8 max-w-6xl">
        <div class="py-8">
            <div class="pt-4 flex flex-wrap justify-between items-center gap-4">
                <a href="{{ route('admin.images.create') }}" class="inline-block flex-shrink-0 px-8 py-2 text-base font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200">新規登録</a>

                <form method="GET" action="{{ route('admin.images.index') }}" class="w-full md:w-1/3">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="search" name="keyword" id="default-search" value="@if(isset($keyword)){{ $keyword }}@endif" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="キーワードで検索">
                    </div>
                </form>
            </div>
            <div class="py-8">
                <ul class="flex lg:flex-row flex-col flex-wrap">
                    @foreach ($images as $image)
                    <li class="w-full lg:w-1/3 p-2">
                        <div class="w-full h-full p-4 bg-white rounded shadow">
                            <figure class="mb-3">
                                <img src="{{ asset('storage/' . $image->file_name)  }}" alt="">
                            </figure>
                            <p class="mb-1"><span class="font-bold">画像名：</span>{{ $image->title }}</p>
                            <p class="mb-4"><span class="font-bold">企業名：</span>{{  $image->company->name }}</p>
                            <div class="flex items-center justify-center gap-4">
                                <a href="{{ route('admin.images.edit', ['image' => $image->id]) }}" class="py-1 px-4 border border-green-600 rounded-full text-green-600 hover:text-green-900">編集</a>
                                <form id="delete_{{ $image->id }}" action="{{ route('admin.images.destroy', ['image' => $image->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="#" data-id="{{ $image->id }}" onclick="deletePost(this)" class="py-1 px-4 border border-red-600 rounded-full text-red-600 hover:text-red-900">削除</a>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                {{ $images->links() }}
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            console.log(e);
            'use strict';
            if (confirm('本当に削除してもよいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
    @if (session('message'))
    <script>
        $(function() {
            toastr.success('{{ session("message") }}')
        });
    </script>
    @endif
</x-app-layout>
