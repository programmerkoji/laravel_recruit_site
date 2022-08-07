<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            画像一覧
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8 max-w-6xl">
        <div class="py-8">
            <div class="pt-4">
                <a href="{{ route('admin.images.create') }}" class="inline-block flex-shrink-0 px-8 py-2 text-base font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200">新規登録</a>
            </div>
            <div class="py-8">
                <ul class="flex lg:flex-row flex-col flex-wrap">
                    @foreach ($images as $image)
                    <li class="w-full lg:w-1/3 p-2">
                        <div class="p-4 bg-white rounded shadow">
                            <figure class="mb-3">
                                <img src="{{ asset('storage/' . $image->file_name)  }}" alt="" class="mb-1">
                            </figure>
                            <p class="mb-1"><span class="font-bold">画像名：</span>{{ $image->title }}</p>
                            <p class="mb-4"><span class="font-bold">企業名：</span>{{  $image->company->name }}</p>
                            <div class="flex items-center justify-center gap-4">
                                <a href="" class="py-1 px-4 border border-green-600 rounded-full text-green-600 hover:text-green-900">編集</a>
                                <a href="" class="py-1 px-4 border border-red-600 rounded-full text-red-600 hover:text-red-900">削除</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
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
