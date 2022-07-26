<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規登録（求人）
        </h2>
    </x-slot>

    <div class="container my-10 mx-auto flex flex-col w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
        <form action="{{ route('admin.job_offers.store') }}" method="post" class="w-full divide divide-y">
            @csrf
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">掲載開始日</span>
                    <span class="flex-auto">
                        <input type="text" name="posting_start" id="publish_date" value="{{ old('posting_start') }}" class="md:w-1/3 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('posting_start')
                        <span class="block text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">掲載終了日</span>
                    <span class="flex-auto">
                        <input type="text" name="posting_end" id="publish_date" value="{{ old('posting_end') }}" class="md:w-1/3 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('posting_end')
                        <span class="block text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <div class="flex items-center">
                    <p class="w-1/4 pl-1 font-bold">掲載企業</p>
                    <div class="flex-auto">
                        <select name="company_id" class="bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 pl-3 pr-8 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">選択してください</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @if($company->id == old('company_id')) selected @endif>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                        <span class="text-rose-700 mt-2 block w-full">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="p-4">
                <div class="flex items-center">
                    <p class="w-1/4 pl-1 font-bold">職種</p>
                    <div class="flex-auto">
                        <select name="job_category_id" class="bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 pl-3 pr-8 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">選択してください</option>
                            @foreach ($jobCategories as $jobCategory)
                                <option value="{{ $jobCategory->id }}" @if($jobCategory->id == old('job_category_id')) selected @endif>{{ $jobCategory->category_name }}</option>
                            @endforeach
                        </select>
                        @error('job_category_id')
                        <span class="text-rose-700 mt-2 block w-full">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="p-4">
                <div class="flex items-center">
                    <p class="w-1/4 pl-1 font-bold">エリア</p>
                    <div class="flex-auto">
                        <select name="job_area_id" class="bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 pl-3 pr-8 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">選択してください</option>
                            @foreach ($jobAreas as $jobArea)
                                <option value="{{ $jobArea->id }}" @if($jobArea->id == old('job_area_id')) selected @endif>{{ $jobArea->area_name }}</option>
                            @endforeach
                        </select>
                        @error('job_area_id')
                        <span class="text-rose-700 mt-2 block w-full">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">求人名</span>
                    <span class="flex-auto">
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('title')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">雇用形態</span>
                    <span class="flex-auto">
                        <input type="text" name="employment_status" value="{{ old('employment_status') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                        <input type="text" name="salary" value="{{ old('salary') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                        <input type="text" name="job_time" value="{{ old('job_time') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                        <textarea name="job_content" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('job_content') }}</textarea>
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
                        <input type="text" name="welfare" value="{{ old('welfare') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                        <input type="text" name="holiday" value="{{ old('holiday') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                        <input type="text" name="qualification" value="{{ old('qualification') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">募集人数</span>
                    <span class="flex-auto">
                        <input type="text" name="recruitment_count" value="{{ old('recruitment_count') }}" class="w-1/2 mr-2 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">人
                        <span class="mt-2">※数字のみ</span>
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">その他・フリーテキスト</span>
                    <span class="flex-auto">
                        <textarea name="free_text" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('free_text') }}</textarea>
                    </span>
                </label>
            </div>
            <div class="flex justify-center items-center gap-6 py-10">
                <a href="{{ route('admin.job_offers.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">戻る</a>
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">登録</button>
            </div>
        </form>
    </div>

    <script src="{{ mix('js/flatpickr.js') }}"></script>
</x-app-layout>
