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
                    <dd class="flex-auto">{{ $jobOfferInfo->company->name }}</dd>
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
                    <dt class="w-1/4 pl-1 font-bold">雇用形態</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->employment_status }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">給与</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->salary }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">勤務時間</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->job_time }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">仕事内容</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->job_content }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">待遇・福利厚生</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->welfare }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">休日・休暇</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->holiday }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">応募資格</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->qualification }}</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">募集人数</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->recruitment_count }}人</dd>
                </dl>
            </li>
            <li class="p-4">
                <dl class="flex items-center">
                    <dt class="w-1/4 pl-1 font-bold">その他・フリーテキスト</dt>
                    <dd class="flex-auto">{{ $jobOfferInfo->free_text }}</dd>
                </dl>
            </li>
        </ul>
    </div>
    <div class="flex justify-center items-center gap-6 pb-10">
        <a href="{{ route('admin.job_offers.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">戻る</a>
        <a href="{{ route('admin.job_offers.edit', ['job_offer' => $jobOfferInfo->id]) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">編集</a>
    </div>

</x-app-layout>
