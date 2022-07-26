<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            企業情報編集
        </h2>
    </x-slot>

    <div class="container my-10 mx-auto flex flex-col w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
        <form action="{{ route('admin.job_offers.update', ['job_offer' => $jobOfferInfo->id]) }}" method="post" class="w-full divide divide-y">
            @csrf
            @method('PUT')
            <div class="p-4">
                <div class="flex items-center">
                    <p class="w-1/4 pl-1 font-bold">掲載企業名</p>
                    <p class="flex-auto">{{ $jobOfferInfo->company->name }}</p>
                </div>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">求人名</span>
                    <span class="flex-auto">
                        <input type="text" name="title" value="{{ $jobOfferInfo->title }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('title')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">掲載開始日</span>
                    <span class="flex-auto">
                        <input type="text" name="posting_start" id="publish_date" value="{{ $jobOfferInfo->posting_start->format('Y/m/d') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('posting_start')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">掲載終了日</span>
                    <span class="flex-auto">
                        <input type="text" name="posting_end" id="publish_date" value="{{ $jobOfferInfo->posting_end->format('Y/m/d') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('posting_end')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <div class="flex items-center">
                    <p class="w-1/4 pl-1 font-bold">職種</p>
                    <div class="flex-auto">
                        <select name="job_category_id" class="bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 pl-3 pr-8 leading-8 transition-colors duration-200 ease-in-out">
                            @foreach ($jobCategories as $jobCategory)
                                <option value="{{ $jobCategory->id }}" @if ($jobOfferInfo->job_category_id === $jobCategory->id) { selected } @endif>
                                    {{ $jobCategory->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <div class="flex items-center">
                    <p class="w-1/4 pl-1 font-bold">エリア</p>
                    <div class="flex-auto">
                        <select name="job_area_id" class="bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 pl-3 pr-8 leading-8 transition-colors duration-200 ease-in-out">
                            @foreach ($jobAreas as $jobArea)
                                <option value="{{ $jobArea->id }}" @if ($jobOfferInfo->job_area_id === $jobArea->id) { selected } @endif>
                                    {{ $jobArea->area_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">雇用形態</span>
                    <span class="flex-auto">
                        <input type="text" name="employment_status" value="{{ $jobOfferInfo->employment_status }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('employment_status')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">給料</span>
                    <span class="flex-auto">
                        <input type="text" name="salary" value="{{ $jobOfferInfo->salary }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('salary')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">勤務時間</span>
                    <span class="flex-auto">
                        <input type="text" name="job_time" value="{{ $jobOfferInfo->job_time }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('job_time')
                            <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">仕事内容</span>
                    <span class="flex-auto">
                        <textarea name="job_content" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $jobOfferInfo->job_content }}</textarea>
                        @error('job_content')
                            <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">待遇・福利厚生</span>
                    <span class="flex-auto">
                        <input type="text" name="welfare" value="{{ $jobOfferInfo->welfare }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('welfare')
                            <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">休日・休暇</span>
                    <span class="flex-auto">
                        <input type="text" name="holiday" value="{{ $jobOfferInfo->holiday }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('holiday')
                            <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">応募資格</span>
                    <span class="flex-auto">
                        <input type="text" name="qualification" value="{{ $jobOfferInfo->qualification }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">募集人数</span>
                    <span class="flex-auto">
                        <input type="text" name="recruitment_count" value="{{ $jobOfferInfo->recruitment_count }}" class="w-1/2 mr-2 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">人
                        <p class="mt-2">※数字のみ</p>
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">その他・フリーテキスト</span>
                    <span class="flex-auto">
                        <textarea name="free_text" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $jobOfferInfo->free_text }}</textarea>
                    </span>
                </label>
            </div>
            <div class="flex justify-center items-center gap-6 py-10">
                <a href="{{ route('admin.companies.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">戻る</a>
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">更新</button>
            </div>
        </form>
    </div>

    <script src="{{ mix('js/flatpickr.js') }}"></script>
</x-app-layout>
