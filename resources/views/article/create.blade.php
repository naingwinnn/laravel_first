<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-10 mt-8">

        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
                Create Article
            </h2>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="bg-green-50 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/articles/store" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full rounded border">
                </div>

                <div>
                    <label>Body</label>
                    <textarea name="body" class="w-full rounded border">{{ old('body') }}</textarea>
                </div>

                <div>
                    <label>Category ID</label>
                    <input type="number" name="category_id" value="{{ old('category_id') }}" class="w-full rounded border">
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Add Article
                </button>

            </form>
        </div>
    </div>
</x-app-layout>
