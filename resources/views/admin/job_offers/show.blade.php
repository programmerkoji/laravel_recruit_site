<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            企業詳細
        </h2>
    </x-slot>

    <div class="container my-10 mx-auto flex flex-col w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
        <ul class="w-full divide divide-y">
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">求人名</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->title }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">掲載企業名</dt>
                    <dd class="flex-auto">〒{{ $jobOfferInfo->company->name }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">電話番号</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->tel }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">メールアドレス</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->email }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">掲載状況</dt>
                @if ($jobOfferInfo->is_publish)
                    <dd class="flex-auto">掲載中</dd>
                @else
                    <dd class="flex-auto">非掲載</dd>
                @endif
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">代表者名</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->ceo_name }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">担当者名</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->stuff_name }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">設立</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->foundation }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">資本金</dt>
                    <dd class="flex-auto">{{ number_format($jobOfferInfo->capital) }}円</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">従業員数</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->employee_number }}人</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">その他</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->note }}</dd>
                </dl>
            </li>
        </ul>
    </div>
    <div class="flex justify-center items-center gap-6 pb-10">
        <a href="{{ route('admin.companies.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">戻る</a>
        <a href="{{ route('admin.companies.edit', ['company' => $jobOfferInfo->id]) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">編集</a>
    </div>

</x-app-layout>
