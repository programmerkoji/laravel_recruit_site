<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            企業一覧
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8 max-w-6xl">
        <div class="py-8">
            {{-- <div class="flex flex-row mb-1 sm:mb-0 justify-between items-center w-full">
                <h2 class="text-2xl leading-tight">
                    企業一覧
                </h2>
                <div class="text-end">
                    <form class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                        <div class=" relative ">
                            <input type="text" id="&quot;form-subscribe-Filter" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="name"/>
                        </div>
                        <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-indigo-200" type="submit">
                            Filter
                        </button>
                    </form>
                </div>
            </div> --}}

            <div class="pt-4">
                <a href="{{ route('admin.companies.create') }}" class="inline-block flex-shrink-0 px-8 py-2 text-base font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200">新規登録</a>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal">
                                    企業名
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal">
                                    住所
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal">
                                    担当者名
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $company->name }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $company->address }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $company->stuff_name }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
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
                        {{ $companies->links(   ) }}
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
