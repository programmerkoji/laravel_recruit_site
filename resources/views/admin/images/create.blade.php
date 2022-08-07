<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規登録（画像）
        </h2>
    </x-slot>

    <div class="container my-10 mx-auto flex flex-col w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
        <form action="{{ route('admin.images.store') }}" method="post" enctype="multipart/form-data" class="w-full divide divide-y">
            @csrf
            <div class="p-4">
                <div class="flex items-center">
                    <p class="w-1/4 pl-1 font-bold">企業名</p>
                    <div class="flex-auto">
                        <select name="company_id" class="bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 pl-3 pr-6 leading-8 transition-colors duration-200 ease-in-out">
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">画像名</span>
                    <span class="flex-auto">
                        <input type="text" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </span>
                </label>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">画像</span>
                    <span class="flex-auto">
                        <input type="file" name="file_name" accept="image/png,image/jpeg,image/jpg" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </span>
                    @error('file_name')
                    <span class="text-rose-700 mt-2">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="flex justify-center items-center gap-6 py-10">
                <a href="{{ route('admin.images.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">戻る</a>
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">登録</button>
            </div>
        </form>
    </div>

</x-app-layout>
