<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            企業情報編集
        </h2>
    </x-slot>

    <div class="container my-10 mx-auto flex flex-col w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
        <form action="{{ route('admin.companies.update', ['company' => $companyInfo->id]) }}" method="post" class="w-full divide divide-y">
            @csrf
            @method('PUT')
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">会社名</span>
                    <span class="flex-auto">
                        <input type="text" name="name" value="{{ $companyInfo->name }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('name')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">郵便番号</span>
                    <span class="flex-auto">
                        <input type="text" name="post_code" value="{{ $companyInfo->post_code }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('post_code')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">住所</span>
                    <span class="flex-auto">
                        <input type="text" name="address" value="{{ $companyInfo->address }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('address')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">電話番号</span>
                    <span class="flex-auto">
                        <input type="text" name="tel" value="{{ $companyInfo->tel }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('tel')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">メールアドレス</span>
                    <span class="flex-auto">
                        <input type="text" name="email" value="{{ $companyInfo->email }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('email')
                        <span class="text-rose-700 mt-2">{{ $message }}</span>
                        @enderror
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">代表者名</span>
                    <span class="flex-auto">
                        <input type="text" name="ceo_name" value="{{ $companyInfo->ceo_name }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">担当者名</span>
                    <span class="flex-auto">
                        <input type="text" name="stuff_name" value="{{ $companyInfo->stuff_name }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">設立</span>
                    <span class="flex-auto">
                        <input type="text" name="foundation" value="{{ $companyInfo->foundation }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">資本金</span>
                    <span class="flex-auto">
                        <input type="text" name="capital" value="{{ $companyInfo->capital }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <p class="mt-2">※数字のみ</p>
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">従業員数</span>
                    <span class="flex-auto">
                        <input type="text" name="employee_number" value="{{ $companyInfo->employee_number }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <p class="mt-2">※数字のみ</p>
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">その他</span>
                    <span class="flex-auto">
                        <textarea name="note" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $companyInfo->note }}</textarea>
                    </span>
                </label>
            </div>
            <div class="flex justify-center items-center gap-6 py-10">
                <a href="{{ route('admin.companies.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">戻る</a>
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">更新</button>
            </div>
        </form>
    </div>

</x-app-layout>
