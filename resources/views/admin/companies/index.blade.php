<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            企業一覧
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8 max-w-6xl">
        <div class="py-8">
            <div class="pt-4 flex flex-wrap justify-between items-center gap-4">
                <a href="{{ route('admin.companies.create') }}" class="inline-block flex-shrink-0 px-8 py-2 text-base font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200">新規登録</a>

                <form method="GET" action="{{ route('admin.companies.index') }}" class="w-full md:w-1/3">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="search" name="keyword" id="default-search" value="@if(isset($keyword)){{ $keyword }}@endif" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="キーワードで検索">
                    </div>
                </form>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-x-auto">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal whitespace-nowrap">
                                    企業名
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal whitespace-nowrap">
                                    住所
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal whitespace-nowrap">
                                    担当者名
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal whitespace-nowrap"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm whitespace-nowrap">
                                    <div class="flex items-center">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $company->name }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm whitespace-nowrap">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $company->address }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm whitespace-nowrap">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $company->stuff_name }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('admin.companies.show', ['company' => $company->id]) }}" class="py-1 px-2 border border-indigo-600 rounded-full text-indigo-600 hover:text-indigo-900">詳細</a>
                                        <a href="{{ route('admin.companies.edit', ['company' => $company->id]) }}" class="py-1 px-2 border border-green-600 rounded-full text-green-600 hover:text-green-900">編集</a>
                                        <form id="delete_{{ $company->id }}" action="{{ route('admin.companies.destroy', ['company' => $company->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="#" data-id="{{ $company->id }}" onclick="deletePost(this)" class="py-1 px-2 border border-red-600 rounded-full text-red-600 hover:text-red-900">削除</a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-5 bg-white py-5">
                        {{ $companies->links() }}
                    </div>
                </div>
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
