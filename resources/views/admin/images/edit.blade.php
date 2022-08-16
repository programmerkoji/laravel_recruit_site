<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            画像情報編集
        </h2>
    </x-slot>

    <div class="container my-10 mx-auto flex flex-col w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
        <form action="{{ route('admin.images.update', ['image' => $imageInfo->id]) }}" method="post" enctype="multipart/form-data" class="w-full divide divide-y">
            @csrf
            @method('PUT')
            <div class="p-4">
                <div class="flex items-center">
                    <p class="w-1/4 pl-1 font-bold">求人名</p>
                    <div class="flex-auto">
                        <p>{{ $imageInfo->job_offer->title }}</p>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <label class="flex items-center">
                    <span class="w-1/4 pl-1 font-bold">画像名</span>
                    <span class="flex-auto">
                        <input type="text" name="title" value="{{ $imageInfo->title }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </span>
                </label>
            </div>
            <div class="p-4">
                <div class="flex items-center">
                    <p class="w-1/4 pl-1 font-bold">画像</p>
                    <div class="flex-auto">
                        <div class="w-32"><img src="{{ asset('storage/' . $imageInfo->file_name) }}" alt=""></div>
                    </div>
                    @error('file_name')
                    <span class="text-rose-700 mt-2">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center items-center gap-6 py-10">
                <a href="{{ route('admin.images.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">戻る</a>
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">更新</button>
            </div>
        </form>
    </div>

</x-app-layout>
