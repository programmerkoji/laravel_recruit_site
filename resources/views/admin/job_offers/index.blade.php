<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            求人一覧
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8 max-w-6xl">
        <div class="py-8">

            <div class="pt-4">
                <a href="{{ route('admin.job_offers.create') }}" class="inline-block flex-shrink-0 px-8 py-2 text-base font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200">新規登録</a>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal">
                                    求人名
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal">
                                    掲載企業名
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal">
                                    掲載状況
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm font-normal"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($job_offers as $job_offer)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $job_offer->title }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $job_offer->company->name }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if ($job_offer->is_publish)
                                        <p class="inline-block py-1 px-2 border border-green-600 rounded-full text-green-600">掲載中</p>
                                    @else
                                        <p class="inline-block py-1 px-2 border border-red-600 rounded-full text-red-600">非掲載</p>
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('admin.job_offers.show', $job_offer) }}" class="py-1 px-2 border border-indigo-600 rounded-full text-indigo-600 hover:text-indigo-900">詳細</a>
                                        <a href="" class="py-1 px-2 border border-green-600 rounded-full text-green-600 hover:text-green-900">編集</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="px-5 bg-white py-5">
                        {{ $job_offers->links() }}
                    </div> --}}
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
